<?php

$xml_string = '<data><name>John Doe</name><age>30</age></data>'; // XML string yang akan dikonversi

$xml = simplexml_load_string($xml_string); // Load XML string ke objek SimpleXML
$json = json_encode($xml); // Konversi objek SimpleXML ke JSON
$array = json_decode($json, TRUE); // Konversi JSON ke array

echo json_encode($array); // Output hasil konversi dalam format JSON

?>

<noscript>
    - Kode di atas mengambil XML string dan mengkonversinya menjadi objek SimpleXML. Kemudian objek SimpleXML dikonversi ke JSON menggunakan json_encode(). Terakhir, JSON dikonversi ke array menggunakan json_decode().
    - Hasil konversi diubah kembali menjadi format JSON menggunakan json_encode() dan di-outputkan sebagai respons dari server.
</noscript>