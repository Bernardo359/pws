<?php

abstract class Member{
    public String $fullName;
    protected int $enrollmentId;
    private $monthlyfee;

    public function __construct($fullName, $enrollmentId, $monthlyfee)
    {
        $this->fullName = $fullName;
        $this->enrollmentId = $enrollmentId;
        $this->monthlyfee = $monthlyfee;
    }

    public function checkIn(){

    }
}