<!DOCTYPE html>
<html>
<head>
<title>Overall Bill - Boys Hostel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Multiple Login Forms template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style-login.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> 
<link href='//fonts.googleapis.com/css?family=Athiti:400,200,300,500,600,700' rel='stylesheet' type='text/css'>
<!-- //web font --> 
	<?php
		session_start();
		include_once "dbconnect.php";
     	
   
	?>
</head>
<body >
	<!-- main -->
	<div class="main">
		
		<!-- login form one -->
		<div class="login-form">  
			<div class="agile-row">
				<h5>Overall Bill List</h5>   
				<div class="login-agileits-top"> 
					<form action="#" method="POST"> 
						
						<div class="input-row">
							<select name="mon">
							<?PHP
								$query=  mysql_query("select * from fees_details");
								$exist=  mysql_num_rows($query);
								$temp="0"; 
								
								
								if($exist>0)
								{
									while($row=  mysql_fetch_assoc($query))
									{
										$table_month=$row['month_code'];
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
										<option value=<?PHP print $row['month_code'];?>><?PHP print $str;?></option>
										<?PHP
									}
								}
							?>
							</select>	
							
						</div>	
							</br>
						<input type="submit" value="View Details">
					</form>  
				</div>
				
			</div>  
		</div>
		
		<div class="clearfix"> </div>
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<div class="copyright">
		<p> &copy; 2016 GRI-Boys Hostel. All Rights Reserved | Developed by <a href="http://linkedin.com/in/mathava-prakash"><mad style="color:#711173;font-size:18px">Mathavaprakash</mad> </a></p>
	</div>
	<!-- //copyright --> 
	
	<?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
			
			$month=mysql_real_escape_string($_POST['mon']);
            $aaa="fees_details.php?mnth=".encryptor('encrypt',$month)."";
			print '<script>window.location.assign("'.$aaa.'");</script>';
			
			
			
        }    
        ?>
</body>
</html>