<?php 

class Calender {

    protected $currentYear;
    protected $currentMonth;
    protected $currentDays;
    protected $currentDate;
    protected $daysInMonth;
    protected $currentWeeks = [
        'Monday', 'Tusday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday', 'Sunday'
    ];

    public function getCurrentWeeks() {
        return $this->currentWeeks;
    }

    private function _showDay($callNumber) {
        if($this->currentDate == 0) {
            $firstDay = date('N', strtotime($this->currentYear.'-'.$this->currentMonth));
        }

        if(intval($callNumber) == intval($firstDay)) {
            $this->currentDays = 1;
        }

        if( ($this->currentDays != 0) && ($this->currentDays <= $this->daysInMonth) ) {
            $this->currentDate = date('Y-m-d', strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDays)));

            $cellContent = $this->currentDays;

            $this->currentDays++;
        } else {
            $this->currentDate = null;
            $cellContent = null;
        }

        $today_day = date('d');
        $today_month = date('m');
        $today_year = date('Y');

        
    }
}