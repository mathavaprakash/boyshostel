<!DOCTYPE html>
<html>
<head>
<title>Student Profile - Boys Hostel</title>
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
                    if($_SESSION['encregno'])
                    {
                        
                    }
                    else
                    {
                        header("location:index.html");
                    }        
                   
                    $user_id=encryptor('decrypt',$_SESSION['encregno']); 
					$query=  mysql_query("select * from staff");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_email="";
            
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['staff_id'];
                    $table_pwd=$row['password'];
                    if($user_id==$table_userid)
                    {
						
                        $temp=1;
                        $fname=$row['name'];
                        
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
			$reg_no=encryptor('decrypt',$_GET['id']);
            $query=  mysql_query("select * from student_details");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
            
            $table_role="";
            $table_pwd="";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['reg_no'];
                    $table_pwd=$row['password'];
                    if($reg_no==$table_userid)
                    {
						
                        $temp=1;
                        $table_fname=$row['fname'];
                        $table_lname=$row['lname'];
                        $table_mobile=$row['phone'];
                        $table_email=$row['email'];
                        $table_address=$row['address'];
						$table_father_name=$row['father_name'];
						$course=$row['course'];
                       
                        
                        break;
                    }
                }
                if($temp==0)
                {
                    print '<script>alert("invalid profile")</script>';
                     header("location:index.html");
                }
            }
                ?>
</head>
<body>
	<!-- main -->
	<div class="main">
		
		<!-- login form one -->
		<div class="login-form">  
			<div class="agile-row">
				<h5>Student Profile</h5>   
				<div class="login-agileits-top"> 
					<form action="#" method="POST"> 
						
						<div class="input-row">
							
							 <select name="select1" >
								<option value="<?php print "$course"; ?>"><?php print "$course"; ?></option>
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
							<input type="text" value="<?php print "$table_userid"; ?>" class="user" name="regno" placeholder="Register Number" disabled />
							<input type="text" value="<?php print "$table_fname"; ?>" class="user" name="fname" placeholder="First Name" required/>
							<input type="text" value="<?php print "$table_lname"; ?>" class="user" name="lname" placeholder="Last Name" />	
							<input type="text" value="<?php print "$table_father_name"; ?>" class="user" name="father_name" placeholder="Father/Guardian Name" required/>
							<textarea name="address" rows=3><?php print "$table_address"; ?></textarea>
							<input type="number" value="<?php print "$table_mobile"; ?>" class="user" name="phone" placeholder="Phone Number" required max=9999999999 min=7000000000/>
								
						</div>	
							</br>
						<input type="submit" value="Update">
						
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
			
			//$regno=mysql_real_escape_string($_POST['regno']);
			$regno=$reg_no;
			
            $fname=mysql_real_escape_string($_POST['fname']);
			$lname=mysql_real_escape_string($_POST['lname']);
			$father_name=mysql_real_escape_string($_POST['father_name']);
            $phone=mysql_real_escape_string($_POST['phone']);
			$address=mysql_real_escape_string($_POST['address']);
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
			
			if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    $table_regno=$row['reg_no'];
                    
                    if($regno==$table_regno )
                    {
                        if(mysql_query("UPDATE student_details SET fname = '$fname',lname='$lname',father_name='$father_name',address='$address',course='$ss',phone=$phone   WHERE reg_no = $regno"))
						
							print '<script>alert(" Student details edited Successfully")</script>';
						else
							print '<script>alert(" Error in update database")</script>';
						print '<script>window.location.assign("students_details.php");</script>';
						break;
                    }
                    
                    
                }
               
            }
			
            
			//echo "new uesr added";
			
			
            
        }    
        ?>
</body>
</html>