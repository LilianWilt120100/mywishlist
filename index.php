<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use \mywishlist\controls\MonControleur;
use \mywishlist\controls\listeControleur;
use \mywishlist\controls\ControleurItem;
// use \mywishlist\models\Liste;

$config = ['settings' => [
	'displayErrorDetails' => true,
]];

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new \Slim\Container($config);
$app = new \Slim\App($container);

$app->get ('/',              MonControleur::class.':accueil')          ->setName('racine');
$app->get ('/listes',        listeControleur::class.':afficherListes') ->setName('aff_listes');
$app->get ('/liste/{no}',    listeControleur::class.':afficherListe')  ->setName('aff_liste');
$app->get ('/nouvelleliste', listeControleur::class.':formListe')      ->setName('formListe');
$app->post('/nouvelleliste', listeControleur::class.':newListe')       ->setName('newListe');
$app->get ('/item/{id}' ,    ControleurItem::class.':afficherItem'  )  ->setName('aff_item');
$app->post('/nouveauItem',   ControleurItem::class.':formItem')        ->setName('formItem');
$app->get ('/nouveauItem',   ControleurItem::class.':newItem')         ->setName('newItem');
// $app->get ('/',              MonControleur::class.':accueil')       ->setName('racine');
// $app->get ('/listes',        MonControleur::class.':afficherListes')->setName('aff_listes');
// $app->get ('/liste/{no}',    MonControleur::class.':afficherListe') ->setName('aff_liste');
// $app->get ('/nouvelleliste', MonControleur::class.':formListe')     ->setName('formListe');
// $app->post('/nouvelleliste', MonControleur::class.':newListe')      ->setName('newListe');
// $app->get ('/item/{id}' ,    MonControleur::class.':afficherItem'  )->setName('aff_item');
// $app->post('/nouveauitem',   MonControleur::class.':formItem')      ->setName('formItem');
// $app->get ('/nouveauitem',   MonControleur::class.':newItem')       ->setName('newItem');

$app->run();
// echo Liste::all();
