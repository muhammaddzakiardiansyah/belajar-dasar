<?php 

require 'function.php';

$calendar = new Kalender();

$calendar->setYear(date('y'));
$calendar->setMonthNumber(date('m'));
$calendar->setDay(date('d'));

var_dump( $calendar->getWeeks());

$calendar->create();
?>

<!-- html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender | punyaku</title>
    <style>
        .nums_day {
            background-color: red;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr clospan="7">
                <th align="center"><?php echo date('F') ?></th>
            </tr>
            <tr>
                <?php foreach($calendar->getWeekDays() as $dayName) : ?>
                    <th><?php echo $dayName; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach($calendar->getWeeks() as $week) : ?>
            <?php echo json_encode($week[0]); ?>
            <tr>
                <?php foreach($week as $dayNumber) : ?>
                    <td class="<?php echo $calendar->currentDay(); ?>"><?php echo $dayNumber; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>