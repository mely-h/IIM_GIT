<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']))
	 {

      
        $email = $_POST['email'];
        $password = $_POST['password'];

       
        if (userConnection($db, $email, $password)) {
          
            header('Location: dashboard.php');
        } else {
           
            $error = 'Mauvais identifiants';
        }

    } 
}


/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';