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
        if (isset($_POST["username"])){echo $_POST['username'];}
        if (isset($_POST["password"])){echo $_POST['password'];}
        if (isset($_POST['login'])) {
           echo "привет";
            echo $username = $_POST['username'];
            echo $password = $_POST['password'];
            $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                // if () {

                echo '<p class="error">Неверные пароль или имя пользователя!</p>';
            } else {
                if (password_verify($password, $result['password'])) {
                    $_SESSION['user_id'] = $result['id'];
                    echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
                } else {
                    echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
                }
            }
        }
        ?>
    </form>
</body>

</html>