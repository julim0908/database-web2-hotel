<?php
    class userView{

        public function __construct($user) {
            $this->user = null;
        } 
        function showFormLogin(){
            require 'templates/login.phtml';
        }
        function showError($error){
            'templates/error.phtml';
        }
    }

?>