<?php

class Student {
    private $name;
    private $course = 1;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function transferToNextCourse() {
        if ($this->isCourseCorrect($this->course)) {
            $this->course++;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCourse(): int
    {
        return $this->course;
    }

    private function isCourseCorrect($course) {
        return $course < 5;
    }
}
