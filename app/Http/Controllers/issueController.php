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
            $userID = Session::get('id');
            $issues = new Issues();
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