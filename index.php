<?php

require_once "php/db.php";

$conn = dbConnection();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sakil Anuar | Portfolio</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">

        <div class="container navbar-content">

            <a href="#" class="logo">
                Sakil<span>.</span>
            </a>

            <nav class="nav-menu">

                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#education">Education</a>
                <a href="#contact">Contact</a>

            </nav>

            <button class="menu-btn" id="menuBtn">
                ☰
            </button>

        </div>

    </header>


    <!-- Hero Section -->
    <section class="hero" id="home">

        <div class="container hero-content">

            <div class="hero-text">

                <p class="hero-small">
                    Hello, I'm
                </p>

                <h1>
                    Sakil Anuar
                </h1>

                <h2>
                     I'm a <span id="typing-text"></span>
                </h2>

                <p class="hero-description">
                    I am a passionate CSE student interested in
                    software development, data analysis, data engineering
                    and machine learning.
                </p>

               <div class="hero-buttons">
                   <a href="#projects" class="btn primary-btn">
                         View My Work
                   </a>

                   <a href="resume/Sakil-Anuar-Resume.pdf"
                      class="btn secondary-btn"
                      target="_blank">
                         View Resume
                   </a>

                   <a href="#contact" class="btn secondary-btn">
                         Contact Me
                   </a>
                </div>

                <div class="social-links">

                    <a href="https://github.com/sakil-anuar" target="_blank">
                        GitHub
                    </a>

                    <a href="https://www.linkedin.com/in/sakil-anuar-171133332?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BMYGN4PD%2BSBuSq5tTcB3b%2FA%3D%3D" target="_blank">
                        LinkedIn
                    </a>

                    <a href="https://codeforces.com/profile/Sakil-Anuar" target="_blank">
                        Codeforces
                    </a>

                </div>

            </div>


            <div class="hero-image">

            <div class="image-circle">
                 <img src="images/profile.jpg" alt="Sakil Anuar">
            </div>

        </div>

        </div>

    </section>


    <!-- Temporary Sections -->

    <section class="about-section" id="about">

    <div class="container">

        <div class="section-title">

            <p>Get To Know Me</p>

            <h2>About Me</h2>

        </div>


        <div class="about-content">

            <div class="about-text">

                <h3>
                    I'm Sakil Anuar
                </h3>

                <p>
                    I am a Computer Science and Engineering student
                    with a strong interest in software development,
                    data analysis and data engineering.
                </p>

                <p>
                    I enjoy learning new technologies and building
                    practical projects that solve real-world problems.
                    I am continuously improving my programming,
                    database and problem-solving skills.
                </p>

                <p>
                    My current goal is to start my professional career
                    in the technology industry and grow as a skilled
                    software and data professional.
                </p>

            </div>


            <div class="about-info">

                <div class="info-item">

                    <span>Name</span>

                    <strong>Sakil Anuar</strong>

                </div>


                <div class="info-item">

                    <span>Education</span>

                    <strong>B.Sc. in CSE</strong>

                </div>


                <div class="info-item">

                    <span>Interest</span>

                    <strong>Data & Machine Learning</strong>

                </div>


                <div class="info-item">

                    <span>Location</span>

                    <strong>Dhaka,Bangladesh</strong>

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- 
     Skills Section
    -->

<section class="skills-section" id="skills">

    <div class="container">

        <div class="section-title">

            <p>What I Work With</p>

            <h2>My Skills</h2>

        </div>


        <div class="skills-grid">

            <!-- Web Development -->

            <div class="skill-card">

                <div class="skill-icon">
                    🌐
                </div>

                <h3>Web Development</h3>

                <p>
                    Building responsive and user-friendly
                    websites and web applications.
                </p>

                <div class="skill-tags">

                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JavaScript</span>
                    <span>PHP</span>

                </div>

            </div>


            <!-- Programming -->

            <div class="skill-card">

                <div class="skill-icon">
                    💻
                </div>

                <h3>Programming</h3>

                <p>
                    Strong interest in programming,
                    problem solving and software development.
                </p>

                <div class="skill-tags">

                    <span>C++</span>
                    <span>C#</span>
                    <span>Java</span>
                    <span>Python</span>

                </div>

            </div>


            <!-- Database -->

            <div class="skill-card">

                <div class="skill-icon">
                    🗄️
                </div>

                <h3>Database</h3>

                <p>
                    Working with relational databases and
                    backend data management.
                </p>

                <div class="skill-tags">

                    <span>MySQL</span>
                    <span>SQL</span>
                     <span>PostgreSQL</span>
                    <span>Database Design</span>

                </div>

            </div>


            <!-- Data -->

            <div class="skill-card">

                <div class="skill-icon">
                    📊
                </div>

                <h3>Data & Analytics</h3>

                <p>
                    Interested in extracting insights from
                    data and solving analytical problems.
                </p>

                <div class="skill-tags">

                    <span>Data Analysis</span>
                    <span>Python</span>
                    <span>Machine Learning</span>

                </div>

            </div>


            <!-- Tools -->

            <div class="skill-card">

                <div class="skill-icon">
                    🛠️
                </div>

                <h3>Tools & Technologies</h3>

                <p>
                    Comfortable with development tools and
                    collaborative workflows.
                </p>

                <div class="skill-tags">

                    <span>Git</span>
                    <span>GitHub</span>
                    <span>VS Code</span>
                    <span>XAMPP</span>

                </div>

            </div>


            <!-- Problem Solving -->

            <div class="skill-card">

                <div class="skill-icon">
                    🧩
                </div>

                <h3>Problem Solving</h3>

                <p>
                    Practicing algorithms, data structures
                    and competitive programming.
                </p>

                <div class="skill-tags">

                    <span>DSA</span>
                    <span>Algorithms</span>
                    <span>Codeforces</span>

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- 
     Projects Section
    -->

<section class="projects-section" id="projects">

<?php

$sql = "SELECT
            id,
            title,
            description,
            technologies,
            github_url,
            live_url,
            image
        FROM projects
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

?>

<div class="projects-grid">

    <?php if ($result && mysqli_num_rows($result) > 0): ?>

        <?php while ($project = mysqli_fetch_assoc($result)): ?>

            <article class="project-card">

                <?php if (!empty($project["image"])): ?>

                    <img
                        src="images/projects/<?php
                        echo htmlspecialchars($project["image"]);
                        ?>"
                        alt="<?php
                        echo htmlspecialchars($project["title"]);
                        ?>"
                    >

                <?php endif; ?>


                <div class="project-content">

                    <h3>
                        <?php
                        echo htmlspecialchars(
                            $project["title"]
                        );
                        ?>
                    </h3>


                    <p>
                        <?php
                        echo htmlspecialchars(
                            $project["description"]
                        );
                        ?>
                    </p>


                    <div class="project-technologies">

                        <?php

                        $technologies =
                            explode(
                                ",",
                                $project["technologies"]
                            );

                        foreach ($technologies as $technology):

                        ?>

                            <span>
                                <?php
                                echo htmlspecialchars(
                                    trim($technology)
                                );
                                ?>
                            </span>

                        <?php endforeach; ?>

                    </div>


                    <div class="project-links">

                        <?php if (
                            !empty($project["github_url"])
                        ): ?>

                            <a
                                href="<?php
                                echo htmlspecialchars(
                                    $project["github_url"]
                                );
                                ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                GitHub
                            </a>

                        <?php endif; ?>


                        <?php if (
                            !empty($project["live_url"])
                        ): ?>

                            <a
                                href="<?php
                                echo htmlspecialchars(
                                    $project["live_url"]
                                );
                                ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Live Demo
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </article>

        <?php endwhile; ?>

    <?php else: ?>

        <p>
            No projects available yet.
        </p>

    <?php endif; ?>

</div>

    <div class="container">

        <div class="section-title">

            <p>What I Have Built</p>

            <h2>My Projects</h2>

        </div>


        <div class="projects-grid">


            <!-- Project 1 -->

            <div class="project-card">

                <div class="project-image">

                    <div class="project-placeholder">
                        NearVibe
                    </div>

                </div>


                <div class="project-content">

                    <span class="project-category">
                        Web Application
                    </span>

                    <h3>
                        NearVibe
                    </h3>

                    <p>
                        A nearby events platform where users can
                        discover events, purchase tickets and
                        interact with corporate event organizers.
                    </p>


                    <div class="project-tech">

                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>JavaScript</span>
                        <span>HTML</span>
                        <span>CSS</span>

                    </div>


                    <div class="project-links">

                        <a
                            href="https://github.com/graymatter10/nearVibe"
                            target="_blank">
                            GitHub →
                        </a>

                    </div>

                </div>

            </div>


            <!-- Project 2 -->

            <div class="project-card">

                <div class="project-image">

                    <div class="project-placeholder">
                        2D Racing
                    </div>

                </div>


                <div class="project-content">

                    <span class="project-category">
                        Game Development
                    </span>

                    <h3>
                        2D Car Racing Game
                    </h3>

                    <p>
                        A 2D car racing game developed using
                        OpenGL with multiple levels, keyboard
                        controls and sound features.
                    </p>


                    <div class="project-tech">

                        <span>C++</span>
                        <span>OpenGL</span>

                    </div>


                    <div class="project-links">

                        <a
                            href="https://github.com/sakil-anuar/2d-car-racing-opengl"
                            target="_blank">
                            GitHub →
                        </a>

                    </div>

                </div>

            </div>


            <!-- Project 3 -->

            <div class="project-card">

                <div class="project-image">

                    <div class="project-placeholder">
                        Portfolio
                    </div>

                </div>


                <div class="project-content">

                    <span class="project-category">
                        Full Stack
                    </span>

                    <h3>
                        Personal Portfolio
                    </h3>

                    <p>
                        A responsive personal portfolio website
                        built to showcase my skills, projects,
                        education and professional journey.
                    </p>


                    <div class="project-tech">

                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>PHP</span>
                        <span>MySQL</span>

                    </div>


                    <div class="project-links">

                        <a href="https://github.com/sakil-anuar/portfolio.git" target="_blank">
                            GitHub →
                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>

   <!-- 
     Education Section
   -->

<section class="education-section" id="education">

    <div class="container">

        <div class="section-title">

            <p>My Academic Journey</p>

            <h2>Education</h2>

        </div>


        <div class="timeline">


            <!-- Education 1 -->

            <div class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-date">
                        2023 - Present
                    </span>

                    <h3>
                        Bachelor of Science in Computer Science & Engineering
                    </h3>

                    <h4>
                        American International University-Bangladesh
                    </h4>

                    <p>
                        Studying Computer Science and Engineering with
                        interests in software development, databases,
                        data analysis and emerging technologies.
                    </p>

                </div>

            </div>


            <!-- Education 2 -->

            <div class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-date">
                        2019 - 2021
                    </span>

                    <h3>
                         Higher Secondary Education
                    </h3>

                    <h4>
                       Shahid Mamun Mahmud Police Lines School and College, Rajshahi.
                    </h4>

                    <p>
                        Completed higher secondary education with a
                        strong foundation in mathematics, science
                        and analytical thinking.
                    </p>
                    <p>
                        GPA: 5.00
                    </p>

                </div>

            </div>


            <!-- Education 3 -->

            <div class="timeline-item">

                <div class="timeline-dot"></div>

                <div class="timeline-content">

                    <span class="timeline-date">
                        2015 - 2019
                    </span>

                    <h3>
                          Secondary Education
                    </h3>

                    <h4>
                      Fotepur High School.
                    </h4>

                    <p>
                        Completed secondary education with a strong
                        interest in mathematics, science and technology.
                    </p>

                     <p> 
                        GPA: 4.72
                    </p>
                </div>

            </div>


        </div>

    </div>

</section>


<!-- 
     Experience / Activities
 -->

<section class="experience-section">

    <div class="container">

        <div class="section-title">

            <p>My Journey</p>

            <h2>Experience & Activities</h2>

        </div>


        <div class="experience-grid">


            <!-- Item 1 -->

            <div class="experience-card">

                <div class="experience-icon">
                    💻
                </div>

                <div>

                    <h3>
                        Software & Web Development
                    </h3>

                    <p>
                        Building academic and personal projects using
                        PHP, MySQL, JavaScript, C++, C# and other
                        development technologies.
                    </p>

                </div>

            </div>


            <!-- Item 2 -->

            <div class="experience-card">

                <div class="experience-icon">
                    📊
                </div>

                <div>

                    <h3>
                        Data & Analytics Learning
                    </h3>

                    <p>
                        Exploring data analysis, data engineering,
                        machine learning and practical data-driven
                        problem solving.
                    </p>

                </div>

            </div>


            <!-- Item 3 -->

            <div class="experience-card">

                <div class="experience-icon">
                    🧩
                </div>

                <div>

                    <h3>
                        Competitive Programming
                    </h3>

                    <p>
                        Practicing algorithms, data structures and
                        problem solving through programming contests
                        and online judges.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



<?php

if (isset($_GET["success"]) && $_GET["success"] == "1") {

    echo '
    <div class="container">
        <div class="success-message">
            ✓ Message sent successfully!
            I will get back to you soon.
        </div>
    </div>
    ';

}

?>

  <!-- 
     Contact Section
 -->

<section class="contact-section" id="contact">

    <div class="container">

        <div class="section-title">

            <p>Get In Touch</p>

            <h2>Contact Me</h2>

        </div>


        <div class="contact-wrapper">


            <!-- Contact Information -->

            <div class="contact-info">

                <h3>
                    Let's Work Together
                </h3>

                <p>
                    Have a project idea, internship opportunity
                    or simply want to connect? Feel free to send
                    me a message.
                </p>


                <div class="contact-item">

                    <span class="contact-icon">
                        📧
                    </span>

                    <div>

                        <small>Email</small>

                        <p>
                            anuarsakil7@gmail.com
                        </p>

                    </div>

                </div>


                <div class="contact-item">

                    <span class="contact-icon">
                        📍
                    </span>

                    <div>

                        <small>Location</small>

                        <p>
                            Bangladesh
                        </p>

                    </div>

                </div>


                <div class="contact-item">

                    <span class="contact-icon">
                        💼
                    </span>

                    <div>

                        <small>LinkedIn</small>

                        <p>
                            Connect with me on LinkedIn
                        </p>

                    </div>

                </div>

            </div>


            <!-- Contact Form -->

            <div class="contact-form">

                <form action="php/contact.php" method="POST">

                    <div class="form-group">

                        <label for="name">
                            Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Enter subject"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Write your message..."
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn primary-btn"
                    >
                        Send Message
                    </button>

                </form>

            </div>


        </div>

    </div>

</section>


<!-- 
     Footer
-->

<footer class="footer">

    <div class="container footer-content">

        <p>
            © 2026 Sakil Anuar. All Rights Reserved.
        </p>

        <div class="footer-links">

            <a href="#home">Home</a>

            <a href="#about">About</a>

            <a href="#projects">Projects</a>

            <a href="#contact">Contact</a>

        </div>

    </div>

</footer>


    <script src="js/script.js"></script>

</body>

</html>