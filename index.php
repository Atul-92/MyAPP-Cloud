<?php
$projects = [
  [
    'title' => 'Online Voting System',
    'description' => 'Secure and user-friendly voting platform.',
    'link' => '#'
  ],
  [
    'title' => 'Yatra Wheels Car Rental',
    'description' => 'Car rental website with seamless booking and support.',
    'link' => '#'
  ]
];

$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $to = "you@example.com"; // change to your email
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
  <title>My Portfolio - Atul Adhikari</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f9f9f9; color: #333; }
    header, footer { background: #333; color: white; text-align: center; padding: 1rem; }
    nav a { color: white; margin: 0 1rem; text-decoration: none; }
    section { padding: 2rem; max-width: 900px; margin: auto; }
    .project { background: white; padding: 1rem; margin: 1rem 0; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
    form input, form textarea { width: 100%; padding: 0.75rem; margin: 0.5rem 0; border: 1px solid #ccc; border-radius: 5px; }
    form button { padding: 0.75rem 1.5rem; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>

<header>
  <h1>👨‍💻 Atul's Portfolio</h1>
  <nav>
    <a href="#about">About</a>
    <a href="#projects">Projects</a>
    <a href="#contact">Contact</a>
  </nav>
</header>

<section id="about">
  <h2>About Me</h2>
  <p>I am a passionate Computer Science student focused on building clean, user-friendly web applications. I enjoy working on full-stack projects and continuously learning new technologies.</p>
</section>

<section id="projects">
  <h2>Projects</h2>
  <?php foreach ($projects as $project): ?>
    <div class="project">
      <h3><?= $project['title'] ?></h3>
      <p><?= $project['description'] ?></p>
      <a href="<?= $project['link'] ?>" target="_blank">View Project</a>
    </div>
  <?php endforeach; ?>
</section>

<section id="contact">
  <h2>Contact Me</h2>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if ($sent): ?>
      <p class="success">Message sent successfully!</p>
    <?php else: ?>
      <p class="error">Failed to send message. Try again later.</p>
    <?php endif; ?>
  <?php endif; ?>

  <form method="post">
    <input type="text" name="name" placeholder="Your name" required>
    <input type="email" name="email" placeholder="Your email" required>
    <textarea name="message" placeholder="Your message" rows="5" required></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>

<footer>
  <p>&copy; <?= date("Y") ?> Atul Adhikari 2025. All rights reserved.</p>
</footer>

</body>
</html>
