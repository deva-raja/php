<?php


if (isset($_POST['submit'])) {
    session_start();

    setcookie('gender', $_POST["gender"], time() + 60 * 60 * 24 * 30);
    $_SESSION['name'] = $_POST['name'];
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandbox</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name">
        <select name="gender" id="select">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>