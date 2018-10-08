<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Hash;


class Issues extends Authenticatable
{
    use Notifiable;
    
    public function getIssues($userID)
    {
        try
        {
            $errors = 
            [
                
            ];
            if($userID)
            {
                $issues = DB::table('issues')
                        ->join('user', 'issues.userID', '=', 'user.id')
                        ->select('issues.*', 'user.firstname', 'user.surname', 'user.company')
                        ->get();
                if(sizeof($issues) > 0)
                {
                    return $issues;
                }
                else
                {
                    $errors['no issues'] = "No issues found for this user.";
                    return $issues;
                }
            } 
            else 
            {
                $errors['no issues'] = "No user details found.";
            }
            
            if(sizeof($errors) > 0)
            {
                return $errors;
            }
        } catch (Exception $ex) {
            $errors['exception'] = $ex->getMessage;
            return $errors;
        }
    }
}