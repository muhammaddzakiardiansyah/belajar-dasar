<?php

// Menentukan bulan dan tahun yang akan ditampilkan
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// Menampilkan nama bulan dan tahun
echo "<h2>" . date('F Y', strtotime($year . '-' . $month . '-01')) . "</h2>";

// Membuat tabel kalender
echo "<table>";
echo "<tr><th>Minggu</th><th>Senin</th><th>Selasa</th><th>Rabu</th><th>Kamis</th><th>Jumat</th><th>Sabtu</th></tr>";

// Menentukan tanggal pertama dari bulan yang ditampilkan
$first_day = date('N', strtotime($year . '-' . $month . '-01'));

// Menentukan jumlah hari dalam bulan yang ditampilkan
$last_day = date('t', strtotime($year . '-' . $month . '-01'));

// Menentukan tanggal terakhir dari bulan sebelumnya
$previous_month_last_day = date('t', strtotime('-1 month', strtotime($year . '-' . $month . '-01')));

// Menghitung jumlah sel kosong di awal tabel kalender
$blanks = $first_day - 1;

// Menghitung jumlah sel kosong di akhir tabel kalender
$remaining_days = 7 - ((($blanks + $last_day) % 7) ?: 7);

// Menampilkan sel kosong di awal tabel kalender
echo "<tr>";
for ($i = 0; $i < $blanks; $i++) {
    echo "<td></td>";
}

// Menampilkan tanggal dari bulan yang ditampilkan
for ($day = 1; $day <= $last_day; $day++) {
    $date = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));
    echo "<td>$day</td>";

    // Menampilkan baris baru setiap hari Sabtu
    if (date('N', strtotime($date)) == 6 && $day != $last_day) {
        echo "</tr><tr>";
    }
}

// Menampilkan sel kosong di akhir tabel kalender
for ($i = 0; $i < $remaining_days; $i++) {
    echo "<td></td>";
}
echo "</tr>";

echo "</table>";

?>

<noscript>
    - Kode di atas akan menampilkan kalender dari bulan dan tahun yang ditentukan melalui parameter GET atau secara default akan menampilkan kalender untuk bulan dan tahun saat ini.
    - Kode menghitung tanggal pertama dan terakhir dari bulan yang ditampilkan, dan menghitung jumlah sel kosong di awal dan akhir tabel kalender untuk menampilkan sel kosong di antara tanggal-tanggal yang ditampilkan.
    - Kalender ditampilkan dalam bentuk tabel HTML dengan hari Minggu hingga Sabtu sebagai header kolom, dan setiap tanggal ditampilkan dalam sel-sel tabel dengan baris baru dimulai setiap hari Sabtu.
</noscript>