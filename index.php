<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>

<body>
    <form action="<?php echo www . "index.php" ?> " method="post">
        <?php
        echo '<h2>Вход</h2>';
        echo 'Имя пользователя';
        ?>
        <br>
        <input type='text' name='username' id='login' />
        <br>
        <?php
        echo 'Пароль';
        ?>
        <br>
        <input type='text' name='password' id='password' />
        <br>
        <input type="submit" name="login" value="Войти">
    </form>
    <form>
        <?php

        // Доп. пример отсюда:
        // https://prowebmastering.ru/php-pdo-start.html
        // $id = 1;
        // $stmt = $db->prepare("SELECT * FROM categories WHERE `id` = ?");
        // $stmt->execute([$id]);
        // $category = $stmt->fetch(PDO::FETCH_LAZY);
        // echo '<pre>';
        // print_r($category);
        // echo '</pre>';

        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
            $query->execute(['username' => $username]);
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                echo '<p class="error">Неверные пароль или имя пользователя!</p>';
            } else {
                if ($password == $result['password']) {
                    
                    $_SESSION['user_id'] = $result['id'];
                    echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
                    
                    // Переход на другую страницу
                    // ...
                } else {
                    echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
                }
            }
        }
        ?>
    </form>
</body>

</html>