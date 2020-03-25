<?php

session_start();
if(isset($_POST['param1']) {
    $_SESSION['name_personnage'] = $_POST['param1'];
    $req = $_POST["param1"];
}

if(isset($_POST['delete'])) {
    $_SESSION['delete'] = $_POST['delete'];
}