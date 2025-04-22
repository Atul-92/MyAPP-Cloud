<?php
$projects = [
  [
    'title' => 'Online Voting System',
    'description' => 'A secure and transparent platform built with PHP and MySQL to facilitate online elections.',
    'link' => '#'
  ],
  [
    'title' => 'Yatra Wheels Car Rental',
    'description' => 'A seamless car booking platform with real-time availability and support.',
    'link' => '#'
  ],
  [
    'title' => 'Portfolio Website',
    'description' => 'A responsive personal portfolio to showcase my projects and contact info.',
    'link' => '#'
  ]
];

$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $to = "you@example.com"; // Change this to your real email
  $subject = "Message from Portfolio";
  $body = "From: $name <$email>\n\n$message";
  $headers = "From: $email";

  $sent = mail($to, $subject, $body, $headers);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Atul Adhikari | Developer Portfolio</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f9;
      color: #333;
    }

    header, footer {
      background: #007bff;
      color: white;
      text-align: center;
      padding: 1.5rem;
    }

    nav a {
      color: white;
      margin: 0 1rem;
      text-decoration: none;
      font-weight: 500;
    }

    nav a:hover {
      text-decoration: underline;
    }

    section {
      max-width: 900px;
      margin: 3rem auto;
      padding: 0 2rem;
    }

    h2 {
      color: #007bff;
      margin-bottom: 1rem;
    }

    .project, .skill, .education {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 1.5rem;
    }

    .project a {
      display: inline-block;
      margin-top: 0.75rem;
      color: #007bff;
      font-weight: 600;
      text-decoration: none;
    }

    form {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    form input, form textarea {
      width: 100%;
      padding: 1rem;
      margin: 0.5rem 0 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 0.75rem 2rem;
      background: #007bff;
      color: white;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .success { color: green; margin-bottom: 1rem; }
    .error { color: red; margin-bottom: 1rem; }

    footer p, footer a {
      font-size: 0.9rem;
      color: #e6e6e6;
    }

    footer a:hover {
      color: white;
    }
  </style>
</head>
<body>

<header>
  <h1>👨‍💻 Atul Adhikari</h1>
  <p>Full-Stack Developer | Tech Enthusiast | Lifelong Learner</p>
  <nav>
    <a href="#about">About</a>
    <a href="#skills">Skills</a>
    <a href="#projects">Projects</a>
    <a href="#education">Education</a>
    <a href="#contact">Contact</a>
  </nav>
</header>

<section id="about">
  <h2>About Me</h2>
  <p>Hi! I'm Atul, a Computer Science student at Herald College Kathmandu. I specialize in building full-stack web applications using PHP, MySQL, and modern front-end technologies. I’m always curious to learn and collaborate on impactful projects.</p>
</section>

<section id="skills">
  <h2>Skills</h2>
  <div class="skill">
    <ul>
      <li><strong>Languages:</strong> HTML, CSS, JavaScript, PHP, Java</li>
      <li><strong>Frameworks:</strong> Bootstrap, Tailwind, Laravel (Basics)</li>
      <li><strong>Databases:</strong> MySQL</li>
      <li><strong>Tools:</strong> Git & GitHub, VS Code, Figma</li>
    </ul>
  </div>
</section>

<section id="projects">
  <h2>Projects</h2>
  <?php foreach ($projects as $project): ?>
    <div class="project">
      <h3><?= $project['title'] ?></h3>
      <p><?= $project['description'] ?></p>
      <a href="<?= $project['link'] ?>" target="_blank">🔗 View Project</a>
    </div>
  <?php endforeach; ?>
</section>

<section id="education">
  <h2>Education</h2>
  <div class="education">
    <p><strong>BSc (Hons) Computer Science & Software Engineering</strong></p>
    <p>Herald College Kathmandu | 2022 - 2026</p>
    <p>Focused on software development, data science, and AI with a practical, hands-on approach to learning.</p>
  </div>
</section>

<section id="contact">
  <h2>Contact Me</h2>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if ($sent): ?>
      <p class="success">✅ Your message has been sent!</p>
    <?php else: ?>
      <p class="error">❌ Something went wrong. Please try again later.</p>
    <?php endif; ?>
  <?php endif; ?>

  <form method="post">
    <input type="text" name="name" placeholder="Your name" required>
    <input type="email" name="email" placeholder="Your email" required>
    <textarea name="message" placeholder="Your message" rows="6" required></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>

<footer>
  <p>&copy; <?= date("Y") ?> Atul Adhikari</p>
  <p>
    <a href="https://github.com/Atul-92" target="_blank">GitHub</a> |
    <a href="https://www.facebook.com/atul.adhikari.9619" target="_blank">Facebook</a>
  </p>
</footer>

</body>
</html>
