<?php
    class userView{
        private $user = null;
        
        function showFormLogin($error = '') {
            require './templates/login.phtml';
        }
    }

?>