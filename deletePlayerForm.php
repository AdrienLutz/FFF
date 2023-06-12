<?php
include 'parts/functions.php';
include 'parts/header.php';
session_start();
if(array_key_exists("email", $_SESSION)){
    header('Location: restricted.php');
} else {
    header('Location: login.php');
}
?>
<h2>Delete a player</h2>
<p>Attention la suppression est immédiate !</p> 


<?php
$player_id = $_GET['id'];
$reponse = $pdo->query("
DELETE FROM players
WHERE player_id = $player_id 
");
$cars = $reponse->fetchAll();
header("Location:index.php");
?>
<?php
include 'parts/footer.php';
?>