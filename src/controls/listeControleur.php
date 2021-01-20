<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \mywishlist\models\Liste;
use \mywishlist\vues\VueWish;

class listeControleur {
	private $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function afficherListes(Request $rq, Response $rs, $args) : Response {
		$listes = Liste::all() ;
		$vue = new VueWish($listes->toArray(),$this->container) ;
		$rs->getBody()->write($vue->render(1)) ;
		return $rs;
	}

	public function afficherListe(Request $rq, Response $rs, $args) : Response {
		$rs->getBody()->write('afficherListe no='.$args['no']) ;
		return $rs;
	}

	public function formListe(Request $rq, Response $rs, $args) : Response {
		$vue = new VueWish( [] , $this->container ) ;
		$rs->getBody()->write($vue->render(5)) ;
		return $rs;
	}

  public function newListe(Request $rq, Response $rs, $args) : Response {
		$post = $rq->getParsedBody() ;
		$titre = filter_var($post['titre'], FILTER_SANITIZE_STRING) ;
		$description = filter_var($post['description'] , FILTER_SANITIZE_STRING) ;
		$l = new Liste();
		$l->titre = $titre;
		$l->description = $description;
		$l->save();
		$url_listes = $this->container->router->pathFor( 'aff_listes' ) ;
		return $rs->withRedirect($url_listes);
	}

}
