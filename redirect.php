<?php
require_once('TwitterAPIExchange.php');
//require_once('Abraham/TwitterOAuth/TwitterOAuth.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/

$settings = array(
'oauth_access_token' => "831766980-UjMaCsRPLMqL50ptgVt9lyKAUFOYd9liuhFOr1cI",
'oauth_access_token_secret' => "hurvM8AQpqyd5uBD4KokHksKSoBVD0Gpx6VFD67eHppxs",
'consumer_key' => "Bi1JsmKfVey3fkUg7DeVYHqYX",
'consumer_secret' => "9J0Htc3fYZa5rHnQgRBov8CdUvnNPX5sM0J92SMhHYcLRCRWJL"
);
$url = "https://api.twitter.com/1.1/statuses/home_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "ShardulShinde";}
if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") 
	{
		echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";
		exit();
	}
foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br /><hr />";
       
    }


    //------------------------------------------------------------------------
/*do{
	$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $OAuthToken, $OAuthSecret);
    $followers = $tweet->get('followers/list', array('screen_name' => 'my_screen_name', 'cursor' => $cursor));

    print_r($followers);

    if (isset($followers->error)) {
        echo $followers->next_cursor_str;
        break;
    }
    echo"<p>Followers list<p> <br/><hr />";

    foreach($followers->users as $users) {

        
        echo "id".$user[id]."<br />";
        echo "Username".$users[name]."<br />";
        echo "Screen Name".$user[screen_name]."<br /> <hr />";
         }

    


    $cursor = $followers->next_cursor_str;
 }while($cursor!=0);*/
?>

