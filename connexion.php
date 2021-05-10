<?php

//variables

$PARAM_hote = 'localhost';
$PARAM_port = '3306';
$PARAM_nom_bd = "blog";
$PARAM_utilisateurs = "root";
$PARAM_mot_passe = "";
$PARAM_dsn = "mysql:host=$PARAM_hote; port=$PARAM_port; dbname=$PARAM_nom_bd; charset=utf8";


// connection BDD

$connexion = new PDO($PARAM_dsn, $PARAM_utilisateurs, $PARAM_mot_passe);

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
