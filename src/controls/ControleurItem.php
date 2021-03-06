<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \mywishlist\models\Item;
use \mywishlist\vues\VueWish;

class ControleurItem {
	private $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function afficherItem(Request $rq, Response $rs, $args) : Response {
	    // pour afficher un item
		$item = Item::find( $args['id'] ) ;
		$vue = new VueWish( [ $item->toArray() ] , $this->container ) ;
		$rs->getBody()->write( $vue->render( 3 ) ) ;
		return $rs;
	}

	public function formItem(Request $rq, Response $rs, $args) : Response {
		$vue = new VueWish( [] , $this->container ) ;
		$rs->getBody()->write($vue->render(4)) ;
		return $rs;
	}

  public function newItem(Request $rq, Response $rs, $args) : Response {
    // pour enregistrer un item
    $post = $rq->getParsedBody() ;
		$id          = filter_var($post['id']    , FILTER_SANITIZE_STRING) ;
		$nom         = filter_var($post['nom']   , FILTER_SANITIZE_STRING) ;
    $description = filter_var($post['descr'] , FILTER_SANITIZE_STRING) ;
    $prix        = filter_var($post['prix']  , FILTER_SANITIZE_STRING) ;
    $urlExterne  = filter_var($post['url']   , FILTER_SANITIZE_STRING) ;
    $l = new Liste();
    $l->nom = $nom;
    $l->description = $description;
    $l->prix = $prix;
    $l->urlExterne = $urlExterne;
    $l->save();
    $url_item = $this->container->router->pathFor( 'aff_item' ) ;
    return $rs->withRedirect($url_item);
  }

}
