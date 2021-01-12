<?php
/**
 * File:  index.php
 * description: ficindex projet wishlist
 *
 * @author: canals
 */

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

try{
  $db = new DB();
  print "<p>Eloquent operationnel !</p>";
}catch (\Exception $e1){
  print "Exception : $e1";
}catch (\Error $e2){
  print "Erreur : $e2";
}
