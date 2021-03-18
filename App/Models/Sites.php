<?php

	namespace App\Models;

	use MF\Model\Model;

	class Sites extends Model {

		private $id;
		private $nome;
		private $url;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function getAll() {
			$query = "
			SELECT id, nome, url
			FROM sites
			ORDER BY id DESC";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function salvar() {
			$query = "INSERT INTO sites(nome, url) VALUES(?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("nome"));
			$stmt->bindValue(2, $this->__get("url"));
			$stmt->execute();
		}

		public function validaUrl() {
			$query = "SELECT id, nome, url FROM sites WHERE url = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("url"));
			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

	}


?>