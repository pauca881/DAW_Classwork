
<?php

require_once "controller/HobbiesController.class.php";
require_once "controller/FriendsController.class.php";


class MainController {

    public function processRequest() {


        if(isset($_GET["menu"])){

            $request=$_GET["menu"];
        }
        else {

            $request=NULL;

        }


        switch($request){

            case "hobbies":
                $controlHobbies=new HobbiesController();
                $controlHobbies->processRequest();
                break;

            case "friends":
                $controlFriends=new FriendsController();
                $controlFriends->processRequest();
                break;
            default:
                $controlHobbies=new HobbiesController();
                $controlHobbies->processRequest();
                break;
        }

    }

}

?>