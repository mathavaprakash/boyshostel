<!DOCTYPE html>
<html>
<head>
<title>Mess Bill - Boys Hostel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Multiple Login Forms template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- css links -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<!-- Js for modal -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
				<h5>Mess Bill Create</h5>   
				<div class="login-agileits-top"> 
					<form action="#" method="POST"> 
						
						<div class="input-row">
							<select name="mon">
								<option value=0>Select Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							 <select name="year">
								<option value=0>Select Year</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								
							</select>
							<input type="number" class="user" name="days" placeholder="Working Days in this Month" required/>
							<input type="number" class="user" name="fees" placeholder="Per Day Fees/Student" required/>
							
						</div>	
							</br>
							<a  style="color:#cd1;	border:2px solid #07cbc9; padding:15px 15px; display:inline-block;  margin:1em 1em 1em 5em;	font-size: 16px;" href="#" data-toggle="modal" data-target="#popup">Add Mess Bill</a>
							<div class="clearfix"></div>
							<div class="textt">
								<!-- Modal -->
								<div class="modal fade" id="popup" role="dialog" >
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												
												<p style="color:#394;">
														Are you Sure you want to add Mess Bill?
														
												</p>
												<div class="clearfix"></div>
												<div align="center">
													<input type="submit" value="Yes">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</form>  
				</div>
				
			</div>  
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
            $year=mysql_real_escape_string($_POST['year']);
			$days=mysql_real_escape_string($_POST['days']);
			$fees=mysql_real_escape_string($_POST['fees']);
			if($year==0 or $month==0)
			{
				print '<script>alert(" Please select Month & Year")</script>';
				exit;
			}
			$month_year=$year.$month;
			$tot_amt=$days * $fees;
			if (!$conserver) echo "connection  cannot connect";
			
            if(!$condb) echo "cannot connect db ";
			$query=  mysql_query("select * from fees_details");
            $exist=  mysql_num_rows($query);
			$temp1=0;
			if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_month=$row['month_code'];
                    
                    if($month_year==$table_month )
                    {
                        $temp1=1;
						break;
                    }
                    
                    
                }
               if($temp1==1)
               {
                   print '<script>alert("This Month Mess Details already available in the database. you cannot enter dublicate details")</script>';
				   $aaa="fees_details.php?mnth=".encryptor('encrypt',$month_year)."";
					print '<script>window.location.assign("'.$aaa.'");</script>';
				 //print '<script>window.location.assign("fees_details.php");</script>';
                   
				   exit;
               }
            } 
		
			if(mysql_query("INSERT INTO `bhostel`.`fees_details` (`month_code`, `per_day`, `days_in_month`, `total_fees`) VALUES ('$month_year', '$fees', '$days', '$tot_amt')"))
            {
				$aaa="fees_details.php?mnth=".encryptor('encrypt',$month_year)."";
				print '<script>window.location.assign("'.$aaa.'");</script>';
				
				print '<script>alert(" Fees Applied Successfully")</script>';
				// print '<script>window.location.assign("fees_details.php");</script>';
			}
			//echo "new uesr added";
				
			else
			{
				print '<script>alert(" Error in Database")</script>';
				 print '<script>window.location.assign("manager_home.php");</script>';
			
			}
				
          
        }    
        ?>
		



</body>
</html>