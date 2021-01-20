<?php
declare(strict_types=1);

namespace mywishlist\vues;

class VueWish {

	private $tab; // tab array PHP
	private $container;

	public function __construct($tab, $container) {
		$this->tab = $tab;
		$this->container = $container;
	}

	private function lesListes() : string {
		//var_dump($this->tab); // tableau de tableau, array de array
		$html = '';
		foreach($this->tab as $liste){
			$html .= "<li>{$liste['titre']}, {$liste['description']}</li>";
		}
		$html = "<ul>$html</ul>";
		return $html;
	}

	private function unItem() : string {
		//var_dump($this->tab); // tableau de tableau, array de array
		$i = $this->tab[0];
		$html = "<h2>Item {$i['id']}</h2>";
		$html .= "<b>Nom:</b> {$i['nom']}<br>";
		$html .= "<b>Descr:</b> {$i['descr']}<br>";
		$html .= "<b>Prix:</b> {$i['prix']}<br>";
		$html .= "<b>URL(option):</b> {$i['URL']}<br>";
		return $html;
	}

	private function formListe() : string {
		$url_new_liste = $this->container->router->pathFor( 'newListe' ) ;
		$html = <<<FIN
<form method="POST" action="$url_new_liste">
	<label>Titre:<br> <input type="text" name="titre"/></label><br>
	<label>Description: <br><input type="text" name="description"/></label><br>
	<button type="submit">Enregistrer la liste</button>
</form>
FIN;
		return $html;
	}

	public function render( int $select ) : string {

		switch ($select) {
			case 1 : { // liste des listes
				$content = $this->lesListes();
				break;
			}
			case 3 : { // un item
				$content = $this->unItem();
				break;
			}
			case 5 : { // un item
				$content = $this->formListe();
				break;
			}
		}

		$url_accueil    = $this->container->router->pathFor( 'racine'                 ) ;
		$url_listes     = $this->container->router->pathFor( 'aff_listes'             ) ;
		$url_liste_1    = $this->container->router->pathFor( 'aff_liste', ['no' => 1] ) ;
		$url_item_2     = $this->container->router->pathFor( 'aff_item' , ['id' => 2] ) ;
		$url_form_liste = $this->container->router->pathFor( 'formListe'              ) ;

		$html = <<<FIN
<!DOCTYPE html>
<html>
  <head>
    <title>Exemple</title>
  </head>
  <body>
		<h1><a href="$url_accueil">Wish List</a></h1>
		<nav>
			<ul>
				<li><a href="$url_accueil">Accueil</a></li>
				<li><a href="$url_listes">Listes</a></li>
				<li><a href="$url_liste_1">Liste 1</a></li>
				<li><a href="$url_item_2">Item 2</a></li>
				<li><a href="$url_form_liste">Nouvelle Liste</a></li>
			</ul>
		</nav>
    $content
  </body>
</html>
FIN;
		return $html;
	}
}
