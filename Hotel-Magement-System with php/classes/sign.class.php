<?php


class Signup extends SignUpContr{
    private $fname;
    private $sname;
    private $email;
    private $pass;

    public function __construct($fname, $sname, $email, $pass)
    {
        $this -> fname = $fname;
        $this -> sname = $sname;
        $this -> email = $email;
        $this -> pass = $pass;
    }
  
    public function signUpuser(){
        /*if($this->emptyFields() == false){
            header("location: ../includes/sign_up.php?=empty-fields"); 
            exit();
        }
        if($this->validEmail() == false){
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>Invalid email</p>";
            exit();
        }
        if($this->validUser() == false){
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>Use letters only</p>";
            exit();
        }*/
        if($this->checkUsers() == false){
            echo "<p style='background-color: red; color:white; padding-left:30px; padding:10px; border-radius: 10px;'>
            The email exist please login</p>";
            exit();
        }
        $this ->setUser($this -> fname, $this -> sname,  $this -> email, $this -> pass);
    }

    public function emptyFields(){
        $result = false;
        if(empty($this -> fname) || empty($this -> sname) ||empty($this -> email) || empty($this -> pass) ){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function validEmail(){
        $result = false;
        if(!filter_var($this-> email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function validUser(){
        $result = false;
        if(!preg_match("/^[a-zA-Z]*$/", $this->fname) || !preg_match("/^[a-zA-Z]*$/", $this->sname)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
       public function checkUsers(){
        $result = false;
        if(!$this->checkUser($this->email, $this->pass)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
       
}