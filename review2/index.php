<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WordWeave - AI Text-to-Image Generator</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo"><i class="fas fa-paint-brush"></i> WordWeave</h1>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#demo">Try It</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <div class="hero-content">
                <h1><i class="fas fa-paint-brush"></i> Bring Words to Life with WordWeave</h1>
                <p class="tagline">Turn your imagination into vibrant visuals with the power of AI.</p>
                <div class="cta-buttons">
                    <a href="#demo" class="btn primary-btn">Get Started <i class="fas fa-arrow-right"></i></a>
                    <a href="#gallery" class="btn secondary-btn">See Examples <i class="fas fa-images"></i></a>
                </div>
            </div>
            <div class="hero-image">
                <img src="wordweave1.jpg" alt="AI Generated Art">
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2><i class="fas fa-star"></i> Why Choose WordWeave?</h2>
            <div class="features-grid">
                <div class="feature">
                    <i class="fas fa-robot"></i>
                    <h3>AI-Powered Creativity</h3>
                    <p>Transform simple text prompts into stunning visuals in seconds.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-palette"></i>
                    <h3>Diverse Art Styles</h3>
                    <p>Generate art in various styles, from photorealism to abstract.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-cogs"></i>
                    <h3>Customization Options</h3>
                    <p>Adjust details to fine-tune your creations to perfection.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-rocket"></i>
                    <h3>Easy to Use</h3>
                    <p>No technical skills required—simply describe what you want.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-share-alt"></i>
                    <h3>Share Your Creations</h3>
                    <p>Easily share your images on social media platforms.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-history"></i>
                    <h3>History of Creations</h3>
                    <p>Keep track of your generated images and prompts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section id="demo" class="demo">
        <div class="container">
            <h2><i class="fas fa-pencil-alt"></i> Try it Yourself!</h2>
            <p>Type in a description below and see your imagination come to life with WordWeave’s AI.</p>
            <input type="text" id="text-input" class="input-text" placeholder="Describe your idea...">
            <button id="generate-button" class="btn primary-btn">Create Your Image <i class="fas fa-magic"></i></button>
            <p id="loading" style="display: none;"></p>
            <img id="result-image" src="" alt="Generated Image" style="display: none; margin-top: 20px; width: 100%; max-width: 500px; border-radius: 10px;">
        </div>
    </section>

    <!-- Image Download Section -->
    <section id="download" class="download">
        <div class="container">
            <h2><i class="fas fa-download"></i> Download Your Image</h2>
            <p>Once you've generated an image, you can download it here.</p>
            <img id="download-image" src="" alt="Generated Image for Download" style="display: none; margin-top: 20px; width: 100%; max-width: 500px; border-radius: 10px;">
            <a id="download-button" class="btn primary-btn" href="#" style="display: none;">Download Image <i class="fas fa-file-download"></i></a>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container">
            <h2><i class="fas fa-images"></i> Gallery</h2>
            <p>Explore some amazing artworks generated by WordWeave users.</p>
            <div class="gallery-grid">
                <div class="gallery-item"><img src="gallery1.jpg" alt="Gallery Image 1"></div>
                <div class="gallery-item"><img src="gallery2.jpg" alt="Gallery Image 2"></div>
                <div class="gallery-item"><img src="gallery3.jpg" alt="Gallery Image 3"></div>
                <div class="gallery-item"><img src="gallery4.jpg" alt="Gallery Image 4"></div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2><i class="fas fa-comments"></i> What Our Users Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p>"WordWeave has completely transformed the way I create art! The results are amazing."</p>
                    <h4>- Jamie L.</h4>
                </div>
                <div class="testimonial-card">
                    <p>"This tool is incredibly easy to use. I can't believe how fast it generates images!"</p>
                    <h4>- Alex M.</h4>
                </div>
                <div class="testimonial-card">
                    <p>"I love the variety of styles available. It's like having my own personal artist."</p>
                    <h4>- Taylor R.</h4>
                </div>
                <div class="testimonial-card">
                    <p>"WordWeave is a game changer! I use it for my art projects all the time."</p>
                    <h4>- Jordan S.</h4>
                </div>
                <div class="testimonial-card">
                    <p>"The community around WordWeave is so supportive. I love sharing my creations!"</p>
                    <h4>- Casey T.</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog">
        <div class="container">
            <h2><i class="fas fa-newspaper"></i> Latest Blog Posts</h2>
            <div class="blog-grid">
                <div class="blog-post">
                    <h3>How AI is Transforming Art</h3>
                    <p>Discover how artificial intelligence is changing the landscape of artistic creation.</p>
                    <a href="#" class="btn read-more-btn">Read More</a>
                </div>
                <div class="blog-post">
                    <h3>Getting Started with WordWeave</h3>
                    <p>A comprehensive guide to help you make the most of WordWeave's features.</p>
                    <a href="#" class="btn read-more-btn">Read More</a>
                </div>
                <div class="blog-post">
                    <h3>Top 10 Tips for Creative Prompts</h3>
                    <p>Learn how to write effective prompts that yield stunning AI-generated images.</p>
                    <a href="#" class="btn read-more-btn">Read More</a>
                </div>
                <div class="blog-post">
                    <h3>Understanding AI Art Styles</h3>
                    <p>Explore the different art styles you can generate with WordWeave.</p>
                    <a href="#" class="btn read-more-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2><i class="fas fa-envelope"></i> Get
                <form action="#" method="POST">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <textarea rows="5" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn primary-btn">Send Message <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </section>
    
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p>&copy; 2024 WordWeave. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
        </footer>
    
        <script src="script.js"></script>
    </body>
    </html>
        
   
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Code Reference Table</title>
        <link rel="stylesheet" href="style.css"> <!-- Link your CSS file here -->
    </head>
    <body>


        <section id="demo" class="demo">
            <div class="container">
                <h2>Try it Yourself!</h2>
                <input type="text" id="text-input" class="input-text" placeholder="Describe your idea...">
                <button id="generate-button" class="btn primary-btn">Create Your Image</button>
                <p id="loading" style="display: none;"></p>
                <img id="result-image" src="" alt="Generated Image" style="display: none; margin-top: 20px;">
            </div>
        </section>
        
    
       