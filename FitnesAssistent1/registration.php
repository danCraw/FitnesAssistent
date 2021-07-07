<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
    <body>
        <div class="wrapper">
            <div class="register center p-top50">
                <div class="flex-container flex-column">
                    <div class="container border flex-container flex-column">
                        <h2 class="title">Регистрация</h2>
                        <form class="form flex-container flex-column" action="vender/add.php" method="post">
                            <div class="input-field">
                                <div>Имя</div>
                                <input type="text" name="name">
                            </div>
                            <div class="input-field">
                                <div>Пароль</div>
                                <input type="text" name="password">
                            </div>
                            <div class="input-field">
                                <div>E-mail</div>
                                <input type="text" name="e-mail">
                            </div>       
                            <div class="input-field">
                                <div>Вес</div>
                                <input type="text" name="weight">
                            </div>   
                            <div class="input-field">
                                <div>Рост</div>
                                <input type="text" name="height">
                            </div>       
                            <div class="input-field">
                                <div>Цель</div>
                                <input type="text" name="target">
                            </div>          
                            <div class="input-field">
                                <button class="button" type = 'submit'>Зарегистрироваться</button>
                            </div>
                        </form>
                        <form action="../index.php" method="post">
                            <button class="button" type = 'submit'>Назад</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
      
