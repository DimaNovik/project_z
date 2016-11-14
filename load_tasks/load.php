<?php

include('db.php');
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

    <title>Загрузка заданий</title>

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
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p><a href='../../index.php'>На головну</a></p>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      </div>
    </div>
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">  <br/>
        <form id="slick-login" action="#" method="post">

            <p><label for="clerkId">Форма завантаження завдань для контролерів:</label></p>

                <?php

                $sql = "SELECT ClerkId, FName FROM Clerk Where EndDate is null Order by Fname";
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }

                  $output = "<select name='clerkId' class='placeholder' onchange='showUser(this.value)' data-live-search='true'>";
  $output .= "<option value='0'>Оберіть контролера...</option>";
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $fName = iconv('windows-1251', 'utf-8', $row['FName']);

                    $output .= "<option value='".$row['ClerkId']."'>".$fName."</option>";

                  }

                  $output .= "</select>";

                  echo $output;
                ?>
        </form>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
      </div>
    </div>

    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <div id="txtHint"></div>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
      </div>
    </div>
  </div>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bs.js"></script>

<!-- Select Clerk Tasks from DB-->
<script>
function showUser(str) {
    var db = '<? echo $db;?>';
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","select_tasks.php?q="+str+"&db="+db,true);
        xmlhttp.send();
    }
}
</script>



</body>

</html>
