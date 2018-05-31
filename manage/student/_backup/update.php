<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

{
    $path = "/var/www/html/manage/student/";
    $path = $path . basename($_FILES['uploaded_file']['name']);

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "The file " . basename($_FILES['uploaded_file']['name']) .
            " has been uploaded";
    } else {
        echo "There was an error uploading the file, please try again!";
    }
}

use Goodby\CSV\Import\Standard\Interpreter;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;

$file = $_FILES["uploaded_file"]["tmp_name"];
echo $_FILES["uploaded_file"]["tmp_name"];
$pdo = new PDO('mysql:host=localhost;dbname=material_db', 'root', 'toor');
$pdo->query('CREATE TABLE `student` ( `id` varchar(13) NOT NULL, `full_name` varchar(50) NOT NULL, `section` varchar(50) NOT NULL, `last_login` datetime DEFAULT NULL)');
$config = new LexerConfig();
$lexer = new Lexer($config);

$interpreter = new Interpreter();

$interpreter->addObserver(function (array $columns) use ($pdo) {
    $stmt = $pdo->prepare('INSERT INTO user (id, full_name, section) VALUES (?, ?, ?)');
    $stmt->execute($columns);
});

$lexer->parse($file, $interpreter);

