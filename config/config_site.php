<?php
/////////////////////////////////
// Developpeur:Evan Suire      //
// Discord:Evan P#9584         //
/////////////////////////////////
$version = "v0.1";
$version_display = "v0.1";
$blocked = false;
$domaine = "domaine.fr";
///////////////////////
// Database-Config   //
///////////////////////
// || DataBase ||
$fmdb = "pari";
$dbuser = "";
$dbpass = "";
//////////////////////////////
// DataBase PDO Connect     //
//////////////////////////////
$bdd = new PDO("mysql:host=localhost;dbname=$fmdb;charset=utf8",$dbuser,$dbpass);
////////////////
// Session    //
////////////////
session_start();
ni