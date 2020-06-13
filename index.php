<?php
//Koneksi
error_reporting(E_ALL^E_NOTICE);
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"dbtugas");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
//Deklarasi Variable
$kode = $_POST['kode'];
$jml = $_POST['jumlahbeli'];
$hsatuan = 5000;
$cara = $_POST['pembayaran'];
$diskon = 0;
if($_POST['pembayaran']=="bni"){
    $diskon = 5;
}else{
    $diskon = 0;
}
$ongkir = 0;
if($_POST['ongkir']=="ya"){
    $ongkir = 30000;
}else{
    $ongkir = 0;
}
$sub = ($jml*$hsatuan);
$disc = $sub*$diskon/100;
$jml_bayar = $sub-$disc+$ongkir;

//Proses Input Data
if(isset($_POST['submit'])){
$sql = "INSERT INTO `transaksi` (`kode`, `namabunga`, `jumlahbeli`, `hargasatuan`, `carabayar`, `diskon`, `ongkir`, `jumlahbayar`) 
VALUES ('$kode','Bunga Citra Lestari','$jml','$hsatuan','$cara','$disc','$ongkir','$jml_bayar')";
mysqli_query ($con,$sql);
}
//Tampil Data
$hasil = mysqli_query($con, "select * from transaksi");
//Update Data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
</head>
<body>
<form name="input" method="post" >
    <h3>INPUT DATA</h3>
    <table>
    <tr>
        <td>KODE</td>
        <td><input type="text" name="kode"></td>
    </tr>
    <tr>
        <td>Pembayaran</td>
        <td><select name="pembayaran">
                <option value="0">Tunai/Debit</option>
                <option value="bni">BNI Card</option>
                <option value="bca">BCA Card</option>
            </select></td>
    </tr>
    <tr>
        <td>Jumlah Beli</td>
        <td><input type="number" name="jumlahbeli"></td>
    </tr>
    <tr>
        <td>Pilih Pengiriman</td>
        <td>
            <input type="radio" name="ongkir" value="ya"> Kirim
            <input type="radio" name="ongkir" value="tidak"> Tidak Kirim
        </td>
    </tr>
    <tr>
        <td><input type="submit" name="submit" value="Simpan"> </td>
    </tr>
</table>
</form>
<br>
<br>
<h3>OUTPUT</h3>
<table border="1">
    <tr>
        <td>Kode</td>
        <td>Nama Bunga</td>
        <td>Jumlah Beli</td>
        <td>Harga Satuan</td>
        <td>Cara Bayar</td>
        <td>Diskon</td>
        <td>Biaya Kirim</td>
        <td>Jumlah Bayar</td>
        <td>Action</td>
    </tr>
    <?php
    while($data = mysqli_fetch_array($hasil,MYSQLI_NUM))
    {
        echo " <tr><td>".$data[0]."</td>
                    <td>".$data[1]."</td>
                    <td>".$data[2]."</td>
                    <td>".$data[3]."</td>
                    <td>".$data[4]."</td>
                    <td>".$data[5]."</td>
                    <td>".$data[6]."</td>
                    <td>".$data[7]."</td>
                    <td><a href='update.php?kode=".$data[0]."'>Update</a> | <a href='index.php?kode=".$data[0]."&hapus=ya'>Delete</a></td>
               </tr>";
    }
    $kode=$_GET['kode'];
    $hapus=$_GET['hapus'];
    echo $kode;
    echo $hapus;
    if ($hapus=="ya"){
        $sql="delete from transaksi where kode='$kode'";
        $hasil=mysqli_query($con,$sql);
        ?>
        <script>
            alert("Hapus Berhasil");
            window.location = "index.php";

        </script>
    <?php
    }
    ?>

</table>
</body>
</html>