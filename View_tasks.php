<?
ini_set('display_errors', 'Off');
if(isset($_POST['submit_load'])) {
  $rem = $_POST['rem'];
  $clerkid = $_POST['clerkid'];
  $date_tasks = $_POST['date_tasks'];
  $clerk_name = $_POST['nameClerk'];

  //преобразуем дату в нужній формат, для образения к json файлу
  $date_tasks = date("dmY", strtotime($date_tasks));


  // обращаемся к нужному json файлу
	$jsondata = file_get_contents("json/$rem-$clerkid-$date_tasks.json");

  $json = json_decode($jsondata, true);

  if($json == '') { $count_tasks = 0;} else {

  // вычисляю количество заданий в файле json
  $count_all_tasks = 0;
  	foreach ($json['tasks'] as $task) {
      $count_all_tasks++;
    }
}
} else {
  echo '<p>Помилка завантаження. Поверніться назад та спробуйте знову.</p>';
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

                <div class="info_card_view">
                    <p>
                        <img src="img/users.png" />
                    </p>

                    <p align="right"><b>Доброго дня, <? echo $clerk_name; ?></b></p>
                    <p align="right"><b>Сьогодні:</b> <? date_default_timezone_set('Europe/Kiev'); echo date('d.m.Y'); ?></p>
                    <p align="right"><b>Кількість завдань для обробки:</b> <span class="count_tasks"><? echo $count_all_tasks; ?></span></p>
                </div>

            </div>
        </div>
    </div>
<!-- ./container for info_card -->


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="list_tasks">Список завдань:<hr/></h2>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <?php

                      if ($count_all_tasks == 0) {
                        echo "<p>Завдань на обрану дату не знайдено! Оберіть іншу дату</p>";
                      } else {

                      $output = "<div class='all_tasks'>";
                      $output .= "<ul>";





           	 					foreach ($json['tasks'] as $task) {

                        $num_tasks = $task['number'];
                        $date_abonents = $task['date'];

                        $output .= "<a href='/View_abonents_tasks.php?num=$num_tasks&rem=$rem&clerkid=$clerkid&date_abon=$date_abonents&date_tasks=$date_tasks&clerk=$clerk_name'><div class='link_tasks'>";

           	 						$output .= "<li><b>№ завдання:</b> ".$task['number']."</li>";
           	 						$output .= "<li><b>Дата:</b> ".$date_abonents."</li>";


                        if($task['number'] == $num_tasks)
                        {
                          $count_tasks = 0;
                            foreach($task['abonents'] as $abonent) {
                              $count_tasks++;
                            }
                        }

                        $output .= "<li class='cyrcle_count'><span>".$count_tasks."</span></li>";
                        $output .= "</div></a>";

           	 					}

                      $output .= "</ul>";
                      $output .= "</div>";

           	 					echo $output;
                      }
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
