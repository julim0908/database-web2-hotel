<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './app/middlewares/auth.helper.php';


class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function Login() {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
          //  return $this->view->showLogin('Falta completar el nombre de usuario');
           echo "datos vacios";
        } 
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserByEmail($email);
         

        if($userFromDB && password_verify($password, $userFromDB->password)){
            AuthHelper::login($userFromDB);
            var_dump($_SESSION);
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            //return $this->view->showLogin('Credenciales incorrectas');
             echo "error al iniciar sesion";
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL. 'showLogin');
    }
}

?>