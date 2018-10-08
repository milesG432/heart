<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Issues;
use Session;
use Hash;

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
                return redirect('/issues');
            }           
        } catch (Exception $ex) {
            Session::flash('error', $ex->getMessage);
            return redirect('issues');
        }
    }
}