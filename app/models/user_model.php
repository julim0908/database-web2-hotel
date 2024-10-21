<?php
    class userModel{
        private $db;

      private function getConnection(){
        return new PDO('mysql:host=localhost;dbname=hotel_tandil;charset=utf8', 'root', '');
    }

        function getUserByName($user){
            $db = $this->getConnection();
            $query = $db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
            $query->execute([$user]);
            $user = $query->fetchAll(PDO::FETCH_OBJ);  
            return $user;
        }
    }