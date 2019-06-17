<?php 


class Usuario {
	private $id;
	private $login;
	private $senha;
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
	public function getLogin()
	{
		return $this->login;
	}

	public function setLogin($login)
	{
		return $this->login = $login;
	}
	public function getSenha()
	{
		return $this->senha;
	}

	public function setSenha($senha)
	{
		return $this->senha = $senha;
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

			$this->setData($results[0]);		
		}

	}

	public static function getList()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM myguests ORDER BY login");
	}

	public static function search($name){

		$sql = new Sql();

		return $sql->select("SELECT * FROM myguests WHERE login LIKE :SEARCH ORDER BY login",[
			':SEARCH'=>"%" . $name . "%" 
		]);

	}
	public function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM myguests WHERE login = :LOGIN and senha = :PASSWORD", [
			':LOGIN'=>$login,
			':PASSWORD'=>$password
		]);

		if (count($results) > 0)
		{
			
			$this->setData($results[0]);
			
		} else {
			throw new Exception ("Login e/ou senha invalidos");
		}
	}

	public function setData($data){

		$this->setId($data['id']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setReg_date(new DateTime($data['reg_date']));

	}

	public function insert()
	{
		$sql = new Sql();

			$results = $sql->select("CALL sp_usuarios_insert(:LOGIM, :PASSWORD)",[
				':LOGIM'=>$this->getLogin(),
				':PASSWORD'=>$this->getSenha()
			]);
		if (count($results) > 0)
		{
			$this->setData($results[0]);
			
		}			

	}

	public function update($login, $password)
	{
		$this->setLogin($login);
		$this->setSenha($password);
		
		$sql = new Sql();

		$sql->query("UPDATE myguests SET login = :LOGIN, senha = :PASSWORD where id = :ID", [
			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getSenha(),
			':ID'=>$this->getId()
		]);


	}

	public function __construct($login = "", $password = ""){

		$this->setLogin($login);
		$this->setSenha($password);

	}

	public function __toString(){
		return json_encode(array(
			'id'=>$this->getId(),
			'login'=>$this->getLogin(),
			'senha'=>$this->getSenha(),			
			'reg_date'=>$this->getReg_date()->format("d/m/y H:i:s")
		));
	}






}

 ?>