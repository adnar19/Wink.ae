<?php

class User extends Model
{
	
	function __construct()
	{
		parent::__construct();

	}

    
    public function contact($data)
	{
		$objet=$this->db->prepare("INSERT INTO contact (name, email, subject, message) VALUES (:name,:email,:subject,:message)");
		$objet->execute(array(':name' =>$data['name'],':email' =>$data['email'],':subject' =>$data['subject'],':message' =>$data['message']));
		return $objet->fetch(PDO::FETCH_ASSOC);
	}


	public function getNewsletterId($data)
	{
		$select=$this->db->prepare("SELECT * FROM newsletter WHERE email =:email");
		$select->execute(array(':email' =>$data['email']));
		return $select->fetch(PDO::FETCH_ASSOC);
	}

	public function addNewsLetter($data)
	{
		$objet=$this->db->prepare("INSERT INTO `newsletter` (`email`, `ip`, `dates`) VALUES (:email, :ip, now());");
		$objet->execute(array(':email' =>$data['email'],':ip' =>$data['ip']));
		return $this->db->lastInsertId();
	}

	
}
?>