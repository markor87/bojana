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
$ocena1=new Ocena();
$ocena1->setVrednost(10);
$ocena2=new Ocena();
$ocena2->setVrednost(9);
$predmet1=new Predmet();
$predmet1->setIme("Programiranje");
$predmet2=new Predmet();
$predmet2->setIme("Fizika");
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
</table>
</body>
</html>

<!--Polimorfizam se koristi kada imamo više klasa koje implementiraju isti interfejs ili nasleđuju istu apstraktnu klasu. Na taj način možemo da koristimo različite objekte klasa sa istim metodama, bez obzira na to kako se te metode implementiraju u pojedinačnim klasama.

U ovom primeru, klasa Student implementira interfejs StudentInterface koji definiše metod getIme(). Takođe, klasa Student nasleđuje apstraktnu klasu AbstractStudent koja takođe ima metod getIme(), ali ga ne implementira. To znači da svaka klasa koja nasleđuje AbstractStudent mora da implementira metod getIme(), što je slučaj sa klasom Student. Ovim se postiže polimorfizam jer se metod getIme() može koristiti za različite objekte klase Student, a implementacija metoda se može razlikovati od objekta do objekta.

Enkapsulacija se koristi kada želimo da ograničimo pristup određenim svojstvima ili metodima u klasi. U ovom primeru, svojstva $vrednost u klasi Ocena i $ime u klasi AbstractStudent su privatna, što znači da se ne mogu pristupiti direktno izvan klase. Da bi se pristupilo tim svojstvima, moraju se koristiti metode za čitanje i pisanje vrednosti tih svojstava (getteri i setteri). Ovo ograničavanje pristupa omogućava da se svojstva objekata klase zaštite od neželjenih promena i da se promene odvijaju na kontrolisan način preko odgovarajućih metoda.


Nasleđivanje se koristi kada želimo da neka klasa nasleđuje svojstva i metode drugih klasa. U ovom primeru, klasa Student nasleđuje apstraktnu klasu AbstractStudent i tako dobija svojstvo $ime. To znači da svaki objekat klase Student ima svojstvo $ime, i da se njegova vrednost može čitati i menjati pomoću metoda getIme() i setIme(). Nasleđivanje omogućava da se postojeće klase prošire i da se izbegne ponavljanje istih svojstava i metoda u više klasa.

Interfejs se koristi kada želimo da definišemo određene metode koje će se morati implementirati u klasama koje ga implementiraju. Interfejs ne sadrži implementaciju metoda, već samo njihova imena i tipove povratnih vrednosti. U ovom primeru, interfejs StudentInterface definiše metod getIme() koji vraća string. Sve klase koje implementiraju ovaj interfejs moraju da implementiraju metod getIme(), a njegova implementacija se može razlikovati od klase do klase.

Apstraktna klasa se koristi kao svojevrsna šablona za druge klase. Ona može da sadrži i implementirana svojstva i metode, ali takođe može da sadrži i apstraktne metode koje se moraju implementirati u klasama koje je nasleđuju. U ovom primeru, apstraktna klasa AbstractStudent definiše apstraktni metod getIme() koji se mora implementirati u svakoj klasi koja je nasleđuje.

Statička metoda se koristi kada želimo da pristupimo nekom metodu bez potrebe da kreiramo objekat klase. U ovom primeru, statička metoda sortirajStudenti() se koristi za sortiranje niza studenata po imenu. Statička metoda se poziva pomoću imena klase i dvotačke, a ne pomoću objekta klase.


Statičko svojstvo se koristi kada želimo da pristupimo nekom svojstvu bez potrebe da kreiramo objekat klase. U ovom primeru, statičko svojstvo $brojInstanci se koristi za čuvanje broja instanci klase Student. Statičko svojstvo se poziva pomoću imena klase i dvotačke, a ne pomoću objekta klase.

Trait se koristi kada želimo da u više različitih klasa unesemo istu funkcionalnost. Trait se može koristiti umesto nasleđivanja da bismo izbegli "deblji" nasleđivanje. U ovom primeru, trait SortTrait se koristi da bi se omogućilo sortiranje niza studenata po imenu u više različitih klasa.


Funkcija koja radi sa nizovima se koristi za rad sa podacima u obliku niza. U ovom primeru, funkcija sortirajStudenti() se koristi za sortiranje niza studenata po imenu. Funkcija prima niz studenata i vraća sortiran niz studenata. Ova funkcija se može koristiti u više različitih klasa da bi se omogućilo sortiranje studenata po imenu.
-->