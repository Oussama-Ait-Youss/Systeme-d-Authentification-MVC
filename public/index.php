<?php

    session_start();




    // class App{
         function splitURL(){
       if ($_GET['url']) {
        # code...
        $URL = explode("/",$_GET['url']);
       }else{
            $URL = 'home';
       }
       return $URL;
   }
   function loadController(){
        $URL = splitURL();
        $filename = "../app/controllers/" . $URL[0] . ".php";
        if(file_exists($filename)){
            require $filename;
            }else{
                
                $filename = "../app/controllers/_404.php";
                require $filename;
        }
    }
    // }
   

 
    


    loadController();

