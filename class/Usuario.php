<?php 


class Usuario {
	private $id;
	private $firstname;
	private $lastname;
	private $email;
	private $reg_date;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		return $this->id = $id;
	}
	public function getFirstname()
	{
		return $this->firstname;
	}

	public function setFirstname($firstname)
	{
		return $this->firstname = $firstname;
	}
	public function getLastname()
	{
		return $this->lastname;
	}

	public function setLastname($lastname)
	{
		return $this->lastname = $lastname;
	}
	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		return $this->email = $email;
	}
	public function getReg_date()
	{
		return $this->reg_date;
	}

	public function setReg_date($reg_date)
	{
		return $this->reg_date = $reg_date;
	}

	public function loadById($id)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM myguests WHERE id = :id", [
			":id"=>$id
		]);

		if (count($results) > 0){

			$row = $results[0];
			$this->setId($row['id']);
			$this->setFirstname($row['firstname']);
			$this->setLastname($row['lastname']);
			$this->setEmail($row['email']);
			$this->setReg_date(new DateTime($row['reg_date']));			
		}

	}

	public function __toString(){
		return json_encode(array(
			'id'=>$this->getId(),
			'firstname'=>$this->getFirstname(),
			'lestname'=>$this->getLastname(),
			'email'=>$this->getEmail(),
			'reg_date'=>$this->getReg_date()->format("d/m/y H:i:s")
		));
	}






}

 ?>