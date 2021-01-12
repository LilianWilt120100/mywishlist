<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mywishlist\models\Item as Item;
use mywishlist\models\Liste as Liste;

$db = new DB();
$db->addConnection([
  'driver' => 'mysql',
  'host' => 'localhost',
  'database' => 'mywishlist',
  'username' => 'root',
  'password' => '',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci'
]);
$db->setAsGlobal();
$db->bootEloquent();

print "<p> Table Item :</p>";
$items = Item::all();
foreach ($items as $item) {
  print "$item->id  $item->nom <br>";
}

print "<p> Table Liste :</p>";
foreach (Liste::all() as $liste) {
  print "$liste->no  $liste->titre  $liste->description <br>";
}


// try{
//     $pdo = new PDO(
//         'mysql:dbname=mywishlist;host=localhost',
//         'root',
//         '',
//         [
//         PDO::ATTR_PERSISTENT=>true,
//         PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_EMULATE_PREPARES=>false,
//         PDO::ATTR_STRINGIFY_FETCHES=>false
//         ]
//     );
//
//     $stmt = $pdo->prepare('SELECT id, liste_id, nom FROM item');
//
//     $stmt->execute();
//     while(list($id, $liste_id, $nom) = $stmt->fetch(PDO::FETCH_NUM)){
//         echo "$id $liste_id $nom <br>";
//     }
// }catch (PDOException $e){
//     echo $e->getMessage();
// }

?>
