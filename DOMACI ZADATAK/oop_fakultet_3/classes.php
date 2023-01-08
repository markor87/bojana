<?php


interface StudentInterface
{
    public function getIme();
}

abstract class AbstractStudent
{
    protected $ime;

    public function __construct($ime)
    {
        $this->ime = $ime;
    }

    abstract public function getIme();
}

class Student extends AbstractStudent implements StudentInterface
{
    use StudentTrait;

    static public $broj_studenata = 0;

    public function __construct($ime)
    {
        parent::__construct($ime);
        self::$broj_studenata++;
    }

    public function getIme()
    {
        return $this->ime;
    }
}

trait StudentTrait
{
    public function getBrojStudenata()
    {
        return self::$broj_studenata;
    }
}

class Ocena
{
    private $vrednost;

    public function __construct($vrednost)
    {
        $this->vrednost = $vrednost;
    }

    public function getVrednost()
    {
        return $this->vrednost;
    }
}

class Predmet
{
    private $ime;
    private $studenti;

    public function __construct($ime)
    {
        $this->ime = $ime;
        $this->studenti = array();
    }

    public function dodajStudenta(Student $student)
    {
        $this->studenti[] = $student;
    }

    public function getStudenti()
    {
        return $this->studenti;
    }
}

function sortirajStudenti(array $studenti)
{
    usort($studenti, function ($a, $b) {
        return $a->getIme() <=> $b->getIme();
    });

    return $studenti;
}

$student = new Student("Pera");
$ocena = new Ocena(9);
$predmet = new Predmet("Matematika");
$predmet->dodajStudenta($student);

function getStudentData() {
    $student = new Student("Pera");
    $ocena = new Ocena(9);
    $predmet = new Predmet("Matematika");
    $predmet->dodajStudenta($student);

    return array(
        "student" => $student,
        "ocena" => $ocena,
        "predmet" => $predmet
    );
}

function getAllData() {
    $student1 = new Student("Pera");
    $student2 = new Student("Mika");
    $student3 = new Student("Zika");

    $ocena1 = new Ocena(9);
    $ocena2 = new Ocena(8);
    $ocena3 = new Ocena(7);

    $predmet1 = new Predmet("Matematika");
    $predmet1->dodajStudenta($student1);
    $predmet1->dodajStudenta($student2);
    $predmet1->dodajStudenta($student3);

    $predmet2 = new Predmet("Fizika");
    $predmet2->dodajStudenta($student1);
    $predmet2->dodajStudenta($student3);

    $predmet3 = new Predmet("Programiranje");
    $predmet3->dodajStudenta($student2);
    $predmet3->dodajStudenta($student3);

    return array(
        "studenti" => array($student1, $student2, $student3),
        "ocene" => array($ocena1, $ocena2, $ocena3),
        "predmeti" => array($predmet1, $predmet2, $predmet3)
    );
}