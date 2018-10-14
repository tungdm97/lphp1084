<?php
session_start();
// Them file autoload tu composer de khoi tao duong dan
include './vendor/autoload.php';
// Goi den class CustomRoutes o namespace Routes
use Routes\CustomRoutes;
//Goi den function initRoute trong class
CustomRoutes::initRoute();