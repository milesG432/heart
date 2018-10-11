<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\issues;
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
    
    public function insertIssue(request $request)
    {
        try
        {
            $issue = [
                'userID' => $request['id'],
                'product' => $request['product'],
                'description' => $request['issueDescription']
            ];
            $newIssue = new issues();
            $issueResult = $newIssue->insertIssue($issue);
            if(true == $issueResult)
            {
                Session::flash('message', 'Your issue has been successfully submitted.');
                return redirect('/issues');
            }
            else
            {
                Session::flash('error', 'There has been a problem submitting your issue. Please try again or caontact Heart Systems on 01568 617600');
                return redirect('/issues');
            }
        } catch (Exception $ex) {
                Session::flash('error', $ex->getMessage);
                return redirect('/issues');
        }
    }
}