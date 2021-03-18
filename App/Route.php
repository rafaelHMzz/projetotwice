<?php


	namespace App;

	use MF\Init\Bootstrap;

	class Route extends Bootstrap {

		protected function initRoutes() {
			$routes["home"] = array(
				"route" => "/",
				"controller" => "indexController",
				"action" => "index"
			);
			$routes["login"] = array(
				"route" => "/login",
				"controller" => "indexController",
				"action" => "login"
			);
			$routes["main"] = array(
				"route" => "/main",
				"controller" => "appController",
				"action" => "main"
			);
			$routes["sair"] = array(
				"route" => "/sair",
				"controller" => "appController",
				"action" => "sair"
			);
			$routes["cadastrar"] = array(
				"route" => "/cadastrar",
				"controller" => "indexController",
				"action" => "cadastrar"
			);
			$routes["cadastro"] = array(
				"route" => "/cadastro",
				"controller" => "indexController",
				"action" => "cadastro"
			);
			$routes["animes"] = array(
				"route" => "/animes",
				"controller" => "appController",
				"action" => "animes"
			);
			$routes["assistir"] = array(
				"route" => "/assistir",
				"controller" => "appController",
				"action" => "assistir"
			);
			$routes["adicionar"] = array(
				"route" => "/adicionar",
				"controller" => "appController",
				"action" => "adicionar"
			);
			$routes["adicionarEpisodio"] = array(
				"route" => "/adicionarEpisodio",
				"controller" => "appController",
				"action" => "adicionarEpisodio"
			);
			$routes["assistirEpisodio"] = array(
				"route" => "/assistirEpisodio",
				"controller" => "appController",
				"action" => "assistirEpisodio"
			);
			$routes["editarEpisodio"] = array(
				"route" => "/editarEpisodio",
				"controller" => "appController",
				"action" => "editarEpisodio"
			);
			$routes["salvarEpisodio"] = array(
				"route" => "/salvarEpisodio",
				"controller" => "appController",
				"action" => "salvarEpisodio"
			);
			$routes["adicionarSite"] = array(
				"route" => "/adicionarSite",
				"controller" => "appController",
				"action" => "adicionarSite"
			);
			$routes["salvarSite"] = array(
				"route" => "/salvarSite",
				"controller" => "appController",
				"action" => "salvarSite"
			);
			$routes["app"] = array(
				"route" => "/App",
				"controller" => "indexController",
				"action" => "redireciona"
			);
			$routes["vendor"] = array(
				"route" => "/vendor",
				"controller" => "indexController",
				"action" => "redireciona"
			);
			$routes["composer.json"] = array(
				"route" => "/composer.json",
				"controller" => "indexController",
				"action" => "redireciona"
			);
			$routes["composer.lock"] = array(
				"route" => "/composer.lock",
				"controller" => "indexController",
				"action" => "redireciona"
			);
			$routes["composer.phar"] = array(
				"route" => "/composer.phar",
				"controller" => "indexController",
				"action" => "redireciona"
			);



			$this->setRoutes($routes);
		}

	}


?>