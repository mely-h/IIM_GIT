

<?php 
session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
    Register
===============================*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Vérification de la disponibilité de l'username et de l'email
        if (isUsernameAvailable($db, $username)) {
            if (isEmailAvailable($db, $email)) {
                
                
                // Appel de la fonction d'inscription
                if(userRegistration($db, $username, $email, $password)) {
					
					
                    
                } else {
                    $error = "Erreur lors de l'inscription. Veuillez réessayer.";
                }
            } else {
                $error= "Email indisponible";
            }
        } else {
            $error = "Username indisponible";
        }
    } else {
        $error = "Tous les champs sont obligatoires!";
    }
}

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';