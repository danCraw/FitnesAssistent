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
		<div class="center p-top50 flex-container flex-column">
			<div class="container border flex-container flex-column">
                <table>
                    <tr>
                        <th>Название продукта</id>
                        <th>Калорийность</th>
                    </tr>

                    <?php
                        $user_id = $_GET['id'];

                        $products = mysqli_query($connect, "SELECT * FROM `products`");
                        $products = mysqli_fetch_all($products);

                        $user = mysqli_query($connect, "SELECT * FROM `user` WHERE `id`= '$user_id'");
                        $user = mysqli_fetch_assoc($user);

                        foreach ($products as $product) {
                        ?>
                        <tr>
                            <td><?=$product[1] ?></td>
                            <td><?=$product[2] ?></td>
                            <td class="small-button"><a class="small-button" href="vender/eatProduct.php?product_id=<?=$product[0] ?>&user_id=<?=$user['id'] ?>">Съесть</a></td>
                        </tr>
                        <?php
                        }
                    ?>
                </table>
                <div class="info flex-container">
                    <h2>Съедено сегодня:</h2>
                    <h2><?=$user['eatenToday']?> калорий</h2>
                </div>
                

                <form action="mainScreen.php" method="post">
                    <button class="button" type ='submit'>Назад</button>
                </form>
            </div>
        </div>
    </div>
        

    </body>
</html>
