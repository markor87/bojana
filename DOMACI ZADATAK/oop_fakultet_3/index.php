<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .student {
            background-color: lightgray;
            padding: 20px;
        }

    </style>

    <?php
    include "classes.php";
    $data = getStudentData();
    $student = $data["student"];
    $ocena = $data["ocena"];
    $predmet = $data["predmet"];
    ?>

</head>
<body>

<div class="student">
    <h1>Ime studenta: <?php echo $student->getIme(); ?></h1>
    <h2>Ocena za predmet: <?php echo $ocena->getVrednost(); ?></h2>
</div>
<div class="predmet">
    <h1>Ime predmeta: <?php echo $predmet->getIme(); ?></h1>
    <h2>Studenti na predmetu:</h2>
    <ul>
        <?php
        foreach($predmet->getStudenti() as $student) {
            echo "<li>" . $student->getIme() . "</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>