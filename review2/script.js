const API_KEY = 'enter your huggingface API key here';
const MODEL_NAME = 'enter model name here';

document.getElementById("generate-button").addEventListener("click", async () => {
    const prompt = document.getElementById("text-input").value.trim();
    if (!prompt) {
        alert("Please enter a meaningful description.");
        return;
    }

    const loadingElement = document.getElementById("loading");
    const resultImage = document.getElementById("result-image");
    loadingElement.textContent = 'Generating...';
    loadingElement.style.display = "block";
    resultImage.style.display = "none";
    resultImage.src = "";

    try {
        const response = await fetch(`link here`, {
            method: "POST",
            headers: {
                "Authorization": `Bearer ${API_KEY}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ inputs: prompt })
        });

        // Get the content type of the response
        const contentType = response.headers.get("content-type");
        const responseBlob = await response.blob(); // Get response as a blob

        console.log('Server response content-type:', contentType); // Log content-type

        // Check if the response is OK
        if (!response.ok) {
            throw new Error(`Failed to fetch the image. Status: ${response.status}.`);
        }

        // Handle image/jpeg responses
        if (contentType && contentType.includes("image/jpeg")) {
            const imageUrl = URL.createObjectURL(responseBlob); // Create a URL for the image blob
            resultImage.src = imageUrl;
            resultImage.style.display = "block";
        } else {
            // Handle unexpected content types (e.g., JSON)
            alert("Unexpected response format. Received content-type: " + contentType);
        }
    } catch (error) {
        console.error("Error generating image:", error);
        alert(`An error occurred while generating the image: ${error.message}`);
    } finally {
        loadingElement.style.display = "none";
    }
});

// Save prompt function
async function savePrompt(prompt, generatedImageUrl) {
    const response = await fetch('save_prompt.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ prompt, generated_image_url: generatedImageUrl })
    });
    const result = await response.json();
    console.log(result.message);
}

// Fetch prompts function
async function fetchPrompts() {
    const response = await fetch('get_prompts.php');
    const prompts = await response.json();
    console.log(prompts); // Display prompts in console (or update your UI)
}

// Example usage
document.getElementById('generate-button').addEventListener('click', async () => {
    const prompt = document.getElementById('text-input').value;
    const generatedImageUrl = "path_to_generated_image.jpg"; // Replace with actual generated image URL

    // Save the prompt and image
    await savePrompt(prompt, generatedImageUrl);

    // Optionally fetch all prompts to update the UI
    await fetchPrompts();
});
