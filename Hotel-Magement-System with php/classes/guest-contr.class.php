<?php


class Guest_Contr extends Guest{

    private $user_id;
    private $first_name;
    private $surname;
    private $initials;
    private $gender;
    private $nationality;
    private $marital;
    private $title;
    private $email_address;
    private $phone_number;
    private $id_number;
    private $passport;

    public function __construct($user_id,$first_name,
    $surname,$initials,$gender,$nationality,$marital_status,
    $title,$email_address,$phone_number,$id_number,$passport)
    {
        $this -> user_id = $user_id;
        $this -> first_name = $first_name;
        $this -> surname = $surname;
        $this -> initials = $initials;
        $this -> gender = $gender;
        $this -> nationality = $nationality;
        $this -> marital= $marital_status;
        $this -> title = $title;
        $this -> email_address = $email_address;
        $this -> phone_number = $phone_number;
        $this -> id_number = $id_number;
        $this -> passport = $passport;
    }
  
    public function addinfo(){
       
        if($this->validEmail() == false){
            header("location: ../menu/profile.php?error=invalid-email");
            exit();
        }
        if($this->validUser() == false){
            header("location: ../menu/profile.php??error=invalid-username");
            exit();
        }
        if($this->checkUsers() == false){
            header("location: ../menu/profile.php??error=user-exit");
            exit();
        }
       
        $this ->add_guestinfo($this -> user_id , $this -> first_name,  $this -> surname, $this -> initials,
            $this -> gender , $this -> nationality,  $this -> marital, $this -> title,
            $this -> email_address, $this -> phone_number,  $this -> id_number, $this -> passport);
    }

    public function validEmail(){
        $result = false;
        if(!filter_var($this-> email_address, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function validUser(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->first_name) || !preg_match("/^[a-zA-Z0-9]*$/", $this->surname)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
      
    public function checkUsers(){
        $result = false;
        if(!$this->check_guest($this->user_id,$this->first_name, $this->email_address,$this->phone_number)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function message($error){
        
    }
   
}