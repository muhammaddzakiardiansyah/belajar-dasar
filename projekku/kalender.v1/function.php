<?php

class Kalender extends DateTime {
    protected $year;
    protected $monthNumber;
    protected $currentDate;
    protected $weekDays = [
        'monday', 'tusday', 'wednesday', 'trusday', 'friday', 'saturday', 'sunday'
    ];
    protected $weeks = [];


    public function getWeekDays() {
        return $this->weekDays;
    }

    public function getWeeks() {
        return $this->weeks;
    }

    public function getDay() {
        return $this->currentDate;
    }

    public function setDay($currentDate) {
        $this->currentDate = $currentDate;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getMonthNumber() {
        return $this->monthNumber;
    }

    public function setMonthNumber($monthNumber) {
        $this->monthNumber = $monthNumber;
    }

    public function create() {
        $date = $this->setDate($this->getYear(), $this->getMonthNumber(), 1);
        $daysInMonth = $date->format('t');
        $startDay = $date->format('N');
        $days = array_fill(0, ($startDay - 1), '');

        for($x = 1; $x <= $daysInMonth; $x++) {
            $days[] = $x;
        }

        $this->weeks = array_chunk($days, 7);
    }

    public function currentDay() {
        $today_day = date('d');
        $today_month = date('m');
        $today_year = date('Y');

        if($this->getYear() == $today_year && $this->getMonthNumber() == $today_month && $this->getDay() == $today_day) {
            return 'this_today';
        } else {
            return 'nums_day';
        }
    }
    
}