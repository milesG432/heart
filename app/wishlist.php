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
    
    public function getWishlist()
    {
        try
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
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public function voterCheats($issueID, $userID)
    {
        try
        {
            $result = DB::table('vote_tracker')                    
                    ->where('custId', $userID)
                    ->where('issueId', $issueID)
                    ->count();
            if($result <= 0)
            {
                 
                return true;
            }
            else
            {
                return false;
            }
        } catch (Exception $ex) {

        }
    }
    
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
    
}