<?php
include '../parts/functions.php';
include '../parts/header.php';
?>
<h2>Delete a car</h2>
<?php
$reponse = $pdo->query("
DELETE FROM cars
WHERE car_id = $car_id 
");
$cars = $reponse->fetchAll();
header("Location:index.php");
?>
<?php
include 'parts/footer.php';
?>