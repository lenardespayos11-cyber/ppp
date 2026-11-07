<?php
// Only needed for the contact form (CSRF token + success/error message)
session_start();
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }
$flash = $_SESSION['flash'] ?? null;
$old   = $_SESSION['old'] ?? [];
unset($_SESSION['flash'], $_SESSION['old']);
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- header design -->
    <header class="header">
        <a href="#" class="logo">Portfolio.</a>

        <nav class="navbar">
        <a href="#home" class="active">Home</a>
        <a href="#about">About</a>
        <a href="#portfolio">Projects</a>
        <a href="#contact">Contact</a>
        </nav>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <!-- home section design -->
     <section id="home" class="home">
        <div class="home-content">
            <h3>Hello, I'm</h3>
            <h1>Lenard Espayos</h1>
            <p>I am a 3rd-year IT student working toward a career as a network engineer and administrator, passionate about designing, building, and securing reliable network systems.</p>
            
            <div class="social-media">
                <a href="https://www.facebook.com/lenard.charles.espayos" target="_blank" rel="noopener noreferrer"><i class="bx bxl-facebook"></i></a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=lenardespayos11@gmail.com&su=Hello%20from%20your%20portfolio" target="_blank" rel="noopener noreferrer"><i class="bx bx-envelope"></i></a>
                <a href="https://www.instagram.com/lnrdchs/" target="_blank" rel="noopener noreferrer"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>

        <div class="profession-container">
            <div class="profession-box">
                <div class="profession" style="--i:0">
                    <i class='bx bx-server'></i>
                    <h3>Network Engineer</h3>
                </div>
                <div class="profession" style="--i:1">
                    <i class='bx bx-user'></i>
                    <h3>Network Administrator</h3>
                </div>
                <div class="profession" style="--i:2">
                    <i class='bx bx-terminal'></i>
                    <h3>Network Engineer</h3>
                </div>
                <div class="profession" style="--i:3">
                    <i class='bx bx-desktop'></i>
                    <h3>Network Administrator</h3>
                </div>
                <div class="circle"></div>
            </div>
            <div class="overlay"></div>
        </div>

        <div class="home-img">
            <img src="images/Profile-removebg-preview.png" alt="">
        </div>

        </section>

        

    <!-- about section design -->
     <section id="about" class="about">
        <div class="about-img">
            <img src="images/about.jpg" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">About <span>Me</span></h2>
            <h3>Network Engineer</h3>
            <p>I first fell in love with tech by tinkering with computer hardware and bringing old machines back to life. Today, as an IT student, that curiosity has led me into networking, hands-on project building, and exploring how complex systems work. My long-term goal is to turn this problem-solving mindset into a career as a network engineer, designing the reliable and secure networks that keep the world connected.</p>
        </div>

     </section>
     

    <!-- portfolio section design -->

    <section class="portfolio" id="portfolio">
        <h2 class="heading">My <span>Projects</span></h2>

        <div class="portfolio-container">
            <div class="portfolio-box">
                <img src="images/Project1.png" alt="">
                <div class="portfolio-layer">
                    <h4>3s Network Simulation</h4>
                    <p>During this project, we built a complete Cisco-based simulation to accurately represent the 3S network environment.</p>
                     <a href="https://drive.google.com/file/d/1rqZayBUqq8ju7GTd2ieIbvrWcC_3x-dI/view?usp=sharing" target="_blank" rel="noopener noreferrer"><i class='bx bx-link-external'></i></a>
                </div>
            </div>

            <div class="portfolio-box">
                <img src="images/Project2.jpg" alt="">
                <div class="portfolio-layer">
                    <h4>Mobile Apps</h4>
                    <p>We developed three distinct mobile applications: a functional calculator, a user registration form, and an interactive quiz app.</p>
                    <a href="https://drive.google.com/drive/folders/115gf1qK39nb354yJImZ4bPVXW3-Di2fS?usp=sharing" target="_blank" rel="noopener noreferrer"><i class='bx bx-link-external'></i></a>
                </div>
            </div>

            <div class="portfolio-box">
                <img src="images/project3.png" alt="">
                <div class="portfolio-layer">
                    <h4>Cogwork</h4>
                    <p>An interactive web platform dedicated to educating users on bicycle assembly, routine maintenance, and hardware repair.</p>
                    <a href="https://cogwork.vercel.app/"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
        </div>
    </section>

        <!-- certificates section design -->
    <section class="certificates" id="certificates">
        <h2 class="heading">My <span>Certificates</span></h2>

        <div class="certificates-container">
            <figure class="certificate-box">
                <button type="button" class="certificate-img" aria-label="View certificate larger">
                    <img src="images/Cert1.png" alt="Certificate Title 1">
                </button>
                <figcaption>CSS NCII Basic competency</figcaption>
            </figure>
            <figure class="certificate-box">
                <button type="button" class="certificate-img" aria-label="View certificate larger">
                    <img src="images/Cert2.png" alt="Certificate Title 1">
                </button>
                <figcaption>CSS NCII Common Competency</figcaption>
            </figure>
            <figure class="certificate-box">
                <button type="button" class="certificate-img" aria-label="View certificate larger">
                    <img src="images/Cert3.png" alt="Certificate Title 1">
                </button>
                <figcaption>CSS NCII Core Competency</figcaption>
            </figure>

            
        </div>
    </section>


    <!-- contact section design -->

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>

        <form id="contact-form" action="contact.php" method="post">
            <?php if ($flash): ?>
                <div class="form-alert <?= e($flash['type']) ?>">
                    <ul>
                        <?php foreach ($flash['messages'] as $m): ?>
                            <li><?= e($m) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
            <input type="text" name="website" class="hp-field" tabindex="-1" autocomplete="off" aria-hidden="true">

            <div class="input-box">
                <input type="text" id="fullname" name="name" placeholder="Full Name" value="<?= e($old['name'] ?? '') ?>" required>
                <input type="email" id="email" name="email" placeholder="Email Address" value="<?= e($old['email'] ?? '') ?>" required>
            </div>
            <div class="input-box">
                <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" value="<?= e($old['mobile'] ?? '') ?>">
                <input type="text" id="subject" name="subject" placeholder="Email Subject" value="<?= e($old['subject'] ?? '') ?>" required>
            </div>
            <textarea id="message" name="message" cols="30" rows="10" placeholder="Your Message" class="textarea" required><?= e($old['message'] ?? '') ?></textarea>
            <input type="submit" value="Send Message" class="btn">
        </form>
    </section>


    <!-- footer design -->
    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; 2026| All Rights Reserved</p>
        </div>
        <div class="footer-iconTop">
            <a href="#home"><i class='bx bx-up-arrow-alt'></i></a>
        </div>
    </footer>

    <div class="lightbox" id="lightbox" aria-hidden="true">
        <button type="button" class="lightbox-close" aria-label="Close">&times;</button>
            <img src="" alt="">
        <p class="lightbox-title"></p>
    </div>


    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- custom js -->
    <script src="js/script.js"></script>
</body>

</html>
