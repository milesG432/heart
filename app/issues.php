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
    
    //get issues specific to user or company if applicable
    public function getIssues($userID)
    {
        try
        {
            $errors = 
            [
                
            ];
            if($userID)
            {
                //get user details
                $user = DB::table('user')->where('id', $userID)->first();
                
                //if user has a company assigned to them get all issues for that company
                if($user->company)
                {
                    $issues = DB::table('issues')
                        ->join('user', 'issues.userID', '=', 'user.id')
                        ->select('issues.*', 'user.firstname', 'user.surname', 'user.company')
                        ->where('user.company', '=', $user->company)
                        ->get();
                }
                //else get only issues for that user
                else if ('admin' != $user->accessLevel)
                {
                    $issues = DB::table('issues')
                        ->join('user', 'issues.userID', '=', 'user.id')
                        ->select('issues.*', 'user.firstname', 'user.surname', 'user.company')
                        ->where('user.id', '=', $userID)
                        ->get();                
                }
                //else assume user is admin and get all issues
                else 
                {
                    $issues = DB::table('issues')
                        ->join('user', 'issues.userID', '=', 'user.id')
                        ->select('issues.*', 'user.firstname', 'user.surname', 'user.company')                        
                        ->get();
                }
                
                
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