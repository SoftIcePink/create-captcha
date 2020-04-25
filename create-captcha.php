<?php

/* File: create-captcha.php
 * Project: createCaptcha 
 * Description: Returns data of a bitmap image (PNG or JPG)
 *              Contains random text with 10 chars. 
 *              Texte of the image must be stored in the user's session.
 * Author: D.RS
 * Project link: https://github.com/SoftIcePink/create-captcha
 */     


/**
 * This function generates an image PNG which is used as a captcha.
 */
function createCaptcha(){    
    // Random string generation
    $word = generateRandomCaptchaWord();
    
    // Search for font files in the directory
    $FONT_TYPE = 'application/font-sfnt';
    $path = "fonts/";
    $fontDirectory = array_diff(scandir($path), array('..','.'));
    $fontFiles =[];
    
    foreach($fontDirectory as $fontFamily){
        if(mime_content_type($path.$fontFamily) == $FONT_TYPE){
            array_push($fontFiles, $path.$fontFamily);
        }
    }
    // Image size
    $x = 250; 
    $y = 150; 


    // Generate the image
    $image = imagecreatetruecolor($x,$y);
    
    // ADDING THE CONTENT TO THE IMAGE
    // Generate random colors for our next step (creating form, adding background color, etc.) 
    $lineColor = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));         
    $backgroundColor = imagecolorallocate($image, 255, 255, 255);  
    

    // Fill the $image with a rectangle (that goes from (0,0) to ($x,$y)) with $background_color colour.
    imagefilledrectangle($image,0,0,$x,$y,$backgroundColor);

    // This loop creates the lines
    for($i=0;$i<3;$i++) {
        // The lines will go from coordinates (10, random y coordinate) to ($x-10, random y coordinate) 
        // and will have the color that's been generated earliers
        // The random number uses $y as the upper limit and 0 as the lower limite
        imageline($image,10,rand(0,$y),$x-10,rand(0,$y),$lineColor);
    }


    // This loop adds the letters to the image
    for ($i = 0; $i < 10;$i++) {
        
        // The variables names are self-explanatory 
        $letter = $word[$i];
        $fontSize = rand(10,20);
        $textColor = imagecolorallocate($image, rand(0,200), rand(0, 200), rand(0,200));
        $margin = 10;
        $positionX = $margin + ($i*25);
        $positionY =rand(($y/3), $y-10); 
        $angle = rand(0,60);


        // Choose the fonts added or default fonts if no files were found
        if(empty($fontFiles))
            imagestring($image, $fontSize, $positionX, $positionY, $letter, $textColor);
        else{
            // Get random font-family based on array of font
            $fontFamilyUsed = $fontFiles[rand(0, count($fontFiles) -1)];  

            // Had some trouble using this function
            // Problems for the font parameter  (Even with GDPATH defined, these didn't work):
            // "fonts/arial.ttf" | "../fonts/arial.ttf" | "./fonts/arial.ttf" => Could not find/open font 
            // "arial.ttf" | "arial" => invalid font filename
            // Solution : https://bugs.php.net/bug.php?id=75656
            imagettftext($image, $fontSize,$angle, $positionX, $positionY, $textColor, realpath($fontFamilyUsed), $letter);
        }
    }

    // Store the captcha string in a session variable
    $_SESSION['captchaString'] = $word;

    // Generate the final image as a png image
    imagepng($image, "captcha.png"); 

    // Delete the image to lower ressources
    imagedestroy($image);
}

function generateRandomCaptchaWord() {
    $str = bin2hex(openssl_random_pseudo_bytes(10));
    return strtoupper(substr(base_convert($str, 16, 35), 0, 10));
}
?>
