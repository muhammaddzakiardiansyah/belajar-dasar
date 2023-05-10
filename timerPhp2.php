<!DOCTYPE html>
<html>

<head>
    <title>Timer</title>
    <style type="text/css">
        #timer {
            font-size: 72px;
            margin-top: 50px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Timer</h1>
    <div id="timer">000:00</div>
    <div>
        <button id="start">Start timer</button>
        <button id="stop">Stop timer</button>
        <button id="reset">Reset timer</button>
    </div>
    <script>
        var interval;
        var time = 0;

        $('#start').click(function() {
            interval = setInterval(startTimer, 10);
        });

        $('#stop').click(function() {
            clearInterval(interval);
        });

        $('#reset').click(function() {
            clearInterval(interval);
            time = 0;
            updateTimer();
        });

        function startTimer() {
            time++;

            if (time == 600000) { // 999:59 = 59999 sentimeter
                clearInterval(interval);
                alert("Waktu habis!");
            }

            updateTimer();
        }

        function updateTimer() {
            var s = Math.floor((time % 6000) / 100);
            var m = Math.floor(time / 6000);
            var sStr = s < 10 ? "0" + s : s;
            var mStr = m < 100 ? "0" + m : m;
            var timerStr = mStr + ":" + sStr;
            $('#timer').text(timerStr);
        }
    </script>
</body>

</html>

<noscript>
    Penjelasan:

    - Script tersebut adalah HTML dan JavaScript dengan menggunakan jQuery library untuk memudahkan manipulasi DOM.
    - Script mendefinisikan tiga variabel global, yaitu interval, seconds, minutes, dan hours yang berfungsi sebagai counter waktu.
    - Ketika tombol start ditekan, fungsi startTimer dipanggil setiap 1000 milidetik menggunakan fungsi setInterval dan disimpan ke dalam variabel interval.
    - Ketika tombol stop ditekan, interval yang berisi fungsi startTimer dihentikan menggunakan fungsi clearInterval.
    - Ketika tombol reset ditekan, interval dihentikan, dan counter waktu direset menjadi 0. Nilai counter ditampilkan kembali ke tampilan awal.
    - Fungsi startTimer menambahkan 1 detik ke variabel seconds, dan menyesuaikan variabel minutes dan hours jika diperlukan. Kemudian, nilai yang dihasilkan dari counter waktu akan ditampilkan di dalam elemen HTML yang sesuai menggunakan fungsi jQuery.

    Sekarang Anda dapat menggunakan script ini untuk membuat timer dengan fitur start, stop, dan reset. Anda dapat menambahkan CSS untuk mempercantik tampilan timer.
</noscript>