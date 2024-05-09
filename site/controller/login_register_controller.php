<?php 
session_start();
require_once('../model/account_manager_model.php');
require_once('../model/db_config.php');

if ( isset($_POST["login-register"]))
{
    $user_name =  $_POST["input_user"];
    $password = $_POST["input_pass"];
    $email = $_POST["input_email"];
    $phoneNumber = $_POST["input_phonenumber"];

    $account_manager_model = new account_manager_model();
    

}

?>