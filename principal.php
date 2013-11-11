<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="jquery.fancybox-1.3.4.css" type="text/css">
	<script type='text/javascript' src='jquery.min.js'></script>
	<script type='text/javascript' src='jquery.fancybox-1.3.4.pack.js'></script>
	<script type="text/javascript">
		$(function() {
			$("a.group").fancybox({
				'nextEffect'	:	'fade',
				'prevEffect'	:	'fade',
				'overlayOpacity' :  0.8,
				'overlayColor' : '#000000',
				'arrows' : false,
			});			
		});
	</script>

	<h1>Cloud Project</h1>

	<?php
        
            include_once 'InstagramAPI.php';
        
		// Supply a user id and an access token
		$locationid  =  "450867";
		$userid      =  "cbdb75bc1aa241eeadc88e9f57bf7e79";
		$accessToken =  "175023443.5b9e1e6.eefc96957f204e6ba40ef1c2781cacbd";

	        $InstagramAPI = new InstagramAPI($locationid,$userid, $accessToken);
                $result = $InstagramAPI -> getRecentPhotos();
        ?>


	<?php foreach ($result->data as $post): ?>
		
		<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a>
	<?php endforeach ?>
</html>