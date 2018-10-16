<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wishlist;
use Session;


Class wishlistController extends controller
{
    public function getWishlistItems()
    {
        try
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
        } catch (Exception $ex) {

        }
    }
    
    public function upvote()
    {
        try
        {
            $issueId = $_GET['id'];
            $userId = Session::get('id');
            $result = new wishlist();
            $newResult = $result->voterCheats($issueId, $userId);
            echo json_encode($newResult);
        } catch (Exception $ex) {

        }
    }
    
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
}