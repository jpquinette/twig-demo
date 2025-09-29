<?php
require_once 'vendor/autoload.php';

// Calcul automatique du base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = rtrim($protocol . "://" . $host . $scriptDir, '/');

// Twig setup
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false
]);

// Chargement des données
$data = json_decode(file_get_contents(__DIR__ . '/src/data/data.json'), true);

// Injection du base_url dans Twig
$data['base_url'] = $baseUrl;

// Render template
echo $twig->render('index.twig', $data);
