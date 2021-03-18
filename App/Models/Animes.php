<?php

	namespace App\Models;

	use MF\Model\Model;

	class Animes extends Model {

		private $id;
		private $nome;
		private $thumb;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function getAll() {
			$query = "
			SELECT id, nome, thumb 
			FROM animes";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

	}


?>