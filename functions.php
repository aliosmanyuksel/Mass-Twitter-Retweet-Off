<?php

//All rights reserved by Ali Osman Yuksel
//Twitter - @KutsalMidye
//Instagram - @aliosmanyuksel
//http://tutkal.me

  function aliOS($panpa)
  {
	global $twitterObj;
	
	//This is very important. True or false. -> 'retweets' => 'false'
	//https://dev.twitter.com/rest/reference/post/friendships/update
    $apdeyt = $twitterObj->post('/friendships/update.json', array('user_id' => $panpa, 'retweets' => 'false'));
 }
  
  function getFriends($screen_name) //It's to get your following ids.
{
    global $twitterObj;

    $friendList = array();
    $cursor = -1;

    do {
        $friends = $twitterObj->get('/friends/ids.json', array('count' => 5000, 'screen_name' => $screen_name, 'cursor' => $cursor));
        $cursor = $friends->response['next_cursor_str'];

        if(is_array($friends->response['ids'])){
            foreach($friends->response['ids'] as $ids){
				aliOS("$ids");
            }
        }

        if(is_null($cursor)){
            $cursor = 0;
        }

    }while($cursor != 0);

    return $friendList;
}
