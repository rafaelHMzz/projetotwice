<?php

	namespace App\Models;

	use MF\Model\Model;

	class Usuario extends Model {

		private $id;
		private $nome;
		private $nascimento;
		private $sexo;
		private $email;
		private $senha;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function validaUsuario() {
			$query = "
			SELECT id, nome 
			FROM usuarios
			WHERE email = ? AND senha = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("email"));
			$stmt->bindValue(2, $this->__get("senha"));
			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function validaPorEmail() {
			$query = "
			SELECT email
			FROM usuarios
			WHERE email = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("email"));
			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function salvar() {
			$query = "
			INSERT INTO usuarios(nome, nascimento, sexo, email, senha)
			VALUES (?, ?, ?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("nome"));
			$stmt->bindValue(2, $this->__get("nascimento"));
			$stmt->bindValue(3, $this->__get("sexo"));
			$stmt->bindValue(4, $this->__get("email"));
			$stmt->bindValue(5, $this->__get("senha"));
			$stmt->execute();
		}

	}


?>