<?php
require_once('rest.php');

/**
 * PHP Venture search example for VC4Africa RESTful API
 * @author Ebot Tabi <ebot.tabi@gmail.com>
 * @link https://dev.vc4africa.biz/
 */

// Using VC4Africa API's
$client = new Rest('http://api.frapi', 'digest', 'ebottabi', 'cd91007e366c4d0f1a2e82f0a099bb6711b526a4'); 

//A sample venture's id
 $venture_id="22";


if( strstr( $_SERVER['REQUEST_URI'], "ventures" ) ){
		
		$s_list = $client->get('/v1/ventures.json');
		//echo $s_list;
		echo "<pre>";
		print_r(json_decode($s_list));
		echo "</pre>";
	}

if( strstr( $_SERVER['REQUEST_URI'], "single_venture" ) ){
		
		$s_list = $client->get('/v1/venture/'.$venture_id.'.json');
		//echo $s_list;
		echo "<pre>";
		print_r(json_decode($s_list));
		echo "</pre>";
	}

if( strstr( $_SERVER['REQUEST_URI'], "venture_team" ) ){
		
		$s_list = $client->get('/v1/venture/'.$venture_id.'/team.json');
		//echo $s_list;
		echo "<pre>";
		print_r(json_decode($s_list));
		echo "</pre>";
	}

if( strstr( $_SERVER['REQUEST_URI'], "venture_activity" ) ){
		
		$s_list = $client->get('/v1/venture/'.$venture_id.'/activity.json');
		//echo $s_list;
		echo "<pre>";
		print_r(json_decode($s_list));
		echo "</pre>";
	}


if( strstr( $_SERVER['REQUEST_URI'], "venture_search" ) ){
		
		$s_list = $client->get('/v1/venture/search.json', array('name'=>'Amazing'));
		$results = json_decode($s_list,1);
		//var_dump($results);
		foreach ($results['ventures'] as $key => $value) {
		   echo "<br>";
		   echo "Venture Id: {$value['id']} <br>";
		   echo "Venture Name:  {$value['title']}<br>";
		   echo "Venture Owner:  {$value['owner']}<br>";
		   echo "Venture Sector:  {$value['sector']}<br>";
		   echo "Venture Tags:  {$value['tags']}<br>";
		   echo "Venture Country:  {$value['country']}<br>";
		   echo "Venture Coordinate Lat:  {$value['latitude']}<br>";
		   echo "Venture Coordinate Lng:  {$value['longitude']}<br>";
		}
		
		
	}

?>
