<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Hash;

class wiki extends Authenticatable {

    use Notifiable;

    public function createWiki($entry)
    {
        try
        {           
           if($entry && count($entry) == 3)
           {
               $createdDate = date('Y-m-d H:i:s');
                $result = DB::table('wiki')
                        ->insert(
                        [                            
                            'title' => $entry['title'],
                            'intro' => $entry['intro'],
                            'mainText' => $entry['body'],
                            'dateAdded' => $createdDate
                        ]
                );
                if($result && true == $result)
                {
                    return "Wiki entry added";
                } 
                else 
                {
                    return "Wiki entry failed, please contact an administrator";
                }
           }
           else
           {
               return "Wiki submission failed. Please try again later or contact an administrator";
           }
        } catch (Exception $ex) {
            //todo log exception
        }
    }
}
