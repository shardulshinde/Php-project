<?php
    require('Abraham/TwitterOAuth/TwitterOAuth.php');
    //define('oauth_token','831766980-UjMaCsRPLMqL50ptgVt9lyKAUFOYd9liuhFOr1cI');
   // define('oauth_token_secret','hurvM8AQpqyd5uBD4KokHksKSoBVD0Gpx6VFD67eHppxs');

session_start();

// The TwitterOAuth instance
$twitteroauth = new TwitterOAuth('Bi1JsmKfVey3fkUg7DeVYHqYX', '9J0Htc3fYZa5rHnQgRBov8CdUvnNPX5sM0J92SMhHYcLRCRWJL');
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://test-rt.com/myredirect.php');
 
// Saving them into the session
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
 
// If everything goes well..
if($twitteroauth->http_code==200){
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}

 ?>
