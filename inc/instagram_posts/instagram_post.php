<?php
/* Instagram feed function to retrieve your instagram posts
*******************************************************************************/
function wpabsolute_instagram_feed($count = 9)
{
	// Access token required to connect to Instagram API and feed to work.
	// Retrieve yours here: https://www.instagram.com/developer/authentication/
	// Yeah its not very straightforward but once its done you dont need to do it again
	$access_token = '13281311925.3e7bf67.b0a61e8716104b88a927507ef54293ac'; // Add you Instagram API token here

	// Check if transient is not set, otherwise use our transient from database
	$feed = '';

	$url      = 'https://api.instagram.com/v1/users/self/media/recent/';
	$url	 .= '?count=' . $count . '&amp;access_token=' . $access_token;

	// Attempt to get access to the instagram API
	$response = wp_remote_get($url);
	// Decode the body of the response for use
	$body = json_decode($response['body']);

	// Did we got a valid response from Instagram?
	if ($response['response']['code'] == 200) {
		$feed = $body->data;

	} elseif ( $response['response']['code'] == 400 ) {
		echo '<b>' . $response['response']['message'] . ': </b>' . $body->meta->error_message;
	}

	return $feed;
}
