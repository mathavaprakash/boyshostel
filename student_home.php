<!DOCTYPE HTML>
<html>
	<head>
		<title>Boys Hostel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="gri,boys hostel,mathavaprakash,gandhigram,dindigul,gandhigram university,ruraluniv.ac.in" />
		<!-- css links -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="css/slider.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="css/facultystyle.css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
		<!-- /css links -->
		<!-- Js for modal -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Js for modal -->
		 <link href='//fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
		 <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		 <link href='//fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
		<script src="js/SmoothScroll.min.js"></script>
		<script type="text/javascript" src="js/modernizr.custom.js"></script> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="css/style.css" />
               <?php
                session_start();
				include_once "dbconnect.php";
                    if($_SESSION['encregno'])
                    {
                        
                    }
                    else
                    {
                        header("location:logout.php");
                    }        
                   
                    $user_id=encryptor('decrypt',$_SESSION['encregno']); 
            $query=  mysql_query("select * from student_details");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_email="";
            
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['reg_no'];
                    $table_pwd=$row['password'];
                    if($user_id==$table_userid)
                    {
						
                        $temp=1;
                        $table_fname=$row['fname'];
                        
                        $table_email=$row['email'];
                       
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
                     header("location:logout.php");
                }
            }
                ?>
	</head>
	<body  class="landing">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a class="navbar-brand" href="logout.php">GRI-Boys Hostel</a>
					<nav id="nav">
						<ul>
							<li><a href="student_home.php">Home</a></li>
							<li><a href="bill.php">Mess Bill</a></li>
							<li><a href="student_profile_view.php">View Profile</a></li>
							<li><a href="#" class="icon fa-angle-down"><?php  print "$table_fname"; ?></a></li>
                            <li><a href="logout.php" class="button">Log out</a></li>
						</ul>
					</nav>
				</header>
			</div>
			<section id="banner-empty">
					
				</section>
			<!-- Main -->
				<section id="main" class="container">
                        
					<div class="row">
						<div class="12u">
							<section class="box alt">
							<div class="row no-collapse 50% uniform">
								<div class="4u"><span class="image fit"><a href="student_profile_view.php"><img src="images1/view-profile.jpg" alt="student profile" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="bill.php"><img src="images1/mess-bill.jpg" alt="Mess bill" /></a></span></div>
								<div class="4u"><span class="image fit"><a href="logout.php"><img src="images1/logout.jpg" alt="Logout" /></a></span></div>
							
							</div>
							
						</section>

						</div>
					</div>
				</section>
			<!-- Footer -->
				<footer id="footer">
					
					<ul class="copyright">
						<p> &copy; 2016 GRI-Boys Hostel. All Rights Reserved | Developed by <a href="http://linkedin.com/in/mathava-prakash"><mad style="color:#19dd95;font-size:18px">Mathavaprakash</mad> </a></p>
						
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="js1/jquery.min.js"></script>
			<script src="js1/jquery.dropotron.min.js"></script>
			<script src="js1/jquery.scrollgress.min.js"></script>
			<script src="js1/skel.min.js"></script>
			<script src="js1/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js1/main.js"></script>

	</body>
</html>