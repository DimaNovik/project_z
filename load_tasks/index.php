<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Сервис выдачи заданий</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap-grid-3.3.1.min.css">
      <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/main.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>

<body>

<div class="container">
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
      <form id="slick-login" action="load.php" method="post">
          <p><label for="clerkname">Оберіть РЕМ:</label></p>

              <?php
                // выбераем список из json файла всех пользователей в выпадающий список
                $jsondata = file_get_contents("offices.json");
                $json = json_decode($jsondata, true);

                $output = '<select name="officename" class="placeholder">';

                    foreach ($json['offices'] as $office) {
                      $output .= "<option value='".$office['officeValue']."'>".$office['name']."</option>";
                    }

                $output .= "</select>";

                echo $output;
              ?>

              <p><label for="password">Пароль:</label></p>
                  <input type="password" name="password" id="password" placeholder="Введіть Ваш пароль">
              <p align="center"><input type="submit" id="submit" name="submit" value="УВІЙТИ"></p>
      </form>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bs.js"></script>
<script src="../js/bootstrap.js"></script>



</body>

</html>
