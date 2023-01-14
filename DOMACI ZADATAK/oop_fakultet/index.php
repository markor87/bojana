<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <style>
    .student-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      font-size: 2em;
    }

    p {
      font-size: 1.5em;
    }

  </style>
</head>
<body>
<?php require 'student.php'; ?>
<div class="student-container">
    <h1><?php echo $name; ?></h1>
    <p>Prosečna ocena: <?php echo $average; ?></p>
    <?php foreach ($grades as $subject => $grade): ?>
    <p><?php echo $subject . ': ' . $grade->getValue(); ?></p>
    <?php endforeach; ?>
</div>
</body>
</html>