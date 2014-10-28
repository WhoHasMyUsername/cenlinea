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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Profile Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <table class="table borderless">
                        <thead>
                            <tr>
                            <td align="left">
                                <img src="images/profilepic.png"/></br></br>
                                <img src="images/createlesson.png"/>
                            </td>
                            <td align="left">
                                <img src="images/mylessons.png"/>

                            </td>
                           </tr>
                                
                        </table> 
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <a href="Demo.html"><img src="images/firstHexReplay.png"/></a>
                            </td>
                             <td>
                                <img src="images/2ndHexDemo.png"/>
                            </td>
                            
                            <td>
                                <img src="images/3rdHexGreetings.png"/>
                            </td>
                            <td>
                                <img src="images/4thHexMeeting.png"/>
                            </td>
                             <td>
                                <img src="images/5thHexNumbers.png"/>
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
