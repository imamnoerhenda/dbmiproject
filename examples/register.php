<?php
    require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="../../dist/img/dbmi7.png" alt="User Image">
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Form Registrasi</p>

    <form action="register.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputName">Nama Lengkap</label>
          <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama lengkap anda" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">Alamat Email</label>
          <input name="password" type="password" class="form-control" id="exampleInputEmail" placeholder="Masukkan alamat email anda" required>
        </div>
        <div class="form-group">
          <label for="exampleInputNoTelp">Nomor Telepon</label>
          <input name="notelp" type="text" class="form-control" id="exampleInputNoTelp" placeholder="Masukkan nomor telepon/HP anda">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select class="form-control">
            <option>Laki Laki</option>
            <option>Perempuan</option>
          </select>
        </div>
      <div class="form-group">
        <label for="exampleInputFile">Foto KTP</label>
        <input type="file" id="exampleInputFile">

        <p class="help-block">Data KTP harus sesuai dengan nama</p>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Foto Wajah</label>
        <input type="file" id="exampleInputFile">

        <p class="help-block">Foto wajah harus tampak dari depan</p>
      </div>
      <div class="form-group">
        <label for="exampleInputAlamat">Alamat</label>
        <input name="alamat" type="text" class="form-control" id="exampleInputAlamat" placeholder="Masukkan alamat tempat tinggal anda">
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="check" type="checkbox"> Saya menyetujui dengan segala <a href="#">syarat dan aturan</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!-- <input name="submit_btn" type="submit" id="signup_btn" value="Daftar"/> -->
          <button name="submit_btn" type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php
        if(isset($_POST['submit_btn']))
        {
          if(isset($_POST['check']))
          {
            include_once 'dbconfig/config.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $notelp = $_POST['notelp'];

            //$query = "INSERT INTO user VALUES ('$username','$password')";
            $query= "SELECT * FROM user WHERE Username='$username'";
            $query_run = mysqli_query($con,$query);

            if(mysqli_num_rows($query_run)>0)
            {
              echo '<script type="text/javascript">';
              echo 'alert("User already exists.. try another username");';
              echo '</script>';
            }
            else
            {
              $query= "INSERT INTO user VALUES('$username','$password')";
              $query_run = mysqli_query($con,$query);

              if($query_run)
              {
                echo '<script type="text/javascript">';
                echo 'alert("User Registered.. Go to login page to login");';
                echo 'window.location="login.php";';
                echo '</script>';
                //header("Location: http://localhost:8017/dbmiweb/pages/examples/login.php");
              }
              else
              {
                echo '<script type="text/javascript"> alert("Error!") </script>';
              }
            }
          }
          else
          {
            echo '<script type="text/javascript"> alert("Please Fill the Check Box!") </script>';
          }
        }
        
        
    ?>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
