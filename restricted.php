<?php
session_start();
include 'parts/functions.php';
include 'parts/header.php';
if (!array_key_exists("email", $_SESSION)) {
   header("Location: login.php?message=error-login");
}
?>
<html>
<head>
</head>
<body>
   <h1>Hello</h1>
   <h2>Welcome to your session based upon this login : <?php echo ($_SESSION["email"]); ?></h2>
   <h2 class="text-danger">Be sure before any attempt to suppress ! </h2>
   <section>
      <div class="container">
         <div class="row justify-content-evenly">
            <div class="my-3">
            <a href="addPlayerForm.php"><input class="add_submit" type="submit" value="Add a new player ! "></a>   
            <a href="logout.php"><input class="add_submit" type="submit" value="Log out !"></a>   
            </div>
            <?php
            $request = $pdo->query('SELECT * FROM players');
            $players = $request->fetchAll();
            ?>
            <?php foreach ($players as $player) : ?>
               <div class="col-3 border p-3 rounded hover-blue">
                  <p>Name : <a class="card_link"><?php echo $player["name"] ?></a></p>
                  <p>First_name : <a class="card_link"><?php echo $player["first_name"] ?></a></p>
                  <p>Age : <a class="card_link"><?php echo $player["age"] ?></a></p>
                  <p>Position : <a class="card_link"><?php echo $player["position"] ?></a></p>
                  <a href="updatePlayerForm.php?id=<?= $player['player_id'] ?>"><img src="images/write.png" alt="" width="30px"></a>
                  <a href="deletePlayerForm.php?id=<?= $player['player_id'] ?>"><img src="images/remove.png" alt="" width="30px"></a>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

</body>

</html>