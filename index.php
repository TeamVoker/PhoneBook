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
    <link href="CSS/style.css" rel="stylesheet">
</head>

<body>
<form action="<?php echo www . "index.php" ?> " method="post">
        <header>
            <div class = "title">PhoneBook</div>
        </header>
        <div class="main">
            <h2>Вход</h2>
            <?php
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
            <input class='submit' type="submit" name="login" value="Войти">
        </div>
    </form>
    <form>
        <?php
        // if (isset($_POST["username"])){echo $_POST['username'];}
        // if (isset($_POST["password"])){echo $_POST['password'];}
        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            // $query = $connection->prepare("SELECT * FROM authorization WHERE Login=:username;");
            // $query->bindParam('username', $username, PDO::PARAM_STR);
            // // $query->execute("username", $username, PDO::PARAM_STR);
            
            // // $query->execute(['username' => $username]);
            // $result = $query->fetch();

            $query = "SELECT * FROM authorization WHERE Login='". $username."';";
            $result = $connection->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                // if () {

                echo '<p class="error">Неверные пароль или имя пользователя!</p>';
            } else {
                if ($password == $row['Password']) {
                    $_SESSION['user_id'] = $row['ID'];
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