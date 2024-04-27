<?php
require 'koneksi.php'; // Sertakan file koneksi.php

// Variabel untuk menyimpan data user
$ID_Pelanggan = "";
$Pelanggan = "";
$Kategori_Game = "";
$Nomor_Hp = "";
$Perkiraan_Selesai = "";
$Status = "";

// Periksa apakah ID user diteruskan melalui URL
if (isset($_GET['ID_Pelanggan'])) {
    // Dapatkan ID user dari parameter URL
    $ID_Pelanggan = $_GET['ID_Pelanggan'];

    // Query untuk mengambil data user berdasarkan ID
    $query = "SELECT * FROM usertopup WHERE ID_Pelanggan = $ID_Pelanggan";

    // Eksekusi query
    $result = $con->query($query);

    // Periksa apakah ada hasil
    if ($result->num_rows > 0) {
        // Ambil data user
        $row = $result->fetch_assoc();
        $Pelanggan = $row['Pelanggan'];
        $Kategori_Game = $row['Kategori_Game'];
        $Nomor_Hp = $row['Nomor_Hp'];
        $Perkiraan_Selesai = $row['Perkiraan_Selesai'];
        $Status = $row['Status'];
        // Anda dapat mengambil data lainnya sesuai kebutuhan
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adel Noval</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="edit.css">
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="profile-user.png" alt="Profile Image">
            <span class="nav-item">Admin</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Result</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="testbox">
      <form action="" method="POST">
        <div class="item">
          <p>Nama</p>
          <div class="name-item">
            <input type="hidden" id="ID_Pelanggan" name="ID_Pelanggan" value="<?php echo $ID_Pelanggan; ?>">
          </div>
          <div class="name-item">
            <input type="text" name="Pelanggan" value="<?php echo $Pelanggan; ?>">
          </div>
        </div>
        <div class="item">
          <p>Game</p>
          <input type="text" name="Kategori_Game" value="<?php echo $Kategori_Game; ?>">
        </div>
        <div class="item">
          <p>No.Hp</p>
          <input type="text" name="Nomor_Hp" value="<?php echo $Nomor_Hp; ?>"/>
        </div>
        <div class="item">
          <p>Perkiraan Selesai</p>
          <input type="text" name="Perkiraan_Selesai" value="<?php echo $Perkiraan_Selesai; ?>"/>
        </div>
        <div class="item">
          <p>Progres</p>
          <select name="Status" id="Status">
            <option value="Selesai" <?php if ($Status == "Selesai") echo "selected"; ?>>Selesai</option>
            <option value="Proses" <?php if ($Status == "DIbatalkan") echo "selected"; ?>>Proses</option>
            <option value="Dibatalkan" <?php if ($Status == "Dibatalkan") echo "selected"; ?>>Dibatalkan</option>
          </select>
        </div>
        <button id="submitEntryBtn" type="submit">Simpan</button>
      </form>
    </div>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const submitEntryBtn = document.getElementById('submitEntryBtn');
      submitEntryBtn.addEventListener('click', function(event) {
          event.preventDefault(); // Menghentikan perilaku default dari tombol submit

          const ID_Pelanggan = "<?php echo $ID_Pelanggan; ?>";
          const Pelanggan = document.querySelector('input[name="Pelanggan"]').value;
          const Kategori_Game = document.querySelector('input[name="Kategori_Game"]').value;
          const Nomor_Hp = document.querySelector('input[name="Nomor_Hp"]').value;
          const Perkiraan_Selesai = document.querySelector('input[name="Perkiraan_Selesai"]').value;
          const Status = document.querySelector('select[name="Status"]').value;

          const formData = new FormData();
          formData.append('ID_Pelanggan', ID_Pelanggan);
          formData.append('Pelanggan', Pelanggan);
          formData.append('Kategori_Game', Kategori_Game);
          formData.append('Nomor_Hp', Nomor_Hp);
          formData.append('Perkiraan_Selesai', Perkiraan_Selesai);
          formData.append('Status', Status);

          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'conedit.php', true);
          xhr.onload = function() {
              if (xhr.status === 200) {
                  alert('Data berhasil diupdate!');
                  window.location.href = 'dashboardadmin.php';
              } else {
                  alert('Gagal mengupdate data!');
              }
          };
          xhr.onerror = function() {
              alert('Terjadi kesalahan saat mengirim data!');
          };
          xhr.send(formData);
      });
  });
  </script>
</body>
</html>
