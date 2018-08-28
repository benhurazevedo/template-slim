<?php
// DIC configuration
$container = $app->getContainer();

// View
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig("views", array('cache' => 'cache/twig', 'debug' => true));
    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    #$view->addExtension(new Bookshelf\TwigExtension($c['flash']));
    return $view;
};

// db service
$container['dbTesteService'] = function ($c) {  
	$dbServiceConn = new dbService\ConectorDAO($c['settings']['DSN'], $c['settings']['DATABASE_USER'], $c['settings']['DB_PASSWORD']);
    $dbTesteService = new dbService\TesteDAO($dbServiceConn->getConn());
    
    return $dbTesteService;
};

// controller
$container['controllers\TesteController'] = function ($c) {
    return new controllers\TesteController( $c['view'], $c['router'], $c['dbTesteService']);
};