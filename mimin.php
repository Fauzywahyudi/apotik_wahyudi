<link rel="stylesheet" type="text/css" href="style.css" />
<div class="container1">
  <div class="grid">

      <div class="dh6"><img src="image/logo.png" alt="" id="logo register"></div>

    </div>
  </div>
</div>
<div class="container2">
  <div class="grid">
    <div class="dh12" align="center" >
      <div class="" id="register">
        <br>
        <p><h2>Login Admin</h2></p>
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <input name="id" type="text" id="username" placeholder="Username">
            <input name="password" type="password" id="password" placeholder="Password"><br><br>
            <input name="login" type="submit" id="login" value="Login" class="btn btn-edit">
            <input name="hal_utama" type="submit" id="login" value="Home" class="btn btn-back">
        </form>
        <br>
        <?php
        if(isset($_POST["login"])){
          include "koneksi.php";
          $sqlm = mysqli_query($kon, "select * from admin where id=md5('$_POST[id]') and password=md5('$_POST[password]')");
          $rm=mysqli_fetch_array($sqlm);
          $rowm = mysqli_num_rows($sqlm);
          if($rowm > 0){
            //session_start();
            $_SESSION["user"]=$rm["id"];
            $_SESSION["passmin"]=$rm["password"];
          }else {
            echo "Password salah";
          }
         echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=damin'>";
        }

        if (isset($_POST['hal_utama'])) {
          echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php'>";
        }
        ?>

      </div>


    </div>
  </div>


</div>

<div class="container3">
  <div class="grid">
      <div class="dh12"><center>Apotik Wahyudi &copy; 2018</center></div>
  </div>
</div>
