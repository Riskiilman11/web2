<?php
error_reporting(E_ALL^E_NOTICE);
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"dbtugas");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
$kode=$_GET['kode'];
$sql="select * from transaksi where kode='$kode'";
$hasil=mysqli_query($con,$sql);
$data=mysqli_fetch_array($hasil,MYSQLI_ASSOC);

if(isset($_POST['update'])){
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
    $sql = "update transaksi set 
    kode='$kode',
    namabunga='Bunga Citra Lestari',
    jumlahbeli='$jml',
    hargasatuan='$hsatuan',
    carabayar='$cara',
    diskon='$disc',
    ongkir='$ongkir',
    jumlahbayar='$jml_bayar' where kode='$kode'";
    mysqli_query ($con,$sql);
    ?>
    <script>
        alert("Update Berhasil");
        window.location = "index.php";

    </script>
    <?php

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Update</title>
</head>
<body>
<form action="update.php" name="update" method="post" >
    <h3>UPDATE DATA</h3>
    <table>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="kode" value="<?php echo $data['kode'];?>"></td>
        </tr>
        <tr>
            <td>Pembayaran</td>
            <td><select name="pembayaran">
                    <option value="<?php echo $data['carabayar'];?>"><?php echo strtoupper($data['carabayar'])." Card";?></option>
                    <option value="bni">BNI Card</option>
                    <option value="bca">BCA Card</option>
                </select></td>
        </tr>
        <tr>
            <td>Jumlah Beli</td>
            <td><input type="number" name="jumlahbeli" value="<?php echo $data['jumlahbeli'];?>"></td>
        </tr>
        <tr>
            <td>Pilih Pengiriman</td>
            <td>
            <?php if ($data['ongkir']!=0){
                    echo
                    "
                    <input type='radio' checked name='ongkir' value='ya'> Kirim
                    <input type='radio' name='ongkir' value='tidak'> Tidak Kirim
                    ";
                }else{
                    echo
                    "
                    <input type='radio' name='ongkir' value='ya'> Kirim
                    <input type='radio' checked name='ongkir' value='tidak'> Tidak Kirim
                    ";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="update" value="Update"> </td>
        </tr>
    </table>
</form>
</body>
</html>