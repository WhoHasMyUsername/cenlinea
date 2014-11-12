<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/register.inc.php';
 
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Cenlinea</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Animation styles-->
    <link href="css/animation.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <!--<script>
        $(window).load(function() {
    $("html, body").animate({ scrollTop: $(document).height() }, 7000);
    });
    </script>
    <script>
    $(document).ready(function() {
    $( "#myImg" ).mouseover(function(){
        $(this).attr("src", "images/map1stcourse.png");
    });

    $( "#myImg" ).mouseout(function(){
        $(this).attr("src", "images/map1stcourse.png");
    });
});
    </script>-->
    </head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

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
                        <a class="page-scroll"><img src="images/invite.png"/></a>
                    </li>
                    <li>
                    <?php if (login_check($mysqli) == true) : ?>
                    <!--<?php echo htmlentities($_SESSION['username']); ?>-->
                    </li>
            
                    <li>
                        <a href="includes/logout.php"><img src="images/logout.png"/></a>
                    </li>
                     <li>
                        <a href="../../profile.php" class="page-scroll"><img src="../../images/myprofile.png"/></a>
                    </li>
                    <?php else : ?>
                    <li>
                        <a id="modal_trigger" href="#modal" class="page-scroll"><img src="images/login.png"/></a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Intro Section -->
   <?php if (login_check($mysqli) == false) : ?>
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="images/logo.png"/> </br></br>
                     <a href="Games/Memory/index.php"><img src="images/Play-button.png"/></a>
                     </br></br>
                     <!--<div id="object">-->
                      <img src="images/umbrellaguy.png"/></br></br> 
                      <!--</div>-->                    
                        <!--<a class="page-scroll" href="#contact"><img src="images/how.png"/></a>-->                        
                                   
            </div>         
        </div>
    
    <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>
        
        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <div class="">
                    <a href="#" class="social_box fb">
                        <!--<span class="icon"><i class="fa fa-facebook"></i></span>-->
                        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
                        <span class="icon_title">Connect with Facebook</span>
                        
                    </a>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=851217828251291&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <!--<a href="#" class="social_box google">
                        <span class="icon"><i class="fa fa-google-plus"></i></span>
                        <span class="icon_title">Connect with Google</span>
                    </a>-->
                </div>

                <div class="centeredText">
                    <span>Or use your Email address</span>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                    <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                </div>
            </div>

            <!-- Username & Password Login form -->
            <div class="user_login">
                <form action="includes/process_login.php" method="post" name="login_form">
                    <label>Email</label>
                    <input type="text" name="email"/>
                    <br />

                    <label>Password</label>
                    <input type="password" name="password" 
                             id="password"/>
                    <br />

                    <!--<div class="checkbox">
                        <input id="remember" type="checkbox" />
                        <label for="remember">Remember me on this computer</label>
                    </div>-->

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                        <!--<div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>-->
                        <input type="button" class="btn btn_red"
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
                    </div>
                </form>

               <!-- <a href="#" class="forgot_password">Forgot password?</a>-->
            </div>

            <!-- Register Form -->
            <div class="user_register">
                <?php
                if (!empty($error_msg)) {
                echo $error_msg;
                }
                ?>
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
                    <label>Username</label>
                    <input type="text" name="username"
                    id="username"/>
                    <br />

                    <label>Email Address</label>
                    <input type="text" name="email" id="email" />
                    <br />

                    <label>Password</label>
                    <input type="password" name="password" 
                             id="password"/>
                    <br />
                    <label>Confirm password:</label>
                    <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" />
                    <br/>
                    <!--<div class="checkbox">
                        <input id="send_updates" type="checkbox" />
                        <label for="send_updates">Send me occasional email updates</label>
                    </div>-->

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                        <!--<div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>-->
                        <input type="button" class="btn btn_red" value="Register" 
                            onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
                    </div>
                </form>
            </div>
        </section>
    </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="tuxie">
                    <!--<p>You are currently logged <?php echo $logged ?>.</p>-->
                     <img src="images/mapnocourse.png" alt="" usemap="#Map" />
                                    <map name="Map" id="Map">
                                    <area alt="Juego de Memoria" title="Ir al juego de memoria" href="Games/Memory/" shape="poly" coords="533,458,553,457,566,476,556,497,532,497,523,479" />
                                    <area alt="Encuentra los objetos" title="Go To Conversation Game" href="Games/Speller/" shape="poly" coords="450,461,471,464,481,484,469,504,449,504,435,483" />
                                    <area alt="Deletrea" title="Deletrea" href="#" shape="poly" coords="360,465,379,464,392,480,384,503,365,505,348,489" />
                                    <area alt="Juego de Conversacion" title="Juego de Conversacion" href="#" shape="poly" coords="263,444,281,447,292,467,278,483,262,486,252,466" />
                                    <area alt="" title="" href="#" shape="poly" coords="288,381,307,388,314,409,297,427,280,422,271,402" />
                                    <area alt="" title="" href="#" shape="poly" coords="384,360,405,367,406,390,387,400,369,396,366,373" />
                                    <area alt="" title="" href="#" shape="poly" coords="453,337,471,333,492,348,485,368,465,373,450,362" />
                                    <area alt="" title="" href="#" shape="poly" coords="479,269,500,268,511,286,499,306,482,308,468,292" />
                                    <area alt="" title="" href="#" shape="poly" coords="370,235,396,233,407,255,395,273,375,275,361,256" />                                 
                                    </map>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- About Section -->
    <?php else : ?>
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="tuxie">
                    <!--<p>You are currently logged <?php echo $logged ?>.</p>-->
                     <img src="images/mapnocourse.png" alt="" usemap="#Map" />
                                    <map name="Map" id="Map">
                                    <area alt="Juego de Memoria" title="Ir al juego de memoria" href="Games/Memory/" shape="poly" coords="533,458,553,457,566,476,556,497,532,497,523,479" />
                                    <area alt="Ir al Juego de Deletreo" title="Go To Conversation Game" href="Games/Conversation/" shape="poly" coords="450,461,471,464,481,484,469,504,449,504,435,483" />
                                    <area alt="Encuentra los objetos" title="Encuentra los objetos" href="#" shape="poly" coords="360,465,379,464,392,480,384,503,365,505,348,489" />
                                    <area alt="Juego de Conversacion" title="Juego de Conversacion" href="#" shape="poly" coords="263,444,281,447,292,467,278,483,262,486,252,466" />
                                    <area alt="" title="" href="#" shape="poly" coords="288,381,307,388,314,409,297,427,280,422,271,402" />
                                    <area alt="" title="" href="#" shape="poly" coords="384,360,405,367,406,390,387,400,369,396,366,373" />
                                    <area alt="" title="" href="#" shape="poly" coords="453,337,471,333,492,348,485,368,465,373,450,362" />
                                    <area alt="" title="" href="#" shape="poly" coords="479,269,500,268,511,286,499,306,482,308,468,292" />
                                    <area alt="" title="" href="#" shape="poly" coords="370,235,396,233,407,255,395,273,375,275,361,256" />                                 
                                    </map>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php endif; ?>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <!-- leanModal-->
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!--login JavaScript functions-->
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 

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

<!--end-->

</body>

</html>
