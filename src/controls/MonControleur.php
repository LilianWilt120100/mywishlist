<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \mywishlist\vues\VueWish;
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
	public function afficherItem(Request $rq, Response $rs, $args) : Response {
	    // pour afficher un item
		$item = Item::find( $args['id'] ) ;
		$vue = new VueWish( [ $item->toArray() ] , $this->container ) ;
		$rs->getBody()->write( $vue->render( 3 ) ) ;
		return $rs;
	}

}
