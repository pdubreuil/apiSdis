<?php

require_once 'function.php';

$app->get('/',function() {
    echo 'Bienvenue sur lapi sdis29';
});

$app->get('/pompier', function(){
    getPompier();
});

$app->get('/login', function(){
    getLogin();
});

$app->get('/bip', function() {
    getBIP();
});

$app->post('/bip', function() use($app) {
    $data = json_decode($app->request->getBody(), true);
    $matricule = $data['matricule'];
    $newbip = $data['newbip'];
    updateBIP($matricule, $newbip);
});