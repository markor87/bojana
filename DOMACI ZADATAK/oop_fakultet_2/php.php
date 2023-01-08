<?php


// Interfejs za studente
interface StudentInterface
{
    public function getIme();

    public function getOcena();
}

// Apstraktna klasa koja predstavlja studenta
abstract class Student implements StudentInterface
{
    protected $ime;
    protected $ocena;

    public function __construct($ime, $ocena)
    {
        $this->ime = $ime;
        $this->ocena = $ocena;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function getOcena()
    {
        return $this->ocena;
    }

    // Metod koji se izvršava kada se studentu dodeli ocena za predmet
    // Ovaj metod je polimorfan i može biti redefinisan u nasledjenim klasama
    public function dodeliOcenu($ocena)
    {
        $this->ocena = $ocena;
    }
}

// Klasa koja predstavlja ocenu
class Ocena
{
    protected $ocena;
    protected $predmet;

    public function __construct($ocena, $predmet)
    {
        $this->ocena = $ocena;
        $this->predmet = $predmet;
    }

    public function getOcena()
    {
        return $this->ocena;
    }

    public function getPredmet()
    {
        return $this->predmet;
    }
}

// Klasa koja predstavlja predmet
class Predmet
{
    protected $naziv;
    protected static $brojPredmeta = 0; // Statičko svojstvo za broj predmeta

    public function __construct($naziv) {
        $this->naziv = $naziv;
        self::$brojPredmeta++; // Povećaj broj predmeta za 1
    }

    public function getNaziv() {
        return $this->naziv;
    }

    // Statička metoda za dobijanje ukupnog broja predmeta
    public static function getBrojPredmeta() {
        return self::$brojPredmeta;
    }
}

// Trait za studente koji imaju stipendiju
trait StipendijaTrait {
    protected $stipendija;

    public function __construct($stipendija) {
        $this->stipendija = $stipendija;
    }

    public function getStipendija() {
        return $this->stipendija;
    }
}

// Konkretna klasa koja predstavlja studenta
class KonkretniStudent extends Student {
    use StipendijaTrait;

    public function __construct($ime, $ocena, $stipendija) {
        parent::__construct($ime, $ocena);
        $this->stipendija = $stipendija;
    }

    // Redefinisanje metoda iz apstraktne klase za dodelu ocene
    public function dodeliOcenu($ocena) {
        // Provera da li je ocena veća od minimalne ocene za dobijanje stipendije
        if ($ocena > 8) {
            $this->ocena = $ocena;
            $this->stipendija = true; // Studentu se dodeljuje stipendija
        } else {
            $this->ocena = $ocena;
            $this->stipendija = false; // Studentu se ne dodeljuje stipendija
        }
    }
}

// Kreiranje predmeta
$matematika = new Predmet('Matematika');
$fizika = new Predmet('Fizika');

// Kreiranje studenta i dodeljivanje ocene za predmet
$student = new KonkretniStudent('Pera', 9, false);
$student->dodeliOcenu(9);

// Prikazivanje imena studenta i njegove ocene za predmet na HTML strani
echo $student->getIme();
echo $student->getOcena();

// Funkcija za sortiranje niza ocena po oceni
function sortirajOcenePoOceni(array $ocene) {
    usort($ocene, function($a, $b) {
        return $a->getOcena() < $b->getOcena();
    });

    return $ocene;
}

// Primer korišćenja funkcije
$ocene = [
    new Ocena(9, 'Matematika'),
    new Ocena(7, 'Fizika'),
    new Ocena(8, 'Matematika'),
    new Ocena(6, 'Fizika')
];

$sortiraneOcene = sortirajOcenePoOceni($ocene);

foreach ($sortiraneOcene as $ocena) {
    echo 'Ocena: ' . $ocena->getOcena() . ', Predmet: ' . $ocena->getPredmet() . '<br>';
}


