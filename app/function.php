<?php

function getDataBase() {
    return new PDO('mysql:host=127.0.0.1; dbname=ppe sdis_29','root','');
}

function getPompier() {
    $PDO = getDataBase();
    $statement = $PDO->prepare('SELECT sp_matricule, sp_nom, sp_prenom, cis_nom FROM pompier, caserne where pompier.cis_id = caserne.CIS_ID limit 50');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function getLogin() {
    $PDO = getDataBase();
    $statement = $PDO->prepare('SELECT * FROM login');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function getBIP() {
    $PDO = getDataBase();
    $statement = $PDO->prepare('SELECT SP_BIP FROM pompier limit 50');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function updateBIP($matricule, $newbip) {
    $PDO = getDataBase();
    $statement = $PDO->prepare('UPDATE pompier SET sp_bip = ? where SP_MATRICULE = ?');
    $statement->execute([$newbip, $matricule]);
    If ($statement->rowCount() == 0){
        echo json_encode(['code'=>101, 'message'=>'aucune modification']);
    }else {
        echo json_encode(['code'=>202, 'message'=>'bip modifie']);
    }

}