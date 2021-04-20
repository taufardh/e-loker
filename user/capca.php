<?php

/* Author: Joshua Herbison of Idea Pro LLC, IdeaPro.com */
/* The code below is only for an example and testing purposes.*/
/* With API keys, this is a fully functional and working form, but it does not send the information
    anywhere. This code is "Use at your own risk". Idea Pro LLC and/or Joshua Herbison is not responsible
    for any developer's misuse of any code we provide in Tutorials. By using this code you agree to those terms.*/ 

$public_key = "6Lec2vAUAAAAANALTewxuPInF1Ig3zkuyQwCWbls"; /* Your reCaptcha public key */
$private_key = "6Lec2vAUAAAAAI6SipAebT8xjAq6x7c0Qj75E9aF"; /* Enter your reCaptcha private key */
$url = "https://www.google.com/recaptcha/api/siteverify"; /* Default end-point, please verify this before using it */

/* Check if the form has been submitted */
if(array_key_exists('submit_form',$_POST))
{
    /* The response given by the form being submitted */
    $response_key = $_POST&#91;'g-recaptcha-response'];
    /* Send the data to the API for a response */
    $response = file_get_contents($url.'?secret='.$private_key.'&amp;response='.$response_key.'&amp;remoteip='.$_SERVER['REMOTE_ADDR']);
    /* json decode the response to an object */
    $response = json_decode($response);

    /* if success */
    if($response->success == 1)
    {
        echo "You passed validation!";
    }
    else
    {
        echo "You are a robot and we don't like robots.";
    }
}

?>
&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;title>Google reCaptchaV2 | Kursus Web YELLOWWEB&lt;/title>
&lt;/head>
&lt;body>


&lt;form method="post" action="">
&lt;input type="text" name="your_name" placeholder="Your Name" />&lt;br />&lt;br />
&lt;input type="text" name="email" placeholder="Your Email Address" />&lt;br />&lt;br />
&lt;div class="g-recaptcha" data-sitekey="&lt;?php print $public_key; ?>">&lt;/div>
&lt;input type="submit" name="submit_form" value="Submit Your Information" />
&lt;/form>	
&lt;script src='https://www.google.com/recaptcha/api.js'>&lt;/script>

&lt;/body>
&lt;/html>