<?php
class HobbiesView {
    
    public function __construct() {

    }

    public function display($template=NULL, $content=NULL) {

        include("view/menu/MainMenu.html");
               
       if (!empty($template)) { 
            include($template);
        }
        
    }    

}