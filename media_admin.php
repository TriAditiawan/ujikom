<?php
  session_start();
  include "koneksi.php";
  include "akses.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Media Admin</title>
  <link rel="stylesheet" href="css/style_content.css" type="text/css" />
  <link rel="stylesheet" href="css/style_table.css" type="text/css" />
</head>

<body>
  <div class="style">
    <!-- <div class="header">
      <img src="images/bg.png" width="100%" height="300px" />
    </div> -->

    <div class="menu">
      <?php include "menu_admin.php"; ?>
    </div>

    <div id="isi">
      <?php include "content_admin.php"; ?>
    </div>

    <div id="clearer"></div>

    <div class="footer" align="center">
      <p>&copy by Tri</p>
    </div>
  </div>
</body>

</html>