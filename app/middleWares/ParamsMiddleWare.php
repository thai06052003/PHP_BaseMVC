<?php
class ParamsMiddleWare extends MiddleWare {
    public function handle(){
        //echo Route::getFullUrl();
        //echo $_SERVER['QUERY_STRING'];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $reponse = new Response();
            $reponse->redirect(Route::getFullUrl());
        }
    }
}