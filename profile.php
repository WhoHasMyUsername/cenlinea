<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
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

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php if (login_check($mysqli) == true) : ?>
     <p>Welcome to Cenlinea<?php echo htmlentities($_SESSION['username']); ?>!</p>
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
                    <!--<li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>-->               
                        <li>
                        <a href="includes/logout.php"><img src="images/logout.png"/></a>
                        </li> 
                        <li>
                        <a href="index.php"><img src="images/home-text.png"/></a>
                        </li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Profile Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <table class="table borderless">
                        <thead>
                            <tr>
                            <td align="left">
                                <img src="images/profilepic.png"  width="" height=""/></br></br>
                                
                            </td>
                            <td align="left">
                            </td>
                           </tr>
                                
                        </table> 
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <!--<img src="images/mapnocourse.png" id="myImg" onclick="document.location.href='Games/Memory/index.php'"/>-->
                                <img src="images/mapnocourse.png" alt="" usemap="#Map" />
                                    <map name="Map" id="Map">
                                    <area alt="Juego de Memoria" title="Ir al juego de memoria" href="Games/Memory/" shape="poly" coords="533,458,553,457,566,476,556,497,532,497,523,479" />
                                    <area alt="Ir al Juego de Deletreo" title="Go To Conversation Game" href="Games/Speller/" shape="poly" coords="450,461,471,464,481,484,469,504,449,504,435,483" />
                                    <area alt="Encuentra los objetos" title="Encuentra los objetos" href="Games/Object Finder/" shape="poly" coords="360,465,379,464,392,480,384,503,365,505,348,489" />
                                    <area alt="Juego de Conversacion" title="Juego de Conversacion" href="Games/Conversation/" shape="poly" coords="263,444,281,447,292,467,278,483,262,486,252,466" />
                                    <area alt="" title="" href="#" shape="poly" coords="288,381,307,388,314,409,297,427,280,422,271,402" />
                                    <area alt="" title="" href="#" shape="poly" coords="384,360,405,367,406,390,387,400,369,396,366,373" />
                                    <area alt="" title="" href="#" shape="poly" coords="453,337,471,333,492,348,485,368,465,373,450,362" />
                                    <area alt="" title="" href="#" shape="poly" coords="479,269,500,268,511,286,499,306,482,308,468,292" />
                                    <area alt="" title="" href="#" shape="poly" coords="370,235,396,233,407,255,395,273,375,275,361,256" />                                   
                                    </map>
                            </td>
                            
                            </tr>
                        </tbody>                                           
                    </div>
            </div>
        </div>
    </section>

  <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
            </p>
        <?php endif; ?>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
