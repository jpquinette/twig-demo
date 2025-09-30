<?php
require_once __DIR__ . '/vendor/autoload.php';

// Calcul automatique du base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = rtrim($protocol . "://" . $host . $scriptDir, '/');

// Twig setup
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true
]);

// Articles
$articles = [
    [
        "title" => "Une plainte déposée contre le Premier ministre Sébastien Lecornu, accusé d'avoir fait croire qu'il avait un master 2 de droit",
        "excerpt" => "Mi-septembre, Mediapart a révélé que le Premier ministre n'avait pas le diplôme de master, qui s'obtient en deux ans, contrairement à ce qu'affirmait sa page sur le réseau social LinkedIn.",
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/qZ3AcpnIy6O4eXmz7QZw7XLVpXE/0x0:6285x3533/2656x1494/filters:format(avif):quality(50)/2025/09/29/000-767u8nr-68da6a5820f42300203725.jpg"
    ],
    [
        "title" => "Dernières consultations, budget 2026, mobilisation sociale… La semaine très chargée de Sébastien Lecornu",
        "excerpt" => "Le Premier ministre doit dévoiler son gouvernement dans les prochains jours et il est attendu de pied ferme par les syndicats et les oppositions, qui menacent plus que jamais de le censurer.",
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/qgTZAMeLHFyoKePamt9L4kf5s5E/0x51:1024x627/2656x1494/filters:format(avif):quality(50)/2025/09/29/000-74da6zy-68da5d17ceae4183932012.jpg"
    ],
    [
        "title" => 'Le socialiste Olivier Faure réclame "une copie complète" du budget à Sébastien Lecornu lors de leur rencontre vendredi à Matignon',
        "excerpt" => "Un changement générationnel s’opère au ministère de l’Économie.",
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/u8EcpPoDDrlx4YQMkYq8kbWnP3k/0x0:1024x575/2656x1494/filters:format(avif):quality(50)/2025/09/29/000-76ya4g3-68da38ba1226f802666020.jpg"
    ],
    [
        "title" => 'Sébastien Lecornu annonce que Matignon n\'augmentera pas ses moyens de fonctionnement "dans un souci d\'exemplarité"',
        "excerpt" => "Pas d’augmentation des moyens pour Matignon afin de donner l’exemple.",
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/sjHKT0pyW7fXlUBCnrZCIcjjxtE/0x0:1433x806/2656x1494/filters:format(avif):quality(50)/2025/09/29/juliettemeadel-68da39280c368673310378.jpg"
    ],
    [
        "title" => 'Emmanuel Macron bat un nouveau record d\'impopularité, selon le baromètre d\'Odoxa',
        "excerpt" => "Le président de la République dégringole de 6 points par rapport à juin, pour atteindre 22% de popularité, le niveau le plus bas de ses deux mandats, selon l'institut de sondage.",
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/iLych_sPB7trZnMAt-Yf4yYDoVU/0x106:1024x682/2656x1494/filters:format(avif):quality(50)/2025/09/30/000-76nc8u3-68db974b3ba6f557246666.jpg"
    ],
     [
        "title" => 'Le RN ne censurera pas le gouvernement de Sébastien Lecornu si le budget contient des baisses d\'impôts et de dépenses, annonce Jean-Philippe Tanguy',
        "excerpt" => 'Le Rassemblement national souhaite "des baisses d\'impôts sur les classes moyennes et populaires, (...) sur ceux qui travaillent", a détaillé le député.',
        "url" => "#",
        "image" => "https://www.franceinfo.fr/pictures/VUhlwRteFtTWPtt4RpjTLfag_ds/0x53:1024x629/2656x1494/filters:format(avif):quality(50)/2025/09/30/075-pinto-sessiono250908-npsvy-68db8094d2ea0778272329.jpg"
    ]
];

// Render template
echo $twig->render('index.twig', [
    'base_url' => $baseUrl,
    'articles' => $articles
]);
