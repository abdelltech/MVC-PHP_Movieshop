<?php 
class Session
{   

        public function connexionSession()  
    {
       
        unset($_SESSION['error']);
        require("models/session_m.php");
        $session = new Session_m();
        $data=$session->verif_login_pw($_POST['text_login'], $_POST['password']);
        if($data)
        {
           $_SESSION['login']=$data['loginAdmin'];
            $url=BASE_URL."index.php/Film/readFilms";
            header("Location: ".$url);
        }
        else
        {
           if (isset($_POST['btn_cnx'])) {
                $_SESSION['error']='login or password incorrect';
            } 
            $url=BASE_URL."index.php";
            header("Location: ".$url);
        }
    }
    public function deconnexionSession()  
    {
        unset($_SESSION['login']);
        unset($_SESSION['error']);
        
        
        
        $url=BASE_URL."index.php";
        header("Location: ".$url);
    }
    
    
} 
