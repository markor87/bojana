<!DOCTYPE html>
<html lang="en">
<head>
    <title>Domaci</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

</style>
<?php

// interfejs sa apstraktnim metodom getIme()
interface StudentInterface
{
    public function getIme();
}

// apstraktna klasa sa apstraktnim metodom getIme() i implementiranim metodom setIme()
abstract class AbstractStudent
{
    abstract public function getIme();

    public function setIme($ime)
    {
        $this->ime = $ime;
    }
}

// trait sa metodom sortirajStudenti()
trait SortTrait
{
    public static function sortirajStudenti($studenti)
    {
        usort($studenti, function ($a, $b) {
            return $a->getIme() <=> $b->getIme();
        });
        return $studenti;
    }
}

// klasa Student koja implementira interfejs StudentInterface i nasleđuje apstraktnu klasu AbstractStudent, te uvodi trait SortTrait
class Student extends AbstractStudent implements StudentInterface
{
    use SortTrait;

    protected $ime;

    public function getIme()
    {
        return $this->ime;
    }
}

// klasa Ocena sa privatnim svojstvom $vrednost i getterom i setterom za ovo svojstvo
class Ocena
{
    private $vrednost;

    public function getVrednost()
    {
        return $this->vrednost;
    }

    public function setVrednost($vrednost)
    {
        $this->vrednost = $vrednost;
    }
}

// klasa Predmet sa privatnim svojstvom $ime i getterom i setterom za ovo svojstvo, kao i sa statičkim svojstvom $brojInstanci i statičkom metodom getBrojInstanci()
class Predmet
{
    private $ime;
    public static $brojInstanci = 0;

    public function __construct()
    {
        self::$brojInstanci++;
    }

    public static function getBrojInstanci()
    {
        return self::$brojInstanci;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }
}

// funkcija koja sortira niz studenata po imenu
function sortirajStudenti($studenti)
{
    usort($studenti, function ($a, $b) {
        return $a->getIme() <=> $b->getIme();
    });
    return $studenti;
}

// kreiranje objekata i testiranje
$student1 = new Student();
$student1->setIme("Pera");
$student2 = new Student();
$student2->setIme("Marko");
$student3 = new Student();
$student3->setIme("Bojana");

$ocena1=new Ocena();
$ocena1->setVrednost(10);
$ocena2=new Ocena();
$ocena2->setVrednost(9);
$ocena3=new Ocena();
$ocena3->setVrednost(10);

$predmet1=new Predmet();
$predmet1->setIme("Programiranje");
$predmet2=new Predmet();
$predmet2->setIme("Fizika");
$predmet3=new Predmet();
$predmet3->setIme("Pravo");

?>

<body>
<table>
    <tr>
        <th>Ime studenta</th>
        <th>Ocena</th>
        <th>Predmet</th>
    </tr>
    <tr>
        <td><?php echo $student1->getIme(); ?></td>
        <td><?php echo $ocena1->getVrednost(); ?></td>
        <td><?php echo $predmet1->getIme(); ?></td>
    </tr>
    <tr>
        <td><?php echo $student2->getIme(); ?></td>
        <td><?php echo $ocena2->getVrednost(); ?></td>
        <td><?php echo $predmet2->getIme(); ?></td>
    </tr>
    <tr>
        <td><?php echo $student3->getIme(); ?></td>
        <td><?php echo $ocena3->getVrednost(); ?></td>
        <td><?php echo $predmet3->getIme(); ?></td>
    </tr>
</table>
</body>
</html>