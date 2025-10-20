<?php
// Chargement de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Calcul automatique du base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = rtrim($protocol . "://" . $host . $scriptDir, '/');

// Configuration Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true
]);

// Articles
$articles = [
    [
        "title" => "Halloween",
        "excerpt" => "Okoo célèbre Halloween avec tous les héros !
",
        "url" => "#",
        "image" => "https://medias.france.tv/8b2Z2YaAWmYS8meOj5IC-X2BE_w/400x0/filters:quality(85):format(webp)/8/c/x/phpvryxc8.jpg"
    ],
    [
        "title" => "Les Trois Bricochons",
        "excerpt" => "Cornelia, César et Charlie sont les Trois Bricochons. Cette fratrie partage la même passion pour la construction.
",
        "url" => "#",
        "image" => "https://medias.france.tv/mIS95eywprY7k9_HBwMcoR3S58Q/400x0/filters:quality(85):format(webp)/p/4/w/phpreww4p.jpg"
    ],
    [
        "title" => "Simon Superlapin",
        "excerpt" => "Simon, son petit frère Gaspard et ses deux meilleurs copains Lou et Ferdinand sont quatre enfants à l’imagination débordante.",
        "url" => "#",
        "image" => "https://medias.france.tv/DsWe-dw-K7aEUJKBUhEYX2fyWYc/400x0/filters:quality(85):format(webp)/m/i/t/phpciktim.jpg"
    ],
    [
        "title" => "Dinosaures",
        "excerpt" => "Des histoires de dinosaures sur Okoo",
        "url" => "#",
        "image" => "https://medias.france.tv/EnvtDtTwALnbEJ3gY2YnD1uwPj0/400x0/filters:quality(85):format(webp)/y/w/w/php8ihwwy.jpg"
    ],
    [
        "title" => "Les Moodz",
        "excerpt" => "Adorables, espiègles et très expressifs, les Moodz, douze petits personnages, se laissent régulièrement déborder par le flot de leurs émotions.",
        "url" => "#",
        "image" => "https://medias.france.tv/Jb_DFAGeklytzmRuZvjqOAGuNWI/400x0/filters:quality(85):format(webp)/9/o/b/phpzfjbo9.jpg"
    ],
    [
        "title" => "Les mini-héros de la forêt",
        "excerpt" => "Juliette, Gaston, Jade et Gabin, les mini-héros de la forêt, vivent dans le monde enchanté de merfeuillu.",
        "url" => "#",
        "image" => "https://medias.france.tv/Y25KTLHaeYHRgyqX-L2JTUtN6Vs/400x0/filters:quality(85):format(webp)/t/7/d/phpqwmd7t.jpg"
    ]
    
];

// Rendu Twig
echo $twig->render('index.twig', [
    'base_url' => $baseUrl,
    'articles' => $articles
]);
