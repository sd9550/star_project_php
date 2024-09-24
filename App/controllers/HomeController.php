<?php
namespace App\Controllers;
use Framework\Database;

class HomeController {
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index() {
        // load a limited number of posts for front page
        $partialStars = $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 3')->fetchAll();
        loadView('home', ['stars' => $partialStars]);
    }

}    

?>