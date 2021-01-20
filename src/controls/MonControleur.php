<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \mywishlist\vues\VueWish;
// use \mywishlist\models\Liste;
// use \mywishlist\models\Item;

class MonControleur {
	private $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function accueil(Request $rq, Response $rs, $args) : Response {
		$vue = new VueWish( [] , $this->container ) ;
		$rs->getBody()->write($vue->render(0)) ;
		$rs->getBody()->write('accueil racine du site') ;
		return $rs;
	}

	// public function afficherItem(Request $rq, Response $rs, $args) : Response {
	//     // pour afficher un item
	// 	$item = Item::find( $args['id'] ) ;
	// 	$vue = new VueWish( [ $item->toArray() ] , $this->container ) ;
	// 	$rs->getBody()->write( $vue->render( 3 ) ) ;
	// 	return $rs;
	// }
	//
	// public function formItem(Request $rq, Response $rs, $args) : Response {
	// 	$vue = new VueWish( [] , $this->container ) ;
	// 	$rs->getBody()->write($vue->render(5)) ;
	// 	return $rs;
	// }
	//
  // public function newItem(Request $rq, Response $rs, $args) : Response {
  //   // pour enregistrer un item
  //   $post = $rq->getParsedBody() ;
	// 	$id          = filter_var($post['id']       , FILTER_SANITIZE_STRING) ;
	// 	$nom         = filter_var($post['nom']       , FILTER_SANITIZE_STRING) ;
  //   $description = filter_var($post['descr'] , FILTER_SANITIZE_STRING) ;
  //   $prix        = filter_var($post['prix'] , FILTER_SANITIZE_STRING) ;
  //   $urlExterne  = filter_var($post['URL'] , FILTER_SANITIZE_STRING) ;
  //   $l = new Liste();
  //   $l->nom = $nom;
  //   $l->description = $description;
  //   $l->prix = $prix;
  //   $l->urlExterne = $urlExterne;
  //   $l->save();
  //   $url_item = $this->container->router->pathFor( 'aff_item' ) ;
  //   return $rs->withRedirect($url_item);
  // }
	//
	// public function afficherListes(Request $rq, Response $rs, $args) : Response {
	// 	$listes = Liste::all() ;
	// 	$vue = new VueWish($listes->toArray(),$this->container) ;
	// 	$rs->getBody()->write($vue->render(1)) ;
	// 	return $rs;
	// }
	//
	// public function afficherListe(Request $rq, Response $rs, $args) : Response {
	// 	$rs->getBody()->write('afficherListe no='.$args['no']) ;
	// 	return $rs;
	// }
	//
	// public function formListe(Request $rq, Response $rs, $args) : Response {
	// 	$vue = new VueWish( [] , $this->container ) ;
	// 	$rs->getBody()->write($vue->render(5)) ;
	// 	return $rs;
	// }
	//
  // public function newListe(Request $rq, Response $rs, $args) : Response {
	// 	$post = $rq->getParsedBody() ;
	// 	$titre = filter_var($post['titre'], FILTER_SANITIZE_STRING) ;
	// 	$description = filter_var($post['description'] , FILTER_SANITIZE_STRING) ;
	// 	$l = new Liste();
	// 	$l->titre = $titre;
	// 	$l->description = $description;
	// 	$l->save();
	// 	$url_listes = $this->container->router->pathFor( 'aff_listes' ) ;
	// 	return $rs->withRedirect($url_listes);
	// }

}
