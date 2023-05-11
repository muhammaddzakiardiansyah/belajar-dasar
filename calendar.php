<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calender</title>
	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%20type%3D%22text%2Fcss%22%3E%0A%09%09.prev%7B%0A%09%09%09text-align%3A%20left%3B%0A%09%09%7D%0A%09%09.next%7B%0A%09%09%09text-align%3A%20right%3B%0A%09%09%7D%0A%09%09.day%2C%20.month%2C%20.weekday%7B%0A%09%09%09text-align%3A%20center%3B%0A%09%09%7D%0A%09%09.today%7B%0A%09%09%09background%3A%20yellow%3B%0A%09%09%7D%0A%09%09.blank%7B%0A%0A%09%09%7D%0A%09%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<style>" title="<style>" />
</head>
<body>
<?php 
$month = isset($_GET['month'])? intval($_GET['month']):date('m');
$year = isset($_GET['year'])? intval($_GET['year']):date('Y');

$newCal = new Calender($month, $year);

echo $newCal->html();

 ?>	
</body>
</html>

<?php 

class Calender{
	/* Date/Time*/

	public $monthToUse;
	protected $prepared = false;
	protected $days = array();

	public function __construct($month, $year){
		/*building a date and time for the month that we display on page*/
		$this->monthToUse = DateTime::createFromFormat('Y-m', sprintf("%04d-%02d", $year, $month));
		$this->prepare();

	}

	protected function prepare(){
		//we will build a array of info about each day

		foreach (array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa') as $dow) {
			$endOfRow = ($dow=='Sa');
			$this->days[] = array('type'=>'dow', 'label'=> $dow, 'endOfRow'=> $endOfRow);
			}
			//next placeholder up to the first day of the week
			for($i=0, $j=$this->monthToUse->format('w'); $i<$j; $i++){
				$this->days[] = array('type'=>'blank');
			}			
			//now one item for each day in the month.......
			$today = date("Y-m-d");
			$days = new DatePeriod($this->monthToUse, new DateInterval("P1D"), $this->monthToUse->format("t") - 1);
			foreach ($days as $day) {
				$isToday = ($day->format("Y-m-d")==$today);
				$endOfRow = ($day->format('w')==6);
				$this->days[] = array('type'=>'day', 'label'=>$day->format('j'), 'today'=> $isToday, 'endOfRow'=>$endOfRow);
			}
			if (!$endOfRow) {
				for($i=0, $j = 6 - $day->format('w'); $i<$j; $i++){
					$this->days[] = array('type'=>'blank');
				}
			}
		}

		public function html($opts = array()){
			if (!isset($opts['id'])) {
				$opts['id'] = 'calender';
				
			}
			if (!isset($opts['month_link'])) {
				$opts['month_link'] = '<a href="'.htmlentities($_SERVER['PHP_SELF']).'?'.'month=%d&year=%d">%s</a>';
			}
			$classes = array();
			foreach (array('prev', 'month', 'next', 'weekday', 'blank', 'day', 'today') as $class) {
				if (isset($opts['class']) && isset($opts['class'][$class])) {
					$classes[$class] = $opts['class'][$class];
				}else{
					$classes[$class]= $class;
				}
			}
			//build prev month link........
			$prevMonth = clone $this->monthToUse;
			$prevMonth->modify("-1 month");
			$prevMonthLink = sprintf($opts['month_link'], $prevMonth->format('m'), $prevMonth->format('Y'), "≪");

			//build Next month link........
			$nextMonth = clone $this->monthToUse;
			$nextMonth->modify("+1 month");
			$nextMonthLink = sprintf($opts['month_link'], $nextMonth->format('m'), $nextMonth->format('Y'), "≫");

			//making calender structurre........
			$html = '<table border="3" id="'.htmlentities($opts['id']).'" width="300px" height="300px">
			<tr>
			<td class="'.htmlentities($classes['prev']).'">'.$prevMonthLink.'</td>
			<td class="'.htmlentities($classes['month']).'" colspan="5">'.$this->monthToUse->format('F Y'). '</td>
			<td class="'.htmlentities($classes['next']).'">'.$nextMonthLink.'</td></tr>';
			$html .='<tr>';
			$lastDayIndex = count($this->days) - 1;
			foreach ($this->days as $i => $day) {
				switch ($day['type']) {
					case 'dow':
						// code...
						$class = 'weekday';
						$label = htmlentities($day['label']);
						break;
					case 'blank':
						//code
						$class = 'blank';
						$label = "&nbsp";
						break;
					case 'day':
						//code
						$class = $day['today']?'today':'day';
						$label = htmlentities($day['label']);
						break;
				}
				$html .= '<td class="'.htmlentities($classes[$class]).'">'.$label.'</td>';

				if (isset($day['endOfRow']) && $day['endOfRow']) {
					$html .= "</tr>";
					if ($i != $lastDayIndex) {
						$html .='<tr>';
						
					}
				}			
			}
			$html .= '</table>';
			return $html;
		}
		public function text(){
			$lineLength = strlen("Su Mo Tu We Th Fr Sa");
			$header = $this->monthToUse->format('F Y');
			$headerSpacing = floor($lineLength - strlen($header)/2);
			$text = str_repeat(' ', $headerSpacing). $header."<br />";

			foreach ($this->days as $i => $day) {
				switch ($day['type']) {
					case 'dow':
						// code...
						$text .=sprintf('%2s', $day['label']);
						break;
					case 'blank':
						//code
						$text .= ' ';
						break;
					case 'day':
						//code
						$text .=sprintf('%2d', $day['label']);
						break;
				}
				$text .= (isset($day['endOfRow']) && $day['endOfRow']) ? "<br />" :" ";
		}
		if ($text[strlen($text-1)] != "<br />") {
			$text .= "<br>";
			
		}
		return $text;
	}
}








 ?>