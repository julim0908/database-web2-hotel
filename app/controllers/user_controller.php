<?php
    require_once './app/views/user_view.php';
    require_once './app/models/user_model.php';

    class UserController {
        private $model;
        private $view;

        function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

        function showFormLogin() {
            $this->view->showFormLogin();
        }

        public function login() {
            // toma los datos del form
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            
            // busco el usuario por nombre
            $user = $this->model->getUserByName($nombre);
            
            // verifica que el usuario existe y que las contraseñas son iguales
            // Asegúrate de que $user sea un objeto y no un array.
            if ($user && password_verify($password, $user->password)) { // Cambiado a $contraseña
        
                // inicio una sesión para este usuario
                session_start();
                $_SESSION['USER_ID'] = $user->id_usuario;
                $_SESSION['USER_EMAIL'] = $user->nombre;
                $_SESSION['IS_LOGGED'] = true;
        
                header("Location: " . BASE_URL);
            } else {
                // si los datos son incorrectos muestro el form con un error
                $this->view->showFormLogin("El usuario o la contraseña no existe.");
            } 
        }
        
    
        public function logout() {
            session_start();
            session_destroy();
            header("Location: " . BASE_URL);
        }
    }
