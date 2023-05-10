<!DOCTYPE html>
<html>

<head>
    <title>Timer</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Timer</h1>
    <div>
        <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
    </div>
    <div>
        <button id="start">Start</button>
        <button id="stop">Stop</button>
        <button id="reset">Reset</button>
    </div>
    <script>
        var interval;
        var seconds = 0,
            minutes = 0,
            hours = 0;

        $('#start').click(function() {
            interval = setInterval(startTimer, 1000);
        });

        $('#stop').click(function() {
            clearInterval(interval);
        });

        $('#reset').click(function() {
            clearInterval(interval);
            seconds = 0;
            minutes = 0;
            hours = 0;
            $('#seconds').text('00');
            $('#minutes').text('00');
            $('#hours').text('00');
        });

        function startTimer() {
            seconds++;

            if (seconds == 60) {
                seconds = 0;
                minutes++;
            }

            if (minutes == 60) {
                minutes = 0;
                hours++;
            }

            var s = seconds < 10 ? '0' + seconds : seconds;
            var m = minutes < 10 ? '0' + minutes : minutes;
            var h = hours < 10 ? '0' + hours : hours;

            $('#seconds').text(s);
            $('#minutes').text(m);
            $('#hours').text(h);
        }
    </script>
</body>

</html>