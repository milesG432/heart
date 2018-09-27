<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;
    
    public function checkUser($email, $password)
    {
        try
        {
            var_dump($email);
        } catch (Exception $ex) {

        }
    }
   
}
