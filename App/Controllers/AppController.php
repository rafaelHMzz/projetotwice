<?php

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	class AppController extends Action {

		public function main() {
			$this->validaAutenticação();
			$sites = Container::getModel("sites");
			$retorno = $sites->getAll();
			$this->view->sites = $retorno;
			$this->view->title = "Projeto Twice - Sites";
			$this->render("main");
		}

		public function validaAutenticação() {
			session_start();
			if(!$_SESSION["auth"]) {
				header("Location: /?login=sessao");
			} 
		}

		public function sair() {
			session_start();
			session_destroy();
			header("Location: /");
		}

		public function animes() {
			$this->validaAutenticação();
			$animes = Container::getModel("animes");
			$retorno = $animes->getAll();
			$this->view->animes = $retorno;
			$this->view->title = "Projeto Twice - Animes";
			$this->render("animes");
		}

		public function assistir() {
			$this->validaAutenticação();
			$this->view->nome_anime = $_GET["nome_anime"];
			$episodio = Container::getModel("episodio");
			$episodio->__set("id_anime", $_GET["id_anime"]);
			$retorno = $episodio->getAll();
			$this->view->episodios = $retorno;
			$this->view->title = "Projeto Twice - Lista de episódios";
			$this->render("lista_episodios");
		}

		public function adicionar() {
			$this->validaAutenticação();
			$this->view->nome_anime = isset($_GET["nome_anime"]) ? $_GET["nome_anime"] : "";
			$this->view->id_anime = isset($_GET["id_anime"]) ? $_GET["id_anime"] : "";
			if($this->view->nome_anime == "") {
				header("Location: /animes");
			}
			$this->view->title = "Projeto Twice - Adicionar episódio";
			$this->render("adicionar_episodios");
		}

		public function adicionarEpisodio() {
			$this->validaAutenticação();
			$episodio = Container::getModel("episodio");
			$episodio->__set("id_anime", $_GET["id_anime"]);
			$episodio->__set("numero", $_GET["numero"]);
			$episodio->__set("titulo", $_GET["titulo"]);
			$episodio->__set("thumb", $_GET["thumb"]);
			$episodio->__set("link", $_GET["link"]);
			$episodio->salvar();
			header("Location: /assistir?nome_anime=".$_GET["nome"]."&id_anime=".$_GET["id_anime"]);
		}

		public function adicionarSite() {
			$this->validaAutenticação();
			$this->render("adicionar_site");
		}

		public function salvarSite() {
			$this->validaAutenticação();
			$sites = Container::getModel("sites");
			$sites->__set("nome", $_GET["nome"]);
			$sites->__set("url", $_GET["url"]);
			print_r($sites);
			$sites->salvar();
			header("Location: /main");
		}

		public function assistirEpisodio() {
			$this->validaAutenticação();
			$episodio = Container::getModel("episodio");
			$episodio->__set("id", $_GET["id_episodio"]);
			$retorno = $episodio->getEpisodio();
			$this->view->episodio = $retorno;
			$this->view->nome_anime = $_GET["nome_anime"];
			$this->view->title = "Projeto Twice - Assistir episódio";
			$this->render("episodio");
		}

		public function editarEpisodio() {
			$this->validaAutenticação();
			$episodio = Container::getModel("episodio");
			$episodio->__set("id", $_GET["id_episodio"]);
			$retorno = $episodio->getEpisodio();
			$this->view->episodio = $retorno;
			$this->view->nome_anime = $_GET["nome_anime"];
			$this->view->title = "Projeto Twice - Editar episódio";
			$this->render("editar_episodios");
		}

		public function salvarEpisodio() {
			$this->validaAutenticação();
			$episodio = Container::getModel("episodio");
			$episodio->__set("id", $_GET["id"]);
			$episodio->__set("id_anime", $_GET["id_anime"]);
			$episodio->__set("numero", $_GET["numero"]);
			$episodio->__set("titulo", $_GET["titulo"]);
			$episodio->__set("thumb", $_GET["thumb"]);
			$episodio->__set("link", $_GET["link"]);
			$episodio->alterar();
			header("Location: /assistir?nome_anime=".$_GET["nome"]."&id_anime=".$_GET["id_anime"]);
		}

	}


?>