<?php
include('config/database_connect.php');

$title = $email = $ingredients = '';
$errors = ["email" => '', 'title' => '', 'ingredients' => ''];

if (isset($_POST['submit'])) {
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Enter correct email";
        }
    }
    if (empty($_POST["title"])) {
        $errors["title"] = "Title is required";
    } else {
        $title = $_POST["title"];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors["title"] = "Enter a title with words and spaces";
        }
    }
    if (empty($_POST["ingredients"])) {
        $errors["ingredients"] = "Ingredients is required";
    } else {
        $ingredients = $_POST["ingredients"];
        if (!preg_match('/^([a-zA-Z\s])+(,\s*[a-zA-z\s]*)*$/', $ingredients)) {
            $errors["ingredients"] = "Enter ingredients with words and commas seperated";
        }
    }

    if (!array_filter($errors)) {
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $title = mysqli_real_escape_string($connection, $_POST["title"]);
        $ingredients = mysqli_real_escape_string($connection, $_POST["ingredients"]);
        $sql = "INSERT INTO pizza_data(email,title,ingredients) VALUES ('$email','$title','$ingredients')";

        if (mysqli_query($connection, $sql)) {
            header('Location: index.php');
        } else {
            echo mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label>Your email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo htmlspecialchars($errors["email"]) ?></div>
        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <div class="red-text"><?php echo htmlspecialchars($errors["title"]) ?></div>
        <label>Ingredients (comma seperated):</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
        <div class="red-text"><?php echo htmlspecialchars($errors["ingredients"]) ?></div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php'); ?>

</html>
<!-- 
Vinu's magic
tomato , eggs , cheese -->