<?php
declare(strict_types=1);

namespace mywishlist\controls;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \mywishlist\vues\VueWish;

class MonControleur {
	private $container;

	public function __construct($container) {
		$this->container = $container;
	}
	public function accueil(Request $rq, Response $rs, $args) : Response {
		$rs->getBody()->write('accueil racine du site') ;
		return $rs;
	}

}
