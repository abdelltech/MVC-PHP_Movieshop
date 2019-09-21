<?php
//include('connexion_bdd.php');

class film_m{

	private $db;

	public function __construct(){
		$MaConnexion = new Connexion();
		$this->db = $MaConnexion->connect();
	}

	function getAllfilm(){
		$requete="SELECT *
		FROM film as f, genre as g 
		WHERE f.idGenre=g.idGenre
		ORDER BY g.labelGenre;";
    	try {
			$select = $this->db->query($requete);
			$results = $select->fetchAll();
			return $results;
		}catch ( Exception $e ) {
				echo "Error method getAllfilm : ", $e->getMessage();
			}
    }
	function getAllGenres(){
		$requete="SELECT * 
				  FROM genre
				  GROUP BY labelGenre";
    	try {
			$select = $this->db->query($requete);
			$results = $select->fetchAll();
			return $results;
			} 
		catch ( Exception $e ) {
				echo "Erreur methode getAllGenre : ", $e->getMessage();
			}
    }

    function readFilmById($id){
    	/*$requete="SELECT id,id_type,nom,prix,photo 
		FROM produit WHERE id=".$id." LIMIT 1;";*/
		$requete="SELECT *
		          FROM film
		          WHERE idFilm=:id
		          LIMIT 1";
    	try {
			/*$select = $this->db->query($requete);
			$result = $select->fetchAll();
			return $result[0];*/
			$prep=$this->db->prepare($requete);
    		$prep->bindParam(':id',$id,PDO::PARAM_INT);
    		$prep->execute();
    		$result = $prep->fetch();
			return $result;
		} catch ( Exception $e ) {
				echo "Error method readFilmById : ", $e->getMessage();
			}
    }

    function deleteFilmById($id){
		$requete="DELETE FROM film
		          WHERE idFilm=$id
		          ";
    	try {
			$nbRes = $this->db->exec($requete);
			return $nbRes;
		} catch ( Exception $e ) {
				echo "Error method deleteFilmById : ", $e->getMessage();
			}
    }
    
    function readSelectedFilm($id){
        
        $requete="SELECT *
				  FROM film as f, genre as g 
				  WHERE idFilm=$id
				  AND f.idGenre = g.idGenre";
    	try {
			$select = $this->db->query($requete);
			$results = $select->fetchAll();
			return $results;
			} 
		catch ( Exception $e ) {
				echo "Error method readSelectedFilm : ", $e->getMessage();
			}
    
    }
        
    function updateFilmById($id, $data){
   
    	$requete="UPDATE film
    	          SET titleFilm='".$data['title']."' ,dateFilm='".$data['date']."', productorFilm='".$data['productor']."' ,idGenre='".$data['idGenre']."', 	durationFilm='".$data['duration']."'
    	          WHERE idFilm='".$id."'";
    	try {
			$nbRes = $this->db->exec($requete);
		} catch ( Exception $e ) {
				echo "Error method updateFilmById : ", $e->getMessage();
			}
    }

 	function createFilm($data){
    	$requete="INSERT INTO film VALUES (NULL, :titleFilm, :dateFilm, :productorFilm, :idGenre, :durationFilm)";
    	try {
    		$prep=$this->db->prepare($requete);
    		$prep->bindParam(':titleFilm', $data['title'], PDO::PARAM_STR);
    		$prep->bindParam(':dateFilm', $data['date'], PDO::PARAM_STR);
    		$prep->bindParam(':productorFilm', $data['productor'], PDO::PARAM_STR);
    		$prep->bindParam(':idGenre', $data['idGenre'], PDO::PARAM_STR);
            $prep->bindParam(':durationFilm', $data['duration'], PDO::PARAM_STR);
			$prep->execute();
		//	$nbRes = $this->db->exec($requete);
		} catch ( Exception $e ) {
				echo "Error method createFilm : ", $e->getMessage();
			}
    }

    function dropDownTypeFilm(){
    	
    	$requete="SELECT *
				 FROM genre
				 ORDER BY idGenre";

    	try {
			$select = $this->db->query($requete);
			$result = $select->fetchAll();
			} 
		catch ( Exception $e ) {
				echo "Error method dropDownTypeFilm : ", $e->getMessage();
			}
    	$liste_dropDown = array();
        if(count($result) > 0){
            $liste_dropDown[''] = 'Select film type';
        	foreach($result as $row){
            	$liste_dropDown[$row['idGenre']] = $row['labelGenre'];
        	}
    	}
    	return $liste_dropDown;
    }
}
