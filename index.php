<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use \mywishlist\controls\MonControleur;
use \mywishlist\controls\listeControleur;

$config = ['settings' => [
	'displayErrorDetails' => true,
]];

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new \Slim\Container($config);
$app = new \Slim\App($container);

$app->get('/', MonControleur::class.':accueil')->setName('racine');
$app->get('/listes', listeControleur::class.':afficherListes')->setName('aff_listes');
$app->get('/liste/{no}', listeControleur::class.':afficherListe')->setName('aff_liste');
$app->get('/item/{id}', MonControleur::class.':afficherItem')->setName('aff_item');
$app->get('/nouvelleliste', listeControleur::class.':formListe')->setName('formListe');
$app->post('/nouvelleliste', listeControleur::class.':newListe')->setName('newListe');

$app->run();
