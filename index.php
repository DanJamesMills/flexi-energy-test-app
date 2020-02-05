<?php

session_start();

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';

/*************************************/
/******** CHANGE THESE VALUES ********/
/*************************************/

// Your Flexi Orb Application Keys
$clientID = '*********'; // Example 209345
$clientSecret = '***********************'; // Example IJxUFRhdH5urkFG7Gdefd0qUH4deeqbX1F1TtGZ1R
$redirectUri = 'http://localhost:8000/'; // Example http://localhost:8000/ Must Match Redirect URL When Registering Your App (Client)

// Build Login Url
$query = http_build_query([
    'client_id' => $clientID,
    'redirect_uri' => $redirectUri,
    'response_type' => 'code',
    'scope' => '',
]);

// If authorization was successful and redirected back
if(isset($_GET['code']))
{
    $http = new GuzzleHttp\Client;

    // Convert Authorisation Code To Access Tokens
    $response = $http->post('https://login.flexi-orb.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => $clientID,
            'client_secret' => $clientSecret,
            'redirect_uri' => $redirectUri,
            'code' => $_GET['code'],
        ],
    ]);
    
    // Save access_token & refresh_token in DB etc...
    print_r(json_decode((string) $response->getBody(), true));

}else{

    header('Location: https://login.flexi-orb.com/oauth/authorize?'.$query);

}

?>