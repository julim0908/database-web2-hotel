<?php
class AuthHelper {
    public static function login($user) {
        //inicio la sesion
        //AuthHelper::init();
        session_start();
        //en el arreglo session guardo los datos de las credenciales del usuario [username, id]
        $email = $_SESSION['email'] = $user->email;
        $logged =$_SESSION['logged'] = true;  

        return $email . $logged;

    }

    public static function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'home');

    }

    public static function verify() {
        session_start();
        //si no hay una session seteada
        if (!isset($_SESSION['user'])) {
            //envio al home
            header('Location: ' . BASE_URL . 'home');
            die();
        }
    }
}