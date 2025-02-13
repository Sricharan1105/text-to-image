import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;

public class TextToImage extends JFrame {
    private JTextField promptField;
    private JButton generateButton;
    private JButton homeButton;
    private JLabel loadingLabel;
    private JLabel resultImageLabel;
    private final String API_KEY = "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";
    private final String MODEL_NAME = "black-forest-labs/FLUX.1-dev";
    private CardLayout cardLayout;
    private JPanel cardPanel;

    public TextToImage() {
        setTitle("Text-to-2D Image Converter");
        setSize(600, 700);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLayout(new BorderLayout());

        // Initialize CardLayout for navigating between sections
        cardLayout = new CardLayout();
        cardPanel = new JPanel(cardLayout);

        // Home section
        JPanel homePanel = new JPanel();
        homePanel.setLayout(new BoxLayout(homePanel, BoxLayout.Y_AXIS));
        JLabel welcomeLabel = new JLabel("Welcome to the Text-to-Image Generator");
        welcomeLabel.setAlignmentX(Component.CENTER_ALIGNMENT);
        homeButton = new JButton("Go to Image Generator");
        homeButton.setAlignmentX(Component.CENTER_ALIGNMENT);

        // Button to navigate to the Image Generator section
        homeButton.addActionListener(e -> cardLayout.show(cardPanel, "imageGenerator"));

        homePanel.add(welcomeLabel);
        homePanel.add(Box.createVerticalStrut(20));
        homePanel.add(homeButton);

        // Image Generator section
        JPanel imageGeneratorPanel = new JPanel();
        imageGeneratorPanel.setLayout(new FlowLayout());

        // Create components for Image Generator section
        promptField = new JTextField(30);
        generateButton = new JButton("Generate Image");
        loadingLabel = new JLabel(" ");
        resultImageLabel = new JLabel();

        imageGeneratorPanel.add(new JLabel("Enter prompt:"));
        imageGeneratorPanel.add(promptField);
        imageGeneratorPanel.add(generateButton);
        imageGeneratorPanel.add(loadingLabel);
        imageGeneratorPanel.add(resultImageLabel);

        // Button action for generating image
        generateButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String prompt = promptField.getText().trim();
                if (!prompt.isEmpty()) {
                    loadingLabel.setText("Generating...");
                    generateImage(prompt);
                } else {
                    JOptionPane.showMessageDialog(null, "Please enter a meaningful description.");
                }
            }
        });

        // Add panels to CardLayout
        cardPanel.add(homePanel, "home");
        cardPanel.add(imageGeneratorPanel, "imageGenerator");

        // Add cardPanel to JFrame
        add(cardPanel, BorderLayout.CENTER);
        cardLayout.show(cardPanel, "home");
    }

    // Method to generate image from the prompt
    private void generateImage(String prompt) {
        new Thread(() -> {
            int retries = 3; // Number of retries
            while (retries > 0) {
                try {
                    // Set up API URL
                    URL url = new URL("https://api-inference.huggingface.co/models/black-forest-labs/FLUX.1-dev");
                    HttpURLConnection conn = (HttpURLConnection) url.openConnection();
                    conn.setRequestMethod("POST");
                    conn.setRequestProperty("Authorization", "Bearer " + API_KEY);
                    conn.setRequestProperty("Content-Type", "application/json");
                    conn.setDoOutput(true);
                    conn.setConnectTimeout(5000); // 5 seconds to connect
                    conn.setReadTimeout(20000);   // 20 seconds to read

                    // Send JSON request
                    String jsonInputString = "{\"inputs\":\"" + prompt + "\"}";
                    try (OutputStream os = conn.getOutputStream()) {
                        byte[] input = jsonInputString.getBytes("utf-8");
                        os.write(input, 0, input.length);
                    }

                    // Check for valid response
                    int status = conn.getResponseCode();
                    if (status == 200 && conn.getContentType().contains("image/jpeg")) {
                        // Read image from response
                        InputStream inputStream = conn.getInputStream();
                        ImageIcon imageIcon = new ImageIcon(new ImageIcon(inputStream.readAllBytes()).getImage()
                                .getScaledInstance(400, 400, Image.SCALE_SMOOTH));
                        SwingUtilities.invokeLater(() -> {
                            loadingLabel.setText(" ");
                            resultImageLabel.setIcon(imageIcon);
                        });
                        return; // Exit method if successful
                    } else {
                        SwingUtilities.invokeLater(() -> {
                            loadingLabel.setText("Failed to generate image.");
                            JOptionPane.showMessageDialog(null, "Error: Could not retrieve image.");
                        });
                        return;
                    }
                } catch (Exception e) {
                    retries--; // Decrement retries if there's an exception
                    if (retries == 0) {
                        SwingUtilities.invokeLater(() -> JOptionPane.showMessageDialog(null, "An error occurred: " + e.getMessage()));
                    } else {
                        System.out.println("Retrying... attempts left: " + retries);
                    }
                }
            }
        }).start();
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            TextToImage app = new TextToImage();
            app.setVisible(true);
        });
    }
}
