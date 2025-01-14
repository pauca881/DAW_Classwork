<?php

class Friend_and_Hobbie {


        private $friend_id;
        private $friend_name;
        
        private $hobby_id;
        private $hobby_name;
    
        public function __construct($friend_id, $friend_name, $hobby_id, $hobby_name) {
            $this->friend_id = $friend_id;
            $this->friend_name = $friend_name;
            $this->hobby_id = $hobby_id;
            $this->hobby_name = $hobby_name;
        }
    
    
    public function getFriendId() {
        return $this->friend_id;
    }

    public function getFriendName() {
        return $this->friend_name;
    }

    public function getHobbyId() {
        return $this->hobby_id;
    }

    public function getHobbyName() {
        return $this->hobby_name;
    }

    public function setFriendId($friend_id) {
        $this->friend_id = $friend_id;
    }

    public function setFriendName($friend_name) {
        $this->friend_name = $friend_name;
    }

    public function setHobbyId($hobby_id) {
        $this->hobby_id = $hobby_id;
    }

    public function setHobbyName($hobby_name) {
        $this->hobby_name = $hobby_name;
    }      
    
}




?>