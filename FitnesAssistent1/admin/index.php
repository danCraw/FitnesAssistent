<?php
require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Users</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
        <div class="wrapper">
            <div class="center p-top50">
                <div class="container border flex-container flex-column">
                    <div class="title">
                        <h1>Панель администратора</h1>
                    </div>
                    <div class="table">
                        <table>
                            <tr>
                                <th>ID</id>
                                <th>Имя</id>
                                <th>Пароль</th>
                                <th>E-mail</th>
                                <th>Вес</th>
                                <th>Рост</th>
                                <th>ИМТ</th>
                                <th>Цель</th>
                                <th>Съедено за сегодня(калорий)</th>
                            </tr>
                            <?php
                                $users = mysqli_query($connect, "SELECT * FROM `user`");
                                $users = mysqli_fetch_all($users);

                                foreach ($users as $user) {
                                ?>
                                <tr>
                                <td><?=$user[0] ?></td>
                                <td><?=$user[1] ?></td>
                                <td><?=$user[2] ?></td>
                                <td><?=$user[3] ?></td>
                                <td><?=$user[4] ?></td>
                                <td><?=$user[5] ?></td>
                                <td><?=$user[6] ?></td>
                                <td><?=$user[7] ?></td>
                                <td><?=$user[8] ?></td>

                                <td class="btn-cell"><a class="small-button" href="update.php?id=<?=$user[0] ?>">Изменить</a></td>
                                <td class="btn-cell"> <a class="small-button" href="vender/delete.php?id=<?=$user[0] ?>">Удалить</a></td>   
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <th>ID</id>
                                <th>Название</id>
                                <th>Калорийность</th>
                            </tr>

                            <?php
                                $products = mysqli_query($connect, "SELECT * FROM `products`");
                                $products = mysqli_fetch_all($products);

                                foreach ($products as $product) {
                                ?>
                                <tr>
                                    <td><?=$product[0] ?></td>
                                    <td><?=$product[1] ?></td>
                                    <td><?=$product[2] ?></td>
                                    <td class="btn-cell"><a class="small-button" href="updateProduct.php?id=<?=$product[0] ?>">Изменить</a></td>
                                    <td class="btn-cell"><a class="small-button" href="vender/deleteProduct.php?id=<?=$product[0] ?>">Удалить</a></td>   
                                </tr>
                            <?php
                            }
                            ?>
                            <td class="btn-cell"><a class="small-button" href="addProduct.php?id=<?=$product[0] ?>">Добавить продукт</a></td>
                        </table>
                    </div>
                    <div class="out">
                        <a class="button" href="../login.php">Выход</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
