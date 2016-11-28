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
                        header("location:index.php");
                    }        
					
                    $user_id=encryptor('decrypt',$_SESSION['encregno']); 
					
						$month=  encryptor('decrypt',$_GET['mnth']);
					
            $query=  mysql_query("select * from staff");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['staff_id'];
                    $table_pwd=$row['password'];
                    if($user_id==$table_userid)
                    {
						
                        $temp=1;
                        $table_fname=$row['name'];
                        
                        $table_email=$row['email'];
                       
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
                     header("location:index.html");
                }
            }
			
		/*	if(isset($_SESSION['month']))
			{*/
					
					$query=  mysql_query("select * from fees_details");
					$exist=  mysql_num_rows($query);
					$temp="0"; 
					
					
					if($exist>0)
					{
						while($row=  mysql_fetch_assoc($query))
						{
							
							$table_month=$row['month_code'];
							if($month==$table_month)
							{
								
								$temp=1;
								$days=$row['days_in_month'];
								
								$fees=$row['per_day'];
								$total_fees=$row['total_fees'];
								break;
							}
						}
						if($temp==0)
						{
							print '<script>alert("invalid month")</script>';
							 header("location:index.html");
						}
					}
					$year=(int)($table_month / 100);
					$mon=fmod($table_month,100);
					switch($mon)
					{
						
						case 1:
							$mon="Jan";
							break;
						case 2:
							$mon="Feb";
							break;
						case 3:
							$mon="Mar";
							break;
						case 4:
							$mon="Apr";
							break;
						case 5:
							$mon="May";
							break;
						case 6:
							$mon="June";
							break;
						case 7:
							$mon="July";
							break;
						case 8:
							$mon="Aug";
							break;
						case 9:
							$mon="Sep";
							break;
						case 10:
							$mon="Oct";
							break;
						case 11:
							$mon="Nov";
							break;
						case 12:
							$mon="Dec";
							break;
					}
					$str=$mon . " - " . $year;
					

			
     ?>
	</head>
	<body  class="landing" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
		<div id="page-wrapper">
			<div class="header-overlay">
			<!-- Header -->
				<header id="header" class="alt">
					<a class="navbar-brand" href="logout.php">GRI-Boys Hostel</a>
					<nav id="nav">
						<ul>
							<li><a href="manager_home.php">Home</a></li>
							<li><a href="new_student.php">New Student</a></li>
							<li><a href="students_details.php">View Student</a></li>
							<li><a href="mess_bill_new.php">Mess Bill</a></li>
							<li><a href="view_overall_bill.php">View Overall Bill</a></li>
							<li><a href="leave_form.php">Leave Form</a></li>
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
							<section class="box"><h3> <?PHP print $str . " - Mess Bill Details"; ?> </h3>
								<div class="table-wrapper">
									<table class="alt">
										<thead>
											<tr>
												<td>SNO</td>
												<td>Reg.No</td>
												<td>Name</td>
												<td>Course</td>
												<td>days</td>
												<td>leave</td>
												<td>present</td>
												<td>per day fees</td>
												<td>Total Amt</td>
											</tr>
										</thead>
										<tbody>
											<?PHP
												
												
												$query1=  mysql_query("select * from student_details where IsActive=1 ");
												$exist1=  mysql_num_rows($query1);
												
												$sno=0;
												if($exist>0)
												{
													while($row1=  mysql_fetch_assoc($query1))
													{	
														$sno+=1;
														$regno=$row1['reg_no'];
														
														$query=  mysql_query("select * from leave_form");
														$exist=  mysql_num_rows($query);
														 
														
														
														if($exist>0)
														{
															while($row=  mysql_fetch_assoc($query))
															{
																
																$table_regno=$row['reg_no'];
																$table_mon=$row['month'];
																$leave_days_count=0;
																if($month==$table_mon and $table_regno==$regno)
																{
																	$leave_days_count+=$row['no_of_days'];
																	
																}
															}
															
														}
														$present=$days-$leave_days_count;
														?>
															<tr>
																<td><?php print $sno; ?></td>
																<td><?php print $regno; ?></td>
																<td><?php print $row1['fname']." ".$row1['lname']; ?></td>
																<td><?php print $row1['course']; ?></td>
																<td><?php print $days; ?></td>
																<td><?php print $leave_days_count; ?></td>
																<td><?php print $present; ?></td>
																<td><?php print $fees; ?></td>
																<td><?php print $fees*$present; ?></td>
															</tr>	
														<?php												
													}														
												}  
											?>
										</tbody>
												
									</table>
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