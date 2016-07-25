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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="info_card_add">
                    <p>
                        <img src="img/users.png" />
                    </p>

                    <p align="right"><b>Григорашенко Оксана Николаевна</b></p>
                    <p align="right"><b>Ананьев, Пушкина ул, 25 кв.</b></p>
                    <p align="right"><b>Ос. рахунок:</b> 0/4909</p>
                    <p align="right"><b>№ лічильн., розр., пл.:</b> 06246687  4   4078777</p>
                    <p align="right"><b>Тип лічильника:</b> СО-2М <b>Зона:</b> 1</p>
                </div>

            </div>
        </div>
    </div>
<!-- ./container for info_card -->


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="list_tasks">Додати показники:<hr/></h2>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <form id="add_count" action="/" method="post">

              <p align='left'><label for="visibility1">Не виконано:</label>
              <input type="checkbox" name="visibility" id="visibility1" /></p>


                  <select name="list_warning" id="list_warning" class="placeholder">
                      <option value="1">Абонент не відчинив</option>
                      <option value="2">Абонент відсутній</option>
                      <option value="3">Лічильник відсутній</option>
                      <option value="4">Абонент раніше відключений</option>
                      <option value="5">Виконано відключення</option>
                      <option value="6">Виконано підключення</option>
                      <option value="7">Самовільне підкл. після відкл.</option>
                      <option value="8">Підозра на крадіжку</option>
                  </select>

              <br/>
              <p><label for="date_count" id="label_date">Дата зняття показників:</label></br>
              <input type="date" name="date_count" id='date_count'></p>

              <p><label for="count_zone_1" id="label_zone_1">Шкала 1:</label></br>
              <input type="number" name="count_zone_1" id='count_zone_1'></p>

              <p><label for="desc" id="label_desc">Примітка:</label></br>
              <textarea type="" name="desc" id="desc"></textarea></p>

              <br/>
              <p><label for="visibility2" id="label_visibility2">Попереджений:</label>
              <input type="checkbox" name="warning" id="visibility2"/></p>

              <p align="center"><input type="submit" id="submit" value="ЗАНЕСТИ ПОКАЗНИКИ"></p>
          </form>

        </div>
    </div>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bs.js"></script>

<!-- ShowHide WarningList -->
<script src="js/showWarningList.js"></script>


</body>

</html>
