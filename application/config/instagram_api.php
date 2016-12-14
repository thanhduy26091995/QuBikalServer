<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'Qubikal';//Your App Name
$config['instagram_client_id']		= 'd80c35d2c9614d078afc0b690cb39553';//Your Client ID
$config['instagram_client_secret']	= '0254c77f6fc440dd9e202323c8337bf2';//Your Secret Key
$config['instagram_callback_url']	= 'http://demosource.esy.es/index.php/home/loginresult';//e.g. http://yourwebsite.com/authorize/get_code/
$config['instagram_website']		= 'http://demosource.esy.es/';//e.g. http://yourwebsite.com/
$config['instagram_description']	= 'Qubikal';//Your App Description
//access_token: 1797177647.d80c35d.62a748b136ce40b990be12daaf4f0dbd
/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = 'basic+likes';
$config['instagram_token'] = '1797177647.d80c35d.62a748b136ce40b990be12daaf4f0dbd';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 

$config['instagram_ssl_verify']		= TRUE;
