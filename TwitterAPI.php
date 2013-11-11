<?php include "libray/twitteroauth.php"; ?>

<?php

    $consumer = "KKjNadurlA8eL4NCCQtzA";
    $consumersecret = "Y7dzU4GtoZ7OEc3jnWIhNJLmc6thzqRwa4ZdWmqUU";
    $acesstoken = "126322244-1K8XmklIJnGdVZMqEO9c7Is9VFOttd5y5cSpr5BJ";
    $acesstokensecret = "U6rzqyFGxYdXcC6bsC5Z7XC9plWKfe9cqSWvGX3d7lWZd";
    
    $twitter = new TwitterOAuth($consumer, 
    $consumersecret, $acesstoken, $acesstokensecret);

?>
