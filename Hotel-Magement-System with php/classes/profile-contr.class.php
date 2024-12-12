<?php

class Profile{
   private $settings;

   public function __construct($settings)
   {
    $this -> settings = $settings;
   }

   public function profile(){
        switch($this->settings){
            case 'security':
                // no implemented
                include '../menu/security.inc.php';
                break;
            case 'personal_details':
                // no implemented
                break;

            case 'others':
                // not implemented
                break;

            default:
                echo "invalid input";
                break;
        }
   }
}