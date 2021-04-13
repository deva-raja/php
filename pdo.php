<?php

$connection = mysqli_connect('localhost', 'vinu', 'vinu@123', 'pizza');

// select
$sql = "SELECT * FROM pizza_data WHERE id=$id ";
$results = mysqli_query($connection, $sql);
$pizza =  mysqli_fetch_assoc($results);
$pizza =  mysqli_fetch_all($results);
mysqli_free_result($results);
mysqli_close($connection);

// delete
$id = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
$sql = "DELETE from pizza_data WHERE id=$id";

// pdo
$dsn = 'mysql:host=localhost;dbname=pizza;';
$pdo = new PDO($dsn, 'vinu', 'vinu@123');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// select
$id = 1;
$number = 1;

$sql = "SELECT * FROM pizza_data WHERE id = :id LIMIT :numb ";
$stmt = $pdo->prepare($sql);;
$stmt->execute(['id' => $id, 'numb' => $number]);
$posts = $stmt->fetchAll();

foreach ($posts as $post) {
    echo $post->id . '<br/>';
}
