<?php

session_start();
$_SESSION['name_personnage'] = $_POST['param1'];
$req = $_POST["param1"];
echo $_POST["param1"];