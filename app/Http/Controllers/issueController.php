<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issues;
use Session;


Class issueController extends controller
{
    public function getIssues()
    {
        try
        {
            //set at login
            $userID = Session::get('id');
            
            $issues = new Issues();
            //retirive issues based on company user or access level, see model for more details
            $allIssues = $issues->getIssues($userID);            
            if($allIssues && sizeof($allIssues) > 0)
            {                
                return view('issues', ["issues"=>$allIssues]);
            }
            else 
            {             
                Session::flash('error', "No issues found for this user.");
                return view('issues', ["issues"=>$allIssues]);
            }           
        } catch (Exception $ex) {
            Session::flash('error', $ex->getMessage);
            return redirect('/issues');
        }
    }
}