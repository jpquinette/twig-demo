<?php
require_once 'vendor/autoload.php';

// Calcul automatique du base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' 
    || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = rtrim($protocol . "://" . $host . $scriptDir, '/');

// Twig setup
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false
]);

// Articles
$articles = [
    [
        "title" => "Gouvernement, budget… Quel est le plan de Sébastien Lecornu ?",
        "excerpt" => "Analyse des enjeux autour du budget et de la stratégie du nouveau Premier ministre.",
        "url" => "#",
        "image" => "/img/articles/lecornu-budget.jpg"
    ],
    [
        "title" => "À 35 ans, Sébastien Lecornu, nouveau Premier ministre…",
        "excerpt" => "Un profil jeune à la tête du gouvernement, marqué par son parcours politique.",
        "url" => "#",
        "image" => "/img/articles/lecornu-portrait.jpg"
    ],
    [
        "title" => "À 40 ans, Guillaume Kasbarian devient le plus jeune ministre de l’Économie",
        "excerpt" => "Un changement générationnel s’opère au ministère de l’Économie.",
        "url" => "#",
        "image" => "/img/articles/kasbarian.jpg"
    ],
    [
        "title" => "Aurore Bergé, nouvelle ministre du Travail…",
        "excerpt" => "Elle prend en charge des dossiers sensibles liés à l’emploi et au social.",
        "url" => "#",
        "image" => "/img/articles/berge.jpg"
    ],
    [
        "title" => "L’ex-ministre Clément Beaune sort du gouvernement…",
        "excerpt" => "Retour sur le départ de Clément Beaune après deux années au gouvernement.",
        "url" => "#",
        "image" => "/img/articles/beaune.jpg"
    ]
];

// Render template
echo $twig->render('index.twig', [
    'base_url' => $baseUrl,
    'articles' => $articles
]);
