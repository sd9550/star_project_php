<?php
namespace App\Controllers;
use Framework\Database;

class StarController {
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index() {
        $stars = $this->db->query('SELECT * FROM posts ORDER BY created_at DESC')->fetchAll();
        loadView('stars/index', ['stars' => $stars]);
    }

    public function show($params) {
        $id = $params['id'] ?? null;
        $params = ['id' => $id];
        $star = $this->db->query("SELECT * FROM posts WHERE id = :id", $params)->fetch();

        if(!$star) {
            ErrorController::notFound('Listing not found!');
        }
        loadView('stars/show', ['star' => $star]);
    }

    public function create() {
        loadView('stars/create');
    }

    public function store() {
        $errors = [];
        $fileErrors = [];
        $tempname = $_FILES['uploadfile']['tmp_name'];
        $name = $_FILES['uploadfile']['name'];
        $target_file = '/images/uploads/' . $name;
        $allowedFields = ['name', 'description', 'distance'];
        $newStarData = array_intersect_key($_POST, array_flip($allowedFields));
        $newStarData['user_id'] = 1;
        $newStarData = array_map('sanitize', $newStarData);
        $fileErrors = validImage($_FILES['uploadfile']);

        foreach($allowedFields as $field) {
            if(empty($newStarData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if(!empty($errors) || !empty($fileErrors)) {
            loadView('stars/create', ['errors' => $errors, 'fileErrors' => $fileErrors]);
        } else {
            $params = ['user_id' => $newStarData['user_id'], 'name' => $newStarData['name'], 'description' => $newStarData['description'], 'image' => $target_file, 'distance' => $newStarData['distance']];
            $this->db->query('INSERT INTO posts (user_id, name, description, image, distance) VALUES (:user_id, :name, :description, :image, :distance)', $params);
            move_uploaded_file($tempname, $target_file);
            header('Location: /stars');
        }
        
    }
}