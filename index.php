<?php
/* File: index.php
 * Project: createCaptcha 
 * Description: Displays a form which shows a generated captcha image from create-captcha.php
 *              The user can input the captcha with a text input
 *              If the input is correct, the user will be sent to the page protected.php
 *              
 * Author: D.RS
 * Project link: https://github.com/SoftIcePink/create-captcha
 */

    // Require the file which contains all the createCaptcha method
    require_once('create-captcha.php');
    
    // Start the session
    session_start();

    // User attempts to get authentified
    if(isset($_POST['captcha'])){
        // Simple filter to get the input
        $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_STRING);
        // Check if the captcha entered and the one stored are identical
        // Small problem : Some font given only have uppercase forms for their letters
        // So.. Although it can be an 'a', it will appear as an 'A' on the image.
        // I've decided to put both strings to uppercases and compare the results
        if(strtoupper($_SESSION['captchaString']) == strtoupper($captcha)){
            header('Location: protected.php');
            exit;
        }
        else{
            $wrong = true;
            createCatpcha();
        }
    }
    else{
        createCatpcha();
    }
?>
<html>
    <head>
        <title>create-captcha</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/xAi0dkk.png">
        <!-- Bootstrap (css, js), AJAX, jQuery-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>        
    </head>
    <style>
        html{
            height:100%;
            width:100%;
        }
    </style>
    <body class="bg-dark d-flex justify-content-center align-items-center" style="width:100%; height:100%;">
   
            <form class="card bg-secondary border-light" method="POST" action="#">
                <div class="card-header">
                    <h5 class="text-white">create-captcha</h5>
                    <?php //Alert message in case the user is wrong ?>
                    <?= (isset($wrong))?"<p class='text-danger'>Sorry, try again</p>":"" ?>
                    <i>Check out the code on</i>
                    <a class="text-white" href="https://github.com/SoftIcePink/create-captcha">GitHub</a>
                </div>
                <img src="captcha.png" class="d-block card-img-top"></img>
                <div class="form-group text-white card-body  ">                
                    <label for="captcha-input" >Captcha</label>
                    <input type="text" id="captcha-input" name="captcha" class="form-control" required>
                    
                <button type="submit" class="btn btn-light">Submit</button>
                </div>
            </form>
    
    </body>
</html>
