<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wishlist;
use Session;


Class wishlistController extends controller
{
    //get wishlist items and add show in table
    public function getWishlistItems()
    {
        try
        {
            if(!isset($_GET['id']))//get all wishes for initial table
            {
                $wishList = new wishList();
                $allWishes = $wishList->getWishlist();
                if($allWishes == false)
                {
                    Session::flash('error', " There has been a problem submitting your wish. Please try again later.");
                    return view('wishlist');
                }
                else
                {
                    return view('wishlist', ["wishList" => $allWishes]);
                }
            }
            else//get single wish for editing
            {
                $wishId = $_GET['id'];
                $singleWish = new wishlist();
                $singleWishResult = $singleWish->getWishlist($wishId);
                if( false == $singleWishResult)
                {
                    Session::flash('error', "Error finding details. Please try again. If the problem persists caontact an admin.");
                    return redirect('/wishlist');
                }
                elseif(sizeof($singleWishResult) > 0 && false != $singleWishResult)
                {
                    echo json_encode($singleWishResult);
                }
                else 
                {
                    Session::flash('error', "Error finding details. Please try again. If the problem persists caontact an admin.");
                    return redirect('/wishlist');
                }
            }                        
        } catch (Exception $ex) {

        }
    }
    
    //check user has not already voted for issue and if not then increment vote counter
    public function upvote()
    {
        try
        {
            $issueId = $_GET['id'];
            $userId = Session::get('id');
            $result = new wishlist();
            $newResult = $result->voterCheats($issueId, $userId);
            if(0 == $newResult)
            {   
                Session::flash('message', "Thank you for voting");
                echo json_encode($newResult);                
            }
            else
            {                
                Session::flash('error', "You have already voted for this wish.");
                echo json_encode($newResult);
            }
        } catch (Exception $ex) {

        }
    }
    
    //add item to wishlist
    public function addItem(request $request)
    {
        try
        {
            $error = 
                [
                    'errorSet' => false
                ];
            $wish = 
                [
                    'id' => $request['id'],
                    'product' => $request['product'],
                    'wish' => $request['requestDescription']
                ];
            $wishResponse = new wishlist();
            $wishResult = $wishResponse->addWish($wish);
           
            if(true == $wishResult)
            {
                Session::flash('message', "Your issue has been submitted and is available for voting.");
                return redirect ('/wishlist');
            }
            else
            {
                Session::flash('error', "There has been a problem submitting this wish. Please try again later.");
                return redirect('/wishlist');
            }
        } catch (Exception $ex) {
            $error['errorSet'] = true;
            $error['error'] = $ex->getMessage;            
        }
    }
    
    public function insertEdittedWish(request $request)
    {
        try
        {
//            dd($request['requestDescription']);
            $wish = 
                [
                'wishID' => $request['id'],
                'wish' => $request['requestDescription'],
                'status' => $request['status'],
                'product' => $request['product'],
                'version' => $request['version']
                ];
            $editWish = new wishlist();
            $editResult = $editWish->insertEdittedWish($wish);
            if(true == $editResult)
            {
                Session::flash('message', "Wish edit successful.");
                return redirect('/wishlist');
            }
            else
            {
                Session::flash('error', "Edit failed. Please try again later.");
                return redirect('/wishlist');
            }
        } catch (Exception $ex) {

        }
    }
}