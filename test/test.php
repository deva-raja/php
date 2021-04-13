<?php

define('PASSED', 'not passed');
$name = 'vinu ';
$age = 32;
$vijay = "Gyman yashiji";

// indexed arrays
$peopleTwo = array('abhi', 'althaf', 'balu');
$marks = array(23, 22, 14, 12, 19);
$marks[2] = 50;
array_push($marks, 88);
$marks[] = 91;

$fruits = ["grape" => "green", "mango" => "yellow", "apple" => "red"];
$fruits["grape"] = "violet";
$moves = array('karate' => "round-house", "mma" => "take-down");

$blogs = [
    ["title" => "react-props", "author" => "kent-c-dodds", "likes" => 32],
    ["title" => "firebase", "author" => "shawn ninja", "likes" => 42],
    ["title" => "next.js", "author" => "brad-traversty", "likes" => 52],
];
$peopleOne = ['vinu', 'anu', 'manshad'];

$products = [
    ['name' => 'shiny star', 'price' => 20],
    ['name' => 'green shell', 'price' => 10],
    ['name' => 'red shell', 'price' => 15],
    ['name' => 'gold coin', 'price' => 5],
    ['name' => 'lightning bolt', 'price' => 40],
    ['name' => 'banana skin', 'price' => 2]
];

function formatPrice($product)
{
    echo " $product[name] has a price of   $$product[price]";
    echo '<br/>';
}
foreach ($products as $product) {
    // formatPrice($product);
}

function sayHello($name = "vinu", $time = "morning")
{
    echo "Good $time $name";
    echo '<br/>';
}

$name = 'jack sparrow';
function test()
{
    global $name;
    echo $name;
}

require('test.php');
echo "end of php file";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Project</title>
</head>

<body>
    <div>
        <ul>
            <?php foreach ($products as $product) { ?>
                <?php if ($product['price'] > 10) { ?>
                    <!-- <li><?php echo $product["name"] . '<br/>'; ?></li> -->
                <?php } ?>
            <?php } ?>
            <div>Fancy seeing you here,Mandango</div>
            <?php include('div.php') ?>
            <?php include('div.php') ?>
            <?php include('div.php') ?>
            <?php include('div.php') ?>
        </ul>
    </div>
</body>

</html>