<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \mywishlist\vues\VueWish;
use \mywishlist\models\Liste;
use \mywishlist\models\Item;

class MonControleur {
	private $container;

	public function __construct($container) {
		$this->container = $container;
	}
	public function accueil(Request $rq, Response $rs, $args) : Response {
		$rs->getBody()->write('accueil racine du site') ;
		return $rs;
	}
	public function afficherListes(Request $rq, Response $rs, $args) : Response {
		// pour afficher la liste des listes de souhaits
		$listl = Liste::all() ;
		$vue = new VueWish( $listl->toArray() , $this->container ) ;
		$rs->getBody()->write( $vue->render( 1 ) ) ;
		return $rs;
	}
	public function afficherListe(Request $rq, Response $rs, $args) : Response {
	    // pour afficher liste
		$rs->getBody()->write('afficherListe no='.$args['no']) ;
		return $rs;
	}
	public function afficherItem(Request $rq, Response $rs, $args) : Response {
	    // pour afficher un item
		$item = Item::find( $args['id'] ) ;
		$vue = new VueWish( [ $item->toArray() ] , $this->container ) ;
		$rs->getBody()->write( $vue->render( 3 ) ) ;
		return $rs;
	}
	public function formListe(Request $rq, Response $rs, $args) : Response {
		// pour afficher le formulaire liste
		$vue = new VueWish( [] , $this->container ) ;
		$rs->getBody()->write( $vue->render( 5 ) ) ;
		return $rs;
	}
	public function newListe(Request $rq, Response $rs, $args) : Response {
		// pour enregistrer 1 liste.....
		$post = $rq->getParsedBody() ;
		$titre       = filter_var($post['titre']       , FILTER_SANITIZE_STRING) ;
		$description = filter_var($post['description'] , FILTER_SANITIZE_STRING) ;
		$l = new Liste();
		$l->titre = $titre;
		$l->description = $description;
		$l->save();
		$url_listes = $this->container->router->pathFor( 'aff_listes' ) ;
		return $rs->withRedirect($url_listes);
	}


}
