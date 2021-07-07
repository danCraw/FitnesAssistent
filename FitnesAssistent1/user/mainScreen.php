<?php
    require_once 'config/connect.php';
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    $data =  $_SESSION['data'];
    $id = $data['id'];

    $user = mysqli_query($connect, "SELECT * FROM `user` WHERE `id` = $id");
    
    $user = mysqli_fetch_all($user);
    

    $userBMI = mysqli_query($connect, "SELECT * FROM `bmi` WHERE `user_id` = $id ORDER BY id");
    $userBMI = mysqli_fetch_all($userBMI);

    $count = mysqli_query($connect, "SELECT COUNT(1) FROM `bmi`");
    $count = mysqli_fetch_assoc($count);

    $сount = $count['COUNT(1)'];

    print_r($last_bmi);
    ?>
        <br>
    <?
    print_r($userBMI[$last_bmi - 1][2]);

    $js_array = [];

    $name = $user[0][1];
    $password = $user[0][3];
    $weight = $user[0][4];
    $height = $user[0][5];
    $target = $user[0][7];
    $BMI = $weight / (($height / 100) * ($height /100));
    $dayColor = $weight * 30;
    $eatenToday = $user[0][8];
?>


<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://www.google.com/jsapi"></script>
  <script>
    let js_bmi = [];

    js_BMI = JSON.parse('<?php echo json_encode($userBMI); ?>');


    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Месяц', 'Индекс массы тела'],
            ...js_BMI.map(el => ['', +el[2]])
            ]);

        var options = {
            title: 'Изменения индекса массы тела',
            hAxis: {title: 'Время'},
            vAxis: {title: 'Индекс массы тела'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('BMI'));
        chart.draw(data, options);
    }
  </script>
 </head>
<body>
    <div class="wrapper">
        <div class="center p-top50 flex-container flex-column">
                <div class="container border flex-container">
                    <div class="user flex-container flex-column">
                        <form action="updateParameters.php?id=<?=$id?>" method="post">
                            <h3>Имя:</h3>
                            <h3> <?=$name?></h3>
                            <h3>Вес:</h3>
                            <h3> <?=$weight?></h3>
                            <h3>Рост:</h3>
                            <h3> <?=$height?></h3>
                            <h3>Цель:</h3>
                            <?php
                                if ($target == 'сбросить вес') {
                                    ?>
                                        <h3>Похудеть</h3>
                                        <h3>Вам необходимо потреблять около <?=($weight * 30) - 500?>  калорий в день</h3>
                                    <?
                                } else {
                                    if ($target == 'удержать вес') {
                                        ?>
                                        <h3>Удержать вес</h3>
                                        <h3>Вам необходимо потреблять около <?=($weight * 30)?>  калорий в день</h3>
                                        <?
                                    } else {
                                        if ($target == 'набрать вес') {
                                            ?>
                                                <h3>Набрать вес</h3>
                                                <h3>Вам необходимо потреблять около  <?=($weight * 30) + 200?>  калорий в день</h3>
                                            <?
                                        }
                                    }
                                }
                            ?>
                            <h3>Масса тела:</h3>
                            <?
                                if ($BMI < 18.5) {
                                    ?>
                                        <h3>Дефицит массы тела</h3>
                                    <?
                                } else {
                                    if (($BMI > 18.5) && ($BMI < 24.9)) {
                                        ?>
                                            <h3>Норма массы тела</h3>
                                        <?
                                    } else {
                                        if (($BMI > 25.0) && ($BMI < 29.9)) {
                                            ?>
                                                <h3>Повышенная масса тела</h3>
                                            <?
                                        } else {
                                            if (($BMI > 30.0) && ($BMI < 34.9)) {
                                                ?>
                                                    <h3>Высокая масса тела</h3>
                                                <?
                                            } else {    
                                                if (($BMI > 35.0) && ($sex = 'male')) {
                                                    ?>
                                                        <h3>Ожирение</h3>
                                                    <?
                                                }
                                            }
                                        }
                                    }
                                }
                            ?>
                            <button class="button" type = 'submit'>Изменить параметры</button>
                        </form>
                    </div>
                    <div class="info  flex-container flex-column">
                        <div class="callories flex-container">
                            <h2>Съедено сегодня:</h2>
                            <h2><?=$eatenToday?>  калорий</h2>
                        </div>

                        <div class="options flex-container flex-column">
                            <div class="table">
                                <div id="BMI" style="width: 500px; height: 400px;"></div>
                            </div>
                            <div class="btn-panel flex-container">
                                <form class="form" action="eat.php?id=<?=$id?>" method="post">
                                    <button class="button" type = 'submit'>Съесть ещё</button>
                                </form>

                                <?php
                                    # Если кнопка нажата
                                    if( isset( $_POST['reset_eatenToday'] ) )
                                    {
                                        mysqli_query($connect, "UPDATE `user` SET `eatenToday` = '0' WHERE `user`.`id` = '$id'");
                                        # Тут пишете код, который нужно выполнить.
                                        # Пример:
                                    }
                                ?>
                                <form class="form" method="POST">
                                    <button class="button" type = 'submit' name="reset_eatenToday">Сбросить</button>
                                </form>

                                <form class="form" action="addProduct.php" method="post">
                                    <button class="button" type = 'submit'>Добавить продукт</button>
                                </form>
                            </div>
                        </div>
                        <div class="out">
                            <form class="form" action="../login.php" method="post">
                                <button class="button" type = 'submit'>Выход</button>
                            </form>
                        </div>
                    </div>
                                
                        

                        
                </div>
        </div>
    </div>
    
 </body>
    
</html>
