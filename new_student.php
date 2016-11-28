<!DOCTYPE html>
<html>
<head>
<title>Login - Boys Hostel</title>
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
<body>
	<!-- main -->
	<div class="main">
		
		<!-- login form one -->
		<div class="login-form">  
			<div class="agile-row">
				<h5>New Student Register</h5>   
				<div class="login-agileits-top"> 
					<form action="#" method="POST"> 
						
						<div class="input-row">
							
							 <select name="select1">
								<option value="empty">Select Course</option>
								<option value="MCA">MCA</option>
								<option value="M.Sc(GIS)">M.Sc(GIS)</option>
								<option value="MBA">MBA</option>
								<option value="B.Sc(Maths)">B.Sc(Maths)</option>
								<option value="M.Phil Computer Science">M.Phil Computer Science</option>
								<option value="M.Phil Tamil">M.Phil Tamil</option>
								<option value="MA Hindhi">MA Hindhi</option>
								<option value="M.Sc Physics">M.Sc Physics</option>
								<option value="M.Sc Chemistry">M.Sc Chemistry</option>
							</select>
							<input type="text" class="user" name="regno" placeholder="Register Number" required/>
							<input type="text" class="user" name="fname" placeholder="First Name" required/>
							<input type="text" class="user" name="lname" placeholder="Last Name" />	
							<input type="text" class="user" name="father_name" placeholder="Father/Guardian Name" required/>
							<input type="number" class="user" name="phone" placeholder="Phone Number" required max=9999999999 min=7000000000/>
								
						</div>	
							</br>
						<input type="submit" value="Register">
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
            $fname=mysql_real_escape_string($_POST['fname']);
			$lname=mysql_real_escape_string($_POST['lname']);
			$father_name=mysql_real_escape_string($_POST['father_name']);
            $phone=mysql_real_escape_string($_POST['phone']);
			$address="";
			$ss=mysql_real_escape_string($_POST['select1']);
            
			
			
			if (!$conserver) echo "connection  cannot connect";
			
            if(!$condb) echo "cannot connect db ";
			
			if($ss=="empty")
			{
				print '<script>alert("Please Select Course.")</script>';
				exit;
			}
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
               if($temp1==1)
               {
                   print '<script>alert("This Student Register Number Already Exist in our Database")</script>';
                   print '<script>window.location.assign("login.php");</script>';
				   exit;
               }
            }
			mysql_query("INSERT INTO `bhostel`.`student_details` (`reg_no`, `fname`, `lname`, `father_name`, `address`, `course`, `phone`, `email`, `password`, `IsActive`) VALUES ('$regno', '$fname', '$lname', '$father_name', NULL, '$ss', '$phone', NULL, '1111', '1')");
            
			//echo "new uesr added";
			print '<script>alert(" Student Registered Successfully")</script>';
            print '<script>window.location.assign("students_details.php");</script>';
			
            
        }    
        ?>
</body>
</html>