<?php
class Grade {
    protected $value;
    protected $subject;

    public function __construct($value, Subject $subject) {
        $this->value = $value;
        $this->subject = $subject;
    }

    public function getValue() {
        return $this->value;
    }

    public function getSubject() {
        return $this->subject;
    }
}

?>