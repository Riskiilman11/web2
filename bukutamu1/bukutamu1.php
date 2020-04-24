<html>
    <head>
        <title> Buku Tamu Tanpa Database </title>
    </head>
<body>
<h2> BUKU TAMU</h2><hr>
Terima kasih atas kunjungan anda, silakan mengisi buku tamu, sebelum berkomentar :
<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="get">
<pre>
Nama    : <input type="text" name="Nama">
Alamat    : <input type="text" name="Alamat" size="40">
Kota    : <input type="text" name="Kota" size="25">
Kode Pos: <input type="text" name="KodePos" size="8">
Propinsi: <select name="pilih"><option>Banten</option><option>Jawa Barat</option><option>Jawa Timur</option><option>Jawa Tengah</option></select>
E-Mail    : <input type="text" name="E-Mail" size="35">
Komentar:<textarea name="komentar" rows=4 cols=100></textarea>
<p>
<input type=submit value="Kirim Data" name="submit"> <input type=reset value="Hapus Data">
</form>
<?php

// PENJELASAN : $_GET adalah Meminta data dari sumber daya yang ditentukan

// meminta data dari form nama
$nama = $_GET['Nama'] ;

// meminta data dari form alamat
$alamat = $_GET['Alamat'] ;

// meminta data dari form kota
$kota = $_GET['Kota'] ;

// meminta data dari form  kodepos
$kodepos = $_GET['KodePos'] ;

// meminta data dari form pilih
$propinsi = $_GET['pilih'] ;

// meminta data dari form E-Mail
$email = $_GET['E-Mail'] ;

// meminta data dari form komentar
$komentar = $_GET['komentar'] ;


if ($_GET['submit']) {
    echo "Nama : ".$nama."<br>" ;
    echo "Alamat : ".$alamat."<br>" ;
    echo "Kota : ".$kota."<br>" ;
    echo "Kode Pos : ".$kodepos."<br>" ;
    echo "Propinsi : ".$propinsi."<br>" ;
    echo "Email : ".$email."<br>" ;
    echo "Komentar : ".$komentar."<br>" ;
    }
?>