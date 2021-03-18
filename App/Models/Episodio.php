<?php

	namespace App\Models;

	use MF\Model\Model;

	class Episodio extends Model {

		private $id;
		private $id_anime;
		private $numero;
		private $titulo;
		private $thumb;
		private $link;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function getAll() {
			$query = "
			SELECT id, id_anime, numero, titulo, thumb, link
			FROM episodios
			WHERE id_anime = ?
			ORDER BY numero DESC";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("id_anime"));
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function salvar() {
			$query = "INSERT INTO episodios(id_anime, numero, titulo, thumb, link) VALUES(?, ?, ?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("id_anime"));
			$stmt->bindValue(2, $this->__get("numero"));
			$stmt->bindValue(3, $this->__get("titulo"));
			$stmt->bindValue(4, $this->__get("thumb"));
			$stmt->bindValue(5, $this->__get("link"));
			$stmt->execute();
		}

		public function getEpisodio() {
			$query = "SELECT id, id_anime, numero, titulo, thumb, link
			FROM episodios
			WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("id"));
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function alterar() {
			$query = "UPDATE episodios SET numero = ?, titulo = ?, thumb = ?, link = ? WHERE id = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(1, $this->__get("numero"));
			$stmt->bindValue(2, $this->__get("titulo"));
			$stmt->bindValue(3, $this->__get("thumb"));
			$stmt->bindValue(4, $this->__get("link"));
			$stmt->bindValue(5, $this->__get("id"));
			$stmt->execute();
		}

	}


?>