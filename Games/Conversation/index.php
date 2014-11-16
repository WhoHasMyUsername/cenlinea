<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';
include_once '../../includes/register.inc.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="pragma" content="no-cache"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta charset="utf-8"/>

		<!-- Favicons -->
		<link rel="shortcut icon" href="html5contents/favicons/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="html5contents/favicons/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="html5contents/favicons/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="60x60" href="html5contents/favicons/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="html5contents/favicons/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="html5contents/favicons/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="html5contents/favicons/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="html5contents/favicons/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="html5contents/favicons/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="html5contents/favicons/apple-touch-icon-152x152.png" />

		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">

		<!--<link href="webcontents/css/stylesheet.css" rel="stylesheet" type="text/css">-->

		<title>Cenlinea Conversation</title>
		<!-- Bootstrap Core CSS -->
    	<link href="../../css/bootstrap.min.css" rel="stylesheet">

    	<!-- Custom CSS -->
    	<link href="../../css/scrolling-nav.css" rel="stylesheet">

    	<link href="../../css/animation.css" rel="stylesheet">
    	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		</head>

	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
		 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                 <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll"><img src="../../images/invite.png"/></a>
                    </li>
                    <li>
                    <?php if (login_check($mysqli) == true) : ?>
                    <!--<?php echo htmlentities($_SESSION['username']); ?>-->
                    </li>
            
                    <li>
                        <a href="../../includes/logout.php"><img src="../../images/logout.png"/></a>
                    </li>
                     <li>
                        <a href="../../profile.php" class="page-scroll"><img src="../../images/myprofile.png"/></a>
                    </li>
                    <li>
                        <a href="../../index.php" class="page-scroll"><img src="../../images/home-text.png"/></a>
                    </li>
                    <?php else : ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  
  <!--Game content section-->
  
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                    <div class="gm4html5_div_class" id="gm4html5_div_id">
                        <canvas id="canvas" width="960" height="540">
                            <p>Your browser doesn't support HTML5 canvas.</p>
                        </canvas>
                        
                        <!-- Display the loading bar image -->
                        <div class="loading_image_class" id="loading_image_div">
                            <img src='html5contents/loading_image.png'>
                        </div>

                        <!-- AD WALL, 320w x 480h -->
                        <div class="ad_wall_class" id="ad_wall_div">
                            <script type="text/javascript" src="http://ad.leadboltmobile.net/show_app_ad.js?  section_id=123456789"></script>
                        </div>

                        <!-- BANNER AD, 320w x 50h -->
                        <div class="ad_banner_class" id="ad_banner_div">
                            <script type="text/javascript" src="http://ad.leadboltmobile.net/show_app_ad.js?  section_id=987654321"></script>
                        </div>
                    </div>
            </div>  

            <!--login part-->
            

            <!--login part-->

        </div>                                    
    </section>
                   
<!-- Run the game code : You have to change this with every new game -->
        <script type="text/javascript" src="html5contents/Conversation.js?KORYB=189668014"></script>

            <!-- jQuery Version 1.11.0 -->
            <script src="../../js/jquery-1.11.0.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../../js/bootstrap.min.js"></script>

            <!-- Scrolling Nav JavaScript -->
            <script src="../../js/jquery.easing.min.js"></script>
            <script src="../../js/scrolling-nav.js"></script>

            <!-- leanModal-->
            <script type="text/javascript" src="../../js/jquery.leanModal.min.js"></script>
            <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
            <link type="text/css" rel="stylesheet" href="../../css/style.css" />

            <!--login JavaScript functions-->
            <script type="text/JavaScript" src="../../js/sha512.js"></script> 
            <script type="text/JavaScript" src="../../js/forms.js"></script>

            <script type="text/javascript">
                $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

                $(function(){
                    // Calling Login Form
                    $("#login_form").click(function(){
                        $(".social_login").hide();
                        $(".user_login").show();
                        return false;
                    });

                    // Calling Register Form
                    $("#register_form").click(function(){
                        $(".social_login").hide();
                        $(".user_register").show();
                        $(".header_title").text('Register');
                        return false;
                    });

                    // Going back to Social Forms
                    $(".back_btn").click(function(){
                        $(".user_login").hide();
                        $(".user_register").hide();
                        $(".social_login").show();
                        $(".header_title").text('Login');
                        return false;
                    });

                })
            </script>

            <!--facebook -->
            <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '851217828251291',
                  xfbml      : true,
                  version    : 'v2.1'
                });
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
            </script>
		
                
	</body>
</html>