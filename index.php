<?php
include 'parts/functions.php';
include 'parts/header.php';
?>

<?php
// if (!isset($_SESSION)){
//     session_start();
//     }
session_start();
if(array_key_exists("email", $_SESSION)){
    header('Location: restricted.php');
} else {
    header('Location: login.php');
}
?>


<h4>The lucky 23</h4>

<section>
    <div class="container">
        <div class="row justify-content-evenly">
            <?php
            $request = $pdo->query('
            SELECT * FROM cars 
            INNER JOIN users ON cars.id_user = users.user_id
            ');
            $cars = $request->fetchAll();
            ?>
            <?php foreach ($cars as $car) : ?>
                <div class="col-6 border p-3 rounded hover-blue">
                    <p>Name : <a class="card_link" href='car_detail.php?filter=<?php echo $car["id_user"] ?>'><?php echo $car["car_name"] ?></a></p>
                    <p>Price : <a class="card_link" href='car_detail.php?filter=<?php echo $car["id_user"] ?>'><?php echo $car["car_price"] ?></a> £</p>
                    <img src="http://localhost/7_garage/<?php echo $car["img"] ?>" alt="" width="175" height="175">

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
include 'parts/footer.php';
?>