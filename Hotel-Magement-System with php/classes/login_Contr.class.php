<?php


class Login_User extends Login{
   
    private $email;
    private $pass;
    
    public function __construct($email, $pass)
    {
        $this -> email = $email;
        $this -> pass = $pass;
    }
  
    public function loginpuser(){
        if($this->emptyFields() == false){
            
            header("location: ../index.php?error=empty-fields");
            exit();
        }
        $this-> getUser($this-> email, $this-> pass);
        
    }

    public function emptyFields(){
        $result = false;
        if(empty($this -> email) || empty($this -> pass) ){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}