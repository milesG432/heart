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
    
    public function insertIssue($issue)
    {
        try
        {
            $errors = [
                
            ];
            //validate issue
            if($issue)
            {                
                $reportedDate = date('Y-m-d H:i:s');
                $result = DB::table('issues')
                        ->insert(
                                [
                                    'userID' => $issue['userID'],
                                    'product' => $issue['product'],
                                    'desc' => $issue['description'],
                                    'status' => 'Queued',
                                    'reportedDate' => $reportedDate,                                    
                                ]
                                );                
                if(true == $result)
                {
                    return true;
                }
                else 
                {
                    return false;
                }
            }
        } catch (Exception $ex) {
            $errors['exception'] = $ex->getMessage;
            return $errors;
        }
    }
    
    public function editIssue($id)
    {
        try
        {
            $errors = [

            ];
            if($id)
            {
                $result = DB::select("SELECT * FROM issues WHERE id = '" . $id . "';");
                if($result && sizeof($result) > 0)
                {
                    return $result;
                }
                else 
                {
                    $errors['Problem retiriving issue. Please contact an administrator'];
                }
            }
            else
            {
                $errors['noid'] = "No id supplied to query";
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
    
    public function inserEdittedIssue($issue)
    {
        try
        {
            $error = 
                [
                'errorsSet' => false
                ];
            //if issue from controller ok update issue in database
            if($issue && sizeof($issue) > 0)
            {
                    if('completed' == $issue['status'])
                    {
                        $completedDate = date('Y-m-d H:i:s');
                    } 
                    else
                    {
                        $completedDate = null;
                    }
                    $result = DB::table('issues')
                        ->where('id', $issue['id'])
                        ->update([
                            'product' => $issue['product'],
                            'desc' => $issue['desc'],
                            'status' => $issue['status'],
                            'completedDate' => $completedDate
                        ]);                                   
                return $result;
            }
            else
            {
                $error['errorsSet'] = true;
                $error['update'] = "Record updating has failed. Plesase try again later.";
                return $error;
            }            
        } catch (Exception $ex) {
            $error['errorsSet'] = true;
            $error['exception'] = $ex->getMessage;
            return $error;
        }
    }
}