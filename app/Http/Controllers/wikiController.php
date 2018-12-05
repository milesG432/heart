<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wiki;
use Session;


Class wikiController extends controller
{
        public function getRandomWiki()
        {
            try
            {
                
            } catch (Exception $ex) {

            }
        }
        
        public function createWiki(request $request)
        {
            try
            {
                if($request['wikiTitle'] && $request['wikiIntro'] && $request['wikiText'])
                {
                    $entry =
                    [
                    'title' => $request['wikiTitle'],
                    'intro' => $request['wikiIntro'],
                    'body' => $request['wikiText']
                    ];
                    $wiki = new wiki();
                    $wikiResult = $wiki->createWiki($entry);
                    var_dump($wikiResult);
                    if($wikiResult && "Wiki entry added" == $wikiResult)
                    {
                        var_dump("1");
                        Session::flash('message', $wikiResult);
                        return redirect('/wiki');
                    }
                    else
                    {
                        var_dump("2");
                        Session::flash('error', $wikiResult);
                        return redirect('/wiki');
                    }
                }
                else
                {
                    
                }
            } catch (Exception $ex) {

            }
        }
        
        public function deleteWiki()
        {
            try
            {
                
            } catch (Exception $ex) {

            }
        }
        
        public function editWiki()
        {
            try
            {
                
            } catch (Exception $ex) {

            }
        }
}