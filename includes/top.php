<?php session_start(); ?>
<!--
/**
* Copyright 2017 IBM Corp. All Rights Reserved.
*
* Licensed under the Apache License, Version 2.0 (the “License”);
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* https://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an “AS IS” BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notaker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"
      type="image/png"
      href="images/mediumLogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <?php
	require("includes/constant.php");
	try{
		$db = new PDO("mysql:host=" . DBHOST . ";dbname=". DBNAME,DBUSER,DBPASS);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
  ?>
</head>
<body>
