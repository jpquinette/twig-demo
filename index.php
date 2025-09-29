<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false
]);

$data = json_decode(file_get_contents(__DIR__ . '/src/data/data.json'), true);

echo $twig->render('index.twig', $data);
