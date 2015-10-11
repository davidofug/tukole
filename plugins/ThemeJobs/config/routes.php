<?php
use Cake\Routing\Router;

Router::plugin('ThemeJobs', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
