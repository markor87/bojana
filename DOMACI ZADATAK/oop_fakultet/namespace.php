<?php
namespace School;

trait AverageGradeTrait {
    public static function averageGrade(array $grades) {
        $sum = 0;
        foreach ($grades as $grade) {
            $sum += $grade->getValue();
        }
        return $sum / count($grades);
    }
}

class Student {
    use AverageGradeTrait;
    // ...
}
