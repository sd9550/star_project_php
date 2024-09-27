<?php
namespace App\Controllers;
use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController {
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function login() {
        $username = $_POST['user_name'];
        $password = $_POST['user_password'];
        $errors = [];
        $params = ['user_name' => $username];
        $sql = 'SELECT * FROM users where user_name = :user_name';
        $user = $this->db->query($sql, $params)->fetch();

        if(!$user) {
            $errors[] = 'Invalid username';
            loadView('users/create', ['errors' => $errors]);
            exit;
        }

        if(!password_verify($password, $user->password)) {
            $errors[] = 'Invalid password';
            loadView('users/create', ['errors' => $errors]);
            exit;
        }

        Session::set('user', ['user_id' => $user->id, 'user_name' => $user->user_name]);
        header('Location: /');
    }

    public function create() {
        loadView('users/create');
    }

    public function store() {
        $username = $_POST['user_name'];
        $password = $_POST['user_password'];
        $errors = [];

        if(!Validation::string($username, 6, 20)) {
            $errors[] = 'Invalid username detected';
        }

        if(!Validation::string($password, 6, 20)) {
            $errors[] = "Invalid password detected";
        }

        if(!empty($errors)) {
            loadView('/users/create', ['errors' => $errors]);
            exit;
        }

        $params = ['user_name' => $username];
        $query = 'SELECT * FROM users WHERE user_name = :user_name';
        $user = $this->db->query($query, $params)->fetch();

        if($user) {
            $errors[] = 'That username already exists';
            loadView('/users/create', ['errors' => $errors]);
            exit;
        }

        $params = ['user_name' => $username, 'password' => password_hash($password, PASSWORD_DEFAULT)];
        $query = 'INSERT INTO users (user_name, password) VALUES (:user_name, :password)';
        $newUSer = $this->db->query($query, $params);
        $userId = $this->db->conn->lastInsertId();
        Session::set('user', ['user_id' => $userId, 'user_name' => $user_name]);
        header('Location: /');
    }

    public function logout() {
        Session::clearAll();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);
        header('Location: /');
    }
}