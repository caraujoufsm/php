<?php

class dados {

	private $id;
	private $estacao_id;
	private $temperatura;
	private $velocidade_vento;
	private $umidade;
	private $data;

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getEstacao_id(){
		return $this->estacao_id;
	}

	public function setEstacao_id($value){
		$this->estacao_id = $value;
	}

	public function getTemperatura(){
		return $this->temperatura;
	}

	public function setTemperatura($value){
		$this->temperatura = $value;
	}

	public function getVelocidade_vento(){
		return $this->velocidade_vento;
	}

	public function setVelocidade_vento($value){
		$this->velocidade_vento = $value;
	}

	public function getUmidade(){
		return $this->umidade;
	}

	public function setUmidade($value){
		$this->umidade = $value;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($value){
		$this->data = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM dados WHERE id =:ID", array(
			":ID"=>$id
			));

		if(count($results) > 0){

			$row = $results[0];
		
			$this->setId($row['id']);
			$this->setEstacao_id($row['estacao_id']);
			$this->setTemperatura($row['temperatura']);
			$this->setVelocidade_vento($row['velocidade_vento']);
			$this->setUmidade($row['umidade']);
			$this->setData(new DateTime($row['data']));

		}
	
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM dados ORDER BY data;");
	}

	public static function search($id){
		$sql = new Sql();

		return $sql->select("SELECT * FROM dados WHERE estacao_id LIKE :SEARCH ORDER BY temperatura", array(
			':SEARCH'=>"%".$id."%"
			));
	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"estacao_id"=>$this->getEstacao_id(),
			"temperatura"=>$this->getTemperatura(),
			"velocidade_vento"=>$this->getVelocidade_vento(),
			"umidade"=>$this->getUmidade(),
			"data"=>$this->getData()->format("d/m/Y"),
			));
	}
}


?>