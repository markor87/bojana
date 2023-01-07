<?php

class Student extends AbstractStudent
{
    use AverageGradeTrait;

    protected $grades;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->grades = [];
    }

    public function addGrade($grade, $subject)
    {
        $this->grades[$subject] = $grade;
    }

    public function getGrades(): array
    {
        return $this->grades;
    }
}

$student = new Student('Pera Perić');

$math = new Subject('Matematika');
$student->addGrade(new Grade(8, $math), $math);

$physics = new Subject('Fizika');
$student->addGrade(new Grade(7, $physics), $physics);

$grades = $student->getGrades();

$name = $student->getName();
$average = $student->averageGrade($grades);
?>