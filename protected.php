<?php

/* File: protected.php
 * Project: createCaptcha 
 * Description: Displays a return button that sends the user to index.php
 *              
 * Author: D.RS
 * Project link: https://github.com/SoftIcePink/create-captcha
 */
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
        iframe{
        
        }
    </style>
    <body class="bg-dark d-flex flex-column justify-content-center align-items-center" style="width:100%; height:100%;">              
        <h1 class="text-white">Congrats ! You're not a robot !</h1>
        <iframe width="400" height="300" autoplay src="https://www.youtube.com/embed/3WAOxKOmR90" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>Return</iframe>        
            <a href="index.php"class="btn btn-light">Return</button>                
    </body>
</html>
