<?php

class InstagramAPI {

    // Supply a user id and an access token
    private $locationid;
    private $userid;
    private $accessToken;

    public function __construct($locationid, $userid, $accessToken) {
        $this->locationid = $locationid;
        $this->userid = $userid;
        $this->accessToken = $accessToken;
    }


    
    public function getRecentPhotos () {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/v1/tags/coffee/media/recent?access_token={$this->accessToken}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        $result = curl_exec($ch);
        curl_close($ch); 

        return $result = json_decode($result);    
    }
 
}
