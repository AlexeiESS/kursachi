<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="php/handlers/main.php">
        <input type="text" placeholder="Login" name="user_login">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" name="sign_in">
    </form>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
    </style>
    <?php  if(isset($_GET['ok'])){
    if($_GET['ok']=='true'){
echo '<script>alert("Успешно!");</script>';}else {
    echo '<script>alert("Неизвестная ошибка.");</script>';
}

}
    ?>
</body>
</html>