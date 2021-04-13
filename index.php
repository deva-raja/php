<?php

// either mysqli or pdo for setting connection, here mysqli
include('config/database_connect.php');

$sql = 'SELECT id,title,ingredients FROM pizza_data ORDER BY created_at';
$result = mysqli_query($connection, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($connection);

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-test">Pizzas!</h4>
<div class="container">
	<div class="row">
		<?php foreach ($pizzas as $pizza) :	?>
			<div class="col s6 md3">
				<div class="card z-depth-0">
					<img src="images/pizza.svg" alt="image of pizza" class="pizza">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($pizza["title"]); ?></h6>
						<ul>
							<?php foreach (explode(",", $pizza["ingredients"]) as $ingredient) : ?>
								<li><?php echo $ingredient ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="card-action right-align">
						<a href="details.php?id=<?php echo $pizza["id"] ?>" class="brand-text">more info</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<?php include('templates/footer.php'); ?>

</html>