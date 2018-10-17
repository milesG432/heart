<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Hash;


class wishList extends Authenticatable
{
    use Notifiable;
    //return wishlist items for viewing and votin
    public function getWishlist($wishId = null)
    {
        try
        {
            if(null == $wishId || !isset($wishId))//get all wishes for table
            {
                $wishes = DB::table('wishlist')->get();
                if(sizeof($wishes) > 0)
                {
                    return $wishes;
                }
                else
                {
                    return false;
                }
            }
            else//get single wish for editting
            {
                $wish = DB::table('wishList')
                        ->where('id', '=', $wishId)
                        ->get();
                if(sizeof($wish) > 0)
                {
                    return $wish;
                }
                else
                {
                    return false;
                }
            }            
        } catch (Exception $ex) {
            return false;
        }
    }
   
    //check user has not already voted for wish and if ok add vote
    public function voterCheats($issueID, $userID)
    {
        try
        {            
            $result = DB::table('vote_tracker')                    
                    ->where('custId', $userID)
                    ->where('issueId', $issueID)
                    ->count();
            if($result == '0')
            { 
                $trackerResult = DB::table('vote_tracker')                        
                        ->insert([
                            'custId' => $userID,
                            'issueID' => $issueID
                            ]);                            
                $voteUp = DB::table('wishlist')
                        ->where('id', $issueID)                        
                        ->increment('votes');                
                return $result;
            }
            else
            {
                return $result;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
    
    //add to wishlist
    public function addWish($wish)
    {
        try
        {            
            if($wish['id'] > 0 && strlen($wish['product']) > 1 && strlen($wish['wish']) > 1)
            {
                $result = DB::table('wishlist')
                        ->insert(
                        [
                            'userID' => $wish['id'],
                            'wish' => $wish['wish'],
                            'status' => 'Open',
                            'product' => $wish['product']
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
            else
            {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function insertEdittedWish($wish)
    {
        try
        {            
            if(sizeof($wish))
            {
                
                $result = DB::table('wishlist')
                        ->where('id', $wish['wishID'])
                        ->update([
                            'wish' => $wish['wish'],
                            'status' => $wish['status'],
                            'product' => $wish['product'],
                            'version_including' => $wish['version']
                        ]); 
                
                if(1 == $result)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        } catch (Exception $ex) {
            //todo handle errors
        }
    }
    
}