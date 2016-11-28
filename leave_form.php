<!DOCTYPE html>
<html>
<head>
<title>Leave Form - Boys Hostel</title>
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
     	/*	
		if(isset($_POST['select1'])){
			$select1 = $_POST['select1'];
			switch ($select1) {
				case 'value1':
					echo 'this is value1<br/>';
					break;
				case 'value2':
					echo 'value2<br/>';
					break;
				default:
					
					break;
			}
		}
*/
   
	?>
</head>
<body >
	<!-- main -->
	<div class="main">
		
		<!-- login form one -->
		<div class="login-form">  
			<div class="agile-row">
				<h5>Leave Form</h5>   
				<div class="login-agileits-top"> 
					<form action="#" method="POST"> 
						
						<div class="input-row">
							
							 
							<input type="text" class="user" name="regno" placeholder="Register Number" required/>
							<input type="date" class="user" name="fdate" placeholder="From Date" required/>
							<input type="date" class="user" name="tdate" placeholder="Last Name" required />	
							
						</div>	
							</br>
						<input type="submit" value="Allow Leave">
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
			
			$regno=mysql_real_escape_string($_POST['regno']);
            $fdate=mysql_real_escape_string($_POST['fdate']);
			$tdate=mysql_real_escape_string($_POST['tdate']);
			$no_of_days=(strtotime($tdate)-strtotime($fdate))/86400;
			
			$month1=date("Ym",strtotime($fdate));
			$month2=date("Ym",strtotime($tdate));
			if($month1!=$month2)
			{
				print '<script>alert("From date and to date must be same month. you can enter next month leave in another entry")</script>';
				exit;
			}	
			if($no_of_days<=0)
			{
				print '<script>alert("Please Select Valid from and to date. ")</script>';
				exit;
			}
			if (!$conserver) echo "connection  cannot connect";
			
            if(!$condb) echo "cannot connect db ";
			
			$query=  mysql_query("select * from student_details");
            $exist=  mysql_num_rows($query);
			$temp1=0;
			if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_regno=$row['reg_no'];
                    
                    if($regno==$table_regno )
                    {
                        $temp1=1;
						break;
                    }
                    
                    
                }
               if($temp1==0)
               {
                   print '<script>alert("Invalid Register Number. Please enter Valid Register Number")</script>';
                   print '<script>window.location.assign("leave_form.php");</script>';
				   exit;
               }
            } 
			if(mysql_query("INSERT INTO `bhostel`.`leave_form` ( `month`, `reg_no`, `from_date`, `to_date`, `no_of_days`) VALUES ( '$month1', '$regno', '$fdate', '$tdate', '$no_of_days')"))
            
			//echo "new uesr added";
				print '<script>alert(" Leave applied Successfully")</script>';
			else
				print '<script>alert(" Error in Database")</script>';
            print '<script>window.location.assign("manager_home.php");</script>';
			
          
        }    
        ?>
</body>
</html>