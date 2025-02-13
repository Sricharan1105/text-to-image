import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class ImageGeneratorApp extends JFrame {
    
    private static final String DB_URL = "jdbc:mysql://localhost:3306/image_generator_db"; // Replace with your DB URL
    private static final String DB_USER = "root"; // Replace with your DB username
    private static final String DB_PASSWORD = "password"; // Replace with your DB password

    // Method to establish a connection to the database
    public static Connection connectToDatabase() {
        try {
            Connection connection = DriverManager.getConnection(DB_URL, DB_USER, DB_PASSWORD);
            System.out.println("Connection established successfully.");
            return connection;
        } catch (SQLException e) {
            System.err.println("Error while connecting to the database: " + e.getMessage());
            return null;
        }
    }

    // Example method to store a generated image's prompt and URL into the database
    public void saveImageToDatabase(String prompt, String imageURL) {
        try (Connection connection = connectToDatabase()) {
            if (connection != null) {
                String sql = "INSERT INTO generated_images (prompt, image_url) VALUES (?, ?)";
                try (PreparedStatement statement = connection.prepareStatement(sql)) {
                    statement.setString(1, prompt);
                    statement.setString(2, imageURL);
                    int rowsAffected = statement.executeUpdate();
                    if (rowsAffected > 0) {
                        System.out.println("Image data saved to database.");
                    }
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
