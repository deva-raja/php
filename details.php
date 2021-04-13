<?php

include('config/database_connect.php');
$connection = mysqli_connect('localhost', 'vinu', 'vinu@123', 'pizza');
$id = mysqli_real_escape_string($connection, $_GET['id']);

if (isset($_POST['id_to_delete'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
    $sql = "DELETE from pizza_data WHERE id=$id";
    if (mysqli_query($connection, $sql)) {
        header("Location:index.php");
    } else {
        echo mysqli_error($connection);
    }
}

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM pizza_data WHERE id=$id ";
    $results = mysqli_query($connection, $sql);
    $pizza =  mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center grey-texts">
    <?php if ($pizza) : ?>
        <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
        <p>Written by - <?php echo htmlspecialchars($pizza['email']) ?></p>
        <p>Posted on - <?php echo date(htmlspecialchars($pizza["created_at"])) ?></p>
        <h5>Ingredients</h5>
        <p> <?php echo htmlspecialchars($pizza["ingredients"]) ?></p>
        <form action="details.php" method="POST">
            <input type="hidden" type="text" name="id_to_delete" value="<?php echo $id ?>">
            <input type="submit" name="delete" value="DELETE" class="btn z-depth-0 brand">
        </form>
    <?php else : ?>
        <h2>No such pizza</h2>
    <?php endif ?>
</div>

<?php include('templates/footer.php'); ?>

</html>