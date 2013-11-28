<?php
include_once 'InstagramAPI.php';
include_once 'TwitterAPI.php';

if (($trends= apc_fetch('trends')) == FALSE) {
    $trends = getIrelandTrends();
    apc_add('trends', $trends, 60);
    var_dump('carregando da api');
} //else {
//    var_dump('carregando do cache');
//}



// Supply a user id and an access token
$locationid = "450867";
$userid = "cbdb75bc1aa241eeadc88e9f57bf7e79";
$accessToken = "175023443.5b9e1e6.eefc96957f204e6ba40ef1c2781cacbd";

$InstagramAPI = new InstagramAPI($locationid, $userid, $accessToken);
$tag = isset($_GET['tag']) ? $_GET['tag'] : 'coffe';
$result = $InstagramAPI->getRecentPhotos(urldecode($tag));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title> Twitter + Instagram </title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/offcanvas.css" rel="stylesheet">
        <link href="assets/css/gallery.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style>
            body {

            }
        </style>
    </head>

    <body>
        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Cloud Project</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </div><!-- /.navbar -->

        <div class="container">

            <div class="row row-offcanvas row-offcanvas-right">


                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> 
                    <div class="jumbotron">  
                    <img src= "images/1384146449_social_8.png" width="150px" height="150px">
                    </div>
                    <br>
                    <br>
                    <?php foreach ($trends as $topic): ?>
                        <a href="?tag=<?php echo ($topic['name']) ?>" class="list-group-item"><?php echo str_replace("#", "", $topic['name']) ?></a>
                    <?php endforeach; ?>

                </div>



                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>
                    <div class="jumbotron" align="center">
                         <img src= "images/1384146475_social_6.png" alt="Instagram" width="150px" height="150px"  >    
                        <h1>Hello, Ireland!</h1>
                        <p> <i> Select the TrendTopic to see Instagram's gallery </i> </p>
                                   
                                    
                               </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                                 
                                         <?php if (empty($result->data)): ?>

                                                <p> No photos available </p>
                                            <?php else: ?>
                                                <?php foreach ($result->data as $post): ?>
                                                    <a class="group hovergallery"  rel="group1" href="<?= $post->images->standard_resolution->url ?>">
                                                        <img src="<?= $post->images->thumbnail->url ?>">
                                                    </a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>


                                    </div><!--/.container-->




                                    <footer>
                                        <p>&copy; Fernanda 2013</p>
                                    </footer>

                                    </div><!--/.container-->


                                   
                                    <!-- Placed at the end of the document so the pages load faster -->
                                    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                                    <script src="assets/js/bootstrap.min.js"></script>
                                    <script src="assets/js/offcanvas.js"></script>
                                    </body>
                                    </html>
