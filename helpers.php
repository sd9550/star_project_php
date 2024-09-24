<?php

function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

// shortend calls for partials
function loadPartial($name) {
    require(basePath('App/views/partials/' . $name . '.php'));
}

function loadView($name, $data = []) {
    $viewPath = basePath('App/views/' . $name . '.view.php');

    if(file_exists($viewPath)) {
        extract($data);
        require($viewPath);
    } else {
        echo 'view error';
    }
}

function sanitize($dirty) {
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

function validImage($img) {
    $fileErrors = [];
    $target_file = basePath('public/images/uploads/' . $img["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $size = getimagesize($img['tmp_name']);

    if(!$size) {
        $fileErrors[] = 'File is not an image';
    }

    if(file_exists($target_file)) {
        $fileErrors[] = 'File already exists';
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $fileErrors[] = 'File type is not supported';
    }

    return $fileErrors;
}

function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

?>