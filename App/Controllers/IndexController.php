<?php

	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Model\Container;

	class IndexController extends Action {
		
		public function redireciona() {
			if($this->validaAutenticação()) {
				header("Location: /main");
			} else {
				header("Location: /");
			}
		}

		public function index() {
			if($this->validaAutenticação()) {
				header("Location: /main");
			} else {
				$this->view->erro = isset($_GET["login"]) ? $_GET["login"] : "";
				$this->view->title = "Projeto Twice - Login";
				$this->render("index");
			}
		}

		public function login() {
			if($this->validaAutenticação()) {
				header("Location: /main");
			} else {
				$cmd = $_POST["cmd"];
				if($cmd == "logar") {
					$usuario = Container::getModel("usuario");
					$usuario->__set("email", $_POST["email"]);
					$usuario->__set("senha", $_POST["senha"]);
					$retorno = $usuario->validaUsuario();
					if($retorno["id"] != "" && $retorno["nome"] != "") {
						session_start();
						$_SESSION["id"] = $retorno["id"];
						$_SESSION["nome"] = $retorno["nome"];
						$_SESSION["auth"] = true;
						header("Location: /main");
					} else {
						header("Location: /?login=erro");
					}
				} else if($cmd == "cadastrar") {
					header("Location: /cadastro");
				}
			}
		}

		public function cadastro() {
			$this->view->cadastro = isset($_GET["cadastro"]) ? $_GET["cadastro"] : "";
			$this->view->title = "Projeto Twice - Cadastro";
			$this->render("cadastro");
		}

		public function cadastrar() {
			$usuario = Container::getModel("usuario");
			$usuario->__set("email", $_POST["email"]);
			$retorno = $usuario->validaPorEmail();

			if($retorno["email"] == $usuario->__get("email")) {
				header("Location: /cadastro?cadastro=erro");
			} else {
				$usuario->__set("nome", $_POST["nome"]);
				$usuario->__set("nascimento", $_POST["nascimento"]);
				$usuario->__set("sexo", $_POST["sexo"]);
				$usuario->__set("senha", $_POST["senha"]);
				$usuario->salvar();
				header("Location: /cadastro?cadastro=success");
			}
			
		}

		public function validaAutenticação() {
			session_start();
			if(isset($_SESSION["auth"])) {
				return $_SESSION["auth"];
			} else {
				return false;
			}
		}

	}


?>