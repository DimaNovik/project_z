<?
$rem = $_GET['rem'];
$clerkid = $_GET['clerkid'];
$date_tasks = $_GET['date_tasks'];
$num = $_GET['num'];
$clerk_name = $_GET['clerk'];
$date_abon = $_GET['date_abon'];



//преобразуем дату в нужній формат, для образения к json файлу



// обращаемся к нужному json файлу
$jsondata = file_get_contents("json/$rem-$clerkid-$date_tasks.json");

$json = json_decode($jsondata, true);

if($json == '') { $count_tasks = 0; } else {

// вычисляю количество заданий в файле json
// $count_tasks = 0;
//   foreach ($json['abonents'] as $task) {
//     $count_tasks++;
//   }


}

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Контрольные обходы</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap-grid-3.3.1.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/main.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>

<body>

<!-- container for info_card -->
    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

            </div>

            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

                <div class="info_card_abonents">
                    <p>
                        <img src="img/users.png" />
                    </p>

                    <p align="right"><b>Доброго дня, <? echo $clerk_name?></b></p>
                    <p align="right"><b>№ завдання:</b> <? echo $num;?></p>
                    <p align="right"><b>Дата формування:</b> <? echo $date_abon;?></p>
                    <p align="right"><b>Кількість абонентів для обробки:</b> <span class="count_tasks">25</span></p>
                </div>

            </div>
        </div>
    </div>
<!-- ./container for info_card -->


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="list_tasks">Перелік абонентів:<hr/></h2>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <?php

                      $output = "<div class='all_tasks'>";
                      $output .= "<ul>";


                      foreach($json['tasks'] as $item)
                      {
                          if($item['number'] == $num)
                          {

                            foreach($item['abonents'] as $abonent) {

                            $output .= "<a href='/View_add_counts.php'><div class='link_tasks_abonents'>";

                            $output .= "<li><b>Ос. рахунок:</b> ".$abonent['conno']." </li>";
                            $output .= "<li><b>ПІБ споживача:</b> ".$abonent['fio']."</li>";
                            $output .= "<li><b>Адреса споживача:</b> ".$abonent['adres']."</li>";
                            $output .= "<li><b>Зона:</b> ".$abonent['zones']."</li>";
                            $output .= "<li class='cyrcle_count_abonents'><span>+</span></li>";

                            $output .= "</div></a>";
                            }
                          }
                      }


                      $output .= "</ul>";
                      $output .= "</div>";

           	 					echo $output;
           	 				?>

        </div>
    </div>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bs.js"></script>



</body>

</html>
