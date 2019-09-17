<?php
class Session_m{
	public $db = NULL; 
	public function __construct(){
		$this->db= Connexion::connect();
    }
    function verif_login_pw($login, $pw){
		$requete="SELECT *
		          FROM admin
		          WHERE pwAdmin='$pw' 
		          AND loginAdmin='$login'";
		$select = $this->db->query($requete);
		//$select->setFetchMode();
		if($select->rowCount()==1){
			$enregistrements = $select->fetch();
			return $enregistrements;
		}
		else{
			return false;
		}
    }    
    
}
