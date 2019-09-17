<?php 
class film
{   
    public function index()  
    {
        include("views/v_head.php");
        include('views/v_menu.php');
        include('views/v_session_connexion.php');
        include("views/v_foot.php");
    }
    public function readFilms()  
    {
        include("models/film_m.php");
        include("views/v_head.php");
        include('views/v_menu.php');
        $film = new film_m();
        $data=$film->getAllfilm();
        include("views/v_table_film.php");
        include("views/v_foot.php");
    }
    
    public function readTypes(){
        include("models/film_m.php");
        include("views/v_head.php");
        include('views/v_menu.php');
        $film = new film_m();
        $data=$film->getAllGenres();
        include("views/v_table_genre.php");
        include("views/v_foot.php");
    
    }
    
    public function createFilm()  
    {
		include("models/film_m.php");
		include("views/v_head.php");
        include('views/v_menu.php');
		$film = new film_m();
		//$data=$film->createFilm();
		$typefilm=$film->dropDownTypefilm();
		include("views/v_form_film.php");
        include("views/v_foot.php");
	}

    public function updateFilm($id='')  
    {
        include("models/film_m.php");
        include("views/v_head.php");
        include("views/v_menu.php");
        $film = new film_m();
        $data=$film->readFilmById($id);
        $typefilm=$film->dropDownTypefilm();
        include("views/v_form_film.php"); 
        include("views/v_foot.php");
    }

    public function validFormCreateFilm()  
    {
	$errors=array(); 
    $data['title']=htmlspecialchars($_POST['titleFilm']); // evite injection js ...
    if ((preg_match("/([^[a-zA-Z0-9]+$])/",$data['title']))) $errors['title']='The title must contain only characters and numbers';
    if(strlen($data['title'])<2)$errors['title']='The movie\'s name must contain atleast 2 letters';
        
        
        
    $data['dateSortie']=htmlspecialchars($_POST['dateFilm']);
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$data['dateSortie']))
    {
        $errors['date']='Date format is not accepted try YYYY-MM-DD';
    }   
        
        
    $data['Productor']=htmlspecialchars($_POST['productorFilm']);
    if ((preg_match("/([^A-Za-z ])/",$data['Productor']))) $errors['productor']='The title must contain only characters ';
    if(strlen($data['Productor'])<2)$errors['productor']='The Productor\'s name must contain atleast 2 letters';
        
        
        
    $data['idGenre']=htmlspecialchars($_POST['idGenre']);
if(! is_numeric($data['idGenre'])) $errors['idGenre']='You must select a movie type';
        
        
    $data['duration']=htmlspecialchars($_POST['durationFilm']);
    if ((preg_match("/[^0-9]/",$data['duration']))) $errors['duration']='The duration must contain only numbers ';
        
    
        
        if(! empty($errors))
        {
		include("models/film_m.php");
		include("views/v_head.php");
        include('views/v_menu.php');
		$film = new film_m();
//		$data=$film->readUnfilm($id);
		$typefilm=$film->dropDownTypefilm();
		include("views/v_form_film.php");
        include("views/v_foot.php");
        }
        else
        {
    include("models/film_m.php");
    $film = new film_m();
    $data=$film->createFilm($data);
    header("Location: ".BASE_URL."index.php/Film/readFilms");
        }
        
    }
    
    
    
    public function cofirmDeleteFilm($id=''){
		include("models/film_m.php");
		include("views/v_head.php");
        include('views/v_menu.php');
        $film = new film_m();
        $data =$film->readSelectedFilm($id);
        include("views/v_table_film_delete.php");
        include("views/v_foot.php");
    
    
    }

    public function deleteFilm($id='')  
    {
		include("models/film_m.php");
		$film = new film_m();	
		$film->deleteFilmById($id);
header("Location: ".BASE_URL."index.php/Film/readFilms");		
    }

    
    
    
    
    
    
    
    
    public function validFormUpdateFilm()  
    {

	$errors=array(); 
   $id=htmlspecialchars($_POST['idFilm']);
    $data['title']=htmlspecialchars($_POST['titleFilm']); 
    if ((preg_match("/([^[a-zA-Z0-9]+$])/",$data['title']))) $errors['titleFilm']='The title must contain only characters and numbers';
    if(strlen($data['title'])<2)$errors['title']='The movie\'s name must contain atleast 2 letters';
        
        
        
    $data['date']=htmlspecialchars($_POST['dateFilm']);
     if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$data['date']))
    {
        $errors['date']='Date format is not accepted try YYYY-MM-DD';
    }   
        
        
    $data['productor']=htmlspecialchars($_POST['productorFilm']);
    if ((preg_match("/([^A-Za-z ])/",$data['productor']))) $errors['productor']='The title must contain only characters ';
    if(strlen($data['productor'])<2)$errors['productor']='The Productor\'s name must contain atleast 2 letters';
        
        
        
    $data['idGenre']=htmlspecialchars($_POST['idGenre']);
        if(! is_numeric($data['idGenre'])) $errors['idGenre']='You must select a movie type';
        
        
    $data['duration']=htmlspecialchars($_POST['durationFilm']);
    if ((preg_match("/[^0-9]/",$data['duration']))) $errors['durationFilm']='The duration must contain only numbers ';
        
    
        
        if(! empty($errors))
        {
        include("models/film_m.php");
        include("views/v_head.php");
        include("views/v_menu.php");
        $film = new film_m();
        //$data=$film->readUnfilm($id);
        $typefilm=$film->dropDownTypefilm();
        include("views/v_form_update_film.php"); 
        include("views/v_foot.php");
        }
        else
        {
           
    include("models/film_m.php");
    $film = new film_m();
    $data=$film->updateFilmById($id, $data);
    header("Location: ".BASE_URL."index.php/film/readFilms");
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
} 

