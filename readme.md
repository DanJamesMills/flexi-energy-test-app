# Overview
Version 1.0 of the API enables Companies to be able to manipulate installations from other applications. Version 1.0 has the supported endpoints to allow a Company to register an installation on to the Flexi-Orb portal. [See Flexi-Orb Api Documentation](https://documenter.getpostman.com/view/6382832/S1EH53Ck?version=latest)

# Getting Started - Sample App

This sample app has been written in PHP. The app shows you how to build a login link that will redirect a user to Flexi-Orb's server. At this point, they will then either approve or deny the request to issue an access token to you the Client. Once you have an access_token you can make requests to any of the protected api endpoints listed in the [Flexi-Orb Api Documentation](https://documenter.getpostman.com/view/6382832/S1EH53Ck?version=latest) on an application's own behalf, without a user context.
### Installation

You will first be required to log into to your Flexi-Orb account and register your App (Client)

```
http://login.flexi-orb.com/developer/apps
```

Clone a copy of the sample app to your local machine.

```sh
git clone https://github.com/libgit2/libgit2
cd flexi-energy-test-app
```

Then install app dependencies using composer.

```sh
composer installation
```

Once you have registered your App (Client), you will be provided with "Client ID" & "Secret", you will need to open index.php file and change.

```
nano index.php
// Your Flexi Orb Application Keys
$clientID = '******'; // Example 209345
$clientSecret = '******'; // Example IJxUFRhdH5urkFG7Gdefd0qUHAj3qbX1F1TtGZ1R
$redirectUri = 'http://localhost:8000/'; // Example http://localhost:8000/ Must Match Redirect URL When Registering Your App (Client)
```

Start-up a local php server.

```sh
php -S localhost:8000
```

### Approving The Request

Vist index.php in your  browser. When Flexi-Orb receive an authorisation request, Flexi-Orb will automatically display a page to the user allowing them to approve or deny the authorisation request, if they are not logged into the Flexi-Orb portal they will be prompted to do so. If they approve the request, they will be redirected back to the redirect_uri that was specified by the consuming application. The redirect_uri must match the redirect URL that was specified when the client was created


### Converting Authorisation Codes To Access Tokens

If the user approves the authorisation request, they will be redirected back to the consuming application. The consumer should first verify the state parameter against the value that was stored prior to the redirect. If the state parameter matches, the consumer should issue a POST request to Flexi-Orb's https://login.flexi-orb.com/oauth/token endpoint to request an access token. The request should include the authorisation code that was issued by https://login.flexi-orb.com/oauth/authorize endpoint when the user approved the authorisation request. In this example, we'll use the Guzzle HTTP library to make the POST request:

### Submit Feedback

We know the best future version of our API will come from creating it together and your ideas matter! Help us develop the next generation of the Flexi-Orb API by sending your feedback to (info@flexi-orb.co.uk).