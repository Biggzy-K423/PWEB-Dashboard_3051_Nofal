<html lang="en">
        <head>
      <meta charset="UTF-8" />
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <title>Adel Noval</title>
      <link rel="stylesheet" href="dashboard.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
      <?php
      $serverName = "localhost";
      $userName = "root";
      $password = "";
      $dbname = "pweb-pr";

      $con = mysqli_connect($serverName, $userName, $password, $dbname);

      $sql = "SELECT * FROM usertopup";
      $result = mysqli_query($con,$sql);

      ?>
      <div class="container">
        <nav>
          <ul>
            <li><a href="#" class="logo">
              <img src="profile-user.png">
              <span class="nav-item">Admin</span>
            </a></li>
            <li><a href="#">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>
            <li><a href="#">
              <i class="fas fa-chart-bar"></i>
              <span class="nav-item">Result</span>
            </a></li>
            <li><a href="#" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>
        <section class="main">
          <div class="main-top">
            <h1>Dashboard </h1>
          </div>
          <div class="users">
            <div class="card">
              <img src="1000_F_174268404_6LKDmsYrGKcgtJ9BTqDy13vknIc51AEx.jpg">
              <h4>Praul Joki Store</h4>
              <p>Tempat joki</p>
              <div class="per">
              </div>
            </div>
            <div class="card">
              <img src="pie-graph.png" alt="">
              <h4>Total customer</h4>
              <div class="per">
                <table>
                  <tr>
                    <td><span>4</span></td>
                  </tr>
                  <tr>
                    <td>Orang</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <section class="attendance">
            <div class="attendance-list">
              <div class="flex-between">
                <h1>List Konsumen</h1>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Kategori Game</th>
                    <th>Tanggal Masuk</th>
                    <th>Perkiraan Selesai</th>
                    <th>Status</th>
                    <th>No Hp</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["ID_Pelanggan"] . "</td>";
                        echo "<td>" . $row["Pelanggan"] . "</td>";
                        echo "<td>" . $row["Kategori_Game"] . "</td>";
                        echo "<td>" . $row["Tanggal_Masuk"] . "</td>";
                        echo "<td>" . $row["Perkiraan_Selesai"] . "</td>";
                        echo "<td>" . $row["Status"] . "</td>";
                        echo "<td>" . $row["Nomor_Hp"] . "</td>";
                        echo "</td>"; 

                        echo "<td><button onclick='edit(" . $row['ID_Pelanggan'] . ")'>Edit</button></td>"; 
                        echo "<td><button>hapus</button></td>";
                        echo "</td>";
                    }
                } else {
                    echo "0 results";
                }                
                ?>
                
                </tbody>
              </table>
            </div>
          </section>
        </section>
      </div>
      <script>
      function edit(ID_Pelanggan) {
        window.location.href = 'edit.php?ID_Pelanggan=' + ID_Pelanggan;
        }
      </script>
    </body>
    <script>
    </script>
    </html>
    </span>