<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/style_order.css">
<link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
<div class="judul container col-75">

  <div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
  </div>


  <h2>Form Pemesanan tiket</h2>
  <p>Masukan data anda untuk memesan tiket</p>
</div>
<div>

</div>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="#" method="POST">

        <div class="row">
          <div class="col-50">
            <h3>Data Pemesanan</h3>
            <label for="fname"> Nama lengkap</label>
            <input type="text" required id="nama-depan" name="namadepan" value="<?php echo isset($_POST["namadepan"]) ? $_POST["namadepan"] : ''; ?>"  placeholder="John M. Doe">
            <label for="email"> Email</label>
            <input type="text" required id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="john@example.com">

            <div class="row">
              <div class="col-50">

                <div class="categories">
                  <div class="select">
                    <label for="kotaAsal"> Kota asal</label>
                    <select name="kotaAsal" id="categories">
                      <option value="Jakarta" selected="selected">Jakarta</option>
                      <option value="Bandung">Bandung</option>
                      <option value="Kalimantan">Kalimantan</option>
                      <option value="Sumatera">Sumatera</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- aduh mau jalan jalan -->

              <div class="col-50">
                <div class="categories">
                  <div class="select">
                    <label for="kotaTujuan"> Kota tujuan</label>
                    <select name="kotaTujuan" id="categories">
                      <option value="Jakarta">Jakarta</option>
                      <option value="Bandung" selected="selected">Bandung</option>
                      <option value="Kalimantan">Kalimantan</option>
                      <option value="Sumatera">Sumatera</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-50">
                <label for="state">Jumlah penumpang</label>
                <div class="categories">
                  <div class="counter">
                    <input type="number" name="jumlahPenumpang" value="<?php echo isset($_POST["jumlahPenumpang"]) ? $_POST["jumlahPenumpang"] : '1'; ?>" step="1" min="1" max="100">
                  </div>
                </div>
              </div>

              <div class="col-50">
                <label for="zip">Kelas Penerbangan</label>
                <div class="categories">
                  <div class="select">
                    <select name="kelas" id="categories">
                      <option value="Ekonomi" selected="selected">Ekonomi</option>
                      <option value="VIP" >VIP</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>

            <label for="cname">Name on Card</label>
            <input type="text" required id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" required id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" required id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>s
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> kirim bukti transaksi ke Email terkait
        </label>
        <input type="submit" name="submit" value="Hitung Total" class="btn">
      </form>
    </div>
  </div>

<!--  Untuk PHP-->
<?php

if (isset($_POST['submit']))
{
   panggilIsiForm();
}
function panggilIsiForm()
{
  echo '
  <div class="col-25">
      <div class="container">
        <h4>Data Anda</h4>';

        // set variable
        $nama = $_POST['namadepan'];
        $email = $_POST['email'];
        $kotaAsal = $_POST['kotaAsal'];
        $kotaTujuan = $_POST['kotaTujuan'];
        $jumlahPenumpang = $_POST['jumlahPenumpang'];
        $kelas = $_POST['kelas'];

        //sedikit trik buat data fiktif karena males ngetik awkoawkokaowko
        if ($kotaAsal == "Jakarta") {
          $lKotaAsal = 1;
        } elseif ($kotaAsal == "Bandung") {
          $lKotaAsal = 2;
        } elseif ($kotaAsal == "Kalimantan") {
          $lKotaAsal = 3;
        } else {
          $lKotaAsal = 4;
        }


        if ($kotaTujuan == "Jakarta") {
          $lKotaTujuan = 1;
        } elseif ($kotaTujuan == "Bandung") {
          $lKotaTujuan = 2;
        } elseif ($kotaTujuan == "Kalimantan") {
          $lKotaTujuan = 3;
        } else {
          $lKotaTujuan = 4;
        }
        // end disini

        //validasi nama
        if (isset($_POST["namadepan"]) && !empty($_POST["namadepan"])) {
          echo '<p>Nama : '.$nama.'</p>';
        } else {
          echo "<p>Nama belum diisi</p>";
        }

        //valisasi email
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
          echo '<p>Email : '.$email.'</p>';
        } else {
          echo "<p>Email belum diisi</p>";
        }

        echo '<p> Kota Asal : '.$kotaAsal.'</p>';
        echo '<p> Kota Tujuan : '.$kotaTujuan.'</p>';

        // garis pemisah
        echo "<hr />
        <h4>Total Harga</h4>";

        //valisasi jumlah penumpang (gak guna sebenernya)
        if (isset($_POST["jumlahPenumpang"]) && !empty($_POST["jumlahPenumpang"] && $jumlahPenumpang < 100)) {
          echo '<p>Jumlah penumpang : <span class="value"> '.$jumlahPenumpang.' Orang</span></p>';
        } else {
          echo "<p>Jumlah penumpang melebihih batas maksimal</p>";
        }


        if ($kelas == "Ekonomi") {

          if ($lKotaAsal == $lKotaTujuan) {
            $hargaTiket = 400000;
          } elseif ($lKotaAsal < $lKotaTujuan) {
            $lakhir = $lKotaTujuan - $lKotaAsal;
            $hargaTiket = 400000+($lakhir*200000);
          } else {
            $lakhir = $lKotaAsal - $lKotaTujuan ;
            $hargaTiket = 400000+($lakhir*200000);
          }

          echo '<p>Harga tiket Ekonomi : <span class="value"> Rp '.number_format($hargaTiket).'</span></p>';
          echo '<p>Total Harga :<span class="value"> Rp '.number_format(($hargaTiket*$jumlahPenumpang)).'</span></p>';
        }
        else {

          if ($lKotaAsal == $lKotaTujuan) {
            $hargaTiket = 800000;
          } elseif ($lKotaAsal < $lKotaTujuan) {
            $lakhir = $lKotaTujuan - $lKotaAsal;
            $hargaTiket = 800000+($lakhir*300000);
          } else {
            $lakhir = $lKotaAsal - $lKotaTujuan ;
            $hargaTiket = 800000+($lakhir*300000);
          }

          echo '<p>Harga tiket VIP : <span class="value"> Rp '.number_format($hargaTiket).'</span></p>';
          echo '<p>Total Harga : <span class="value"> Rp '.number_format(($hargaTiket*$jumlahPenumpang)).'</span></p>';
        }


          if (isset($_POST["namadepan"]) && !empty($_POST["namadepan"]) && isset($_POST["email"]) && !empty($_POST["email"])){
            echo '
            <form action="sukses.php
            " method="POST">
            <input type="submit" name="submit" value="Proses" class="btn-sukses">
            </form>';
          } else {
          echo '<button type="button" class="btn-error" disabled>Data Belum lengkap Boss</button>';
          }

        }

?>

</body>
</html>
