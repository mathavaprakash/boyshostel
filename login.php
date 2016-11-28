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
     		   
	?>
</head>
<body>
	<!-- main -->
	<div class="main">
		
		<!-- login form one -->
		<div class="login-form">  
			<div class="agile-row">
				<h2>Login</h2>   
				<div class="login-agileits-top"> 
					<form action="#" method="post"> 
						<div class="input-row1">
							<input type="radio" value="student" id="male"  name="login_type" checked  >
                            <label for="male">Student</label>
							<input type="radio" value="staff" id="female"  name="login_type" >
                            <label for="female">Staff</label>
						</div>
						<div class="input-row">
							
							<input type="text" class="user" name="username" placeholder="User Name" required=""/> 
							<input type="password" class="password" name="Password" placeholder="Password" required=""/>	
						</div>	
							</br>
						<input type="submit" value="LOGIN">
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
           
            $uname=mysql_real_escape_string($_POST['username']);
            $pwd=mysql_real_escape_string($_POST['Password']);
            $logintype=  mysql_real_escape_string($_POST['login_type']);
            
			if (!$conserver) echo "connection  cannot connect";
			
            if(!$condb) echo "cannot connect db ";
            
            if($logintype=='staff')
            {
				
                $query=  mysql_query("select * from staff",$conserver);
				
            }
            elseif($logintype=='student')
            {
                $query= mysql_query("select * from student_details",$conserver);
            }
			
            $exist=  mysql_num_rows($query);
            $table_username="";
           
            $table_pwd="";
            
            $tem="0";
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
					
                    if($logintype=='staff')
                    {
						
                        $table_username=$row['staff_id'];
                    }
                    elseif($logintype=='student')
                    {
                        $table_username=$row['reg_no'];
                    }
                    $table_Isactive=$row['IsActive'];
                    $table_pwd=$row['password'];
                    
                    if($uname==$table_username) 
                    {
                        $tem=2;
                        if($pwd==$table_pwd)
                        {
                            if($table_Isactive==1)
                            {
                                $_SESSION['regno']=$uname;
                                $_SESSION['encregno']=  encryptor('encrypt', $uname);
								
                                if($logintype=='staff')
                                {
									$_SESSION['dcsa_user_type']="staff";
                                    print '<script>window.location.assign("manager_home.php");</script>';
                                }
                                elseif($logintype=='student')
                                {
									$_SESSION['dcsa_user_type']="student";
                                    print '<script>window.location.assign("student_home.php");</script>';
								   
                                }

                                $tem=1;
                            }
                            $tem=3;
                            
                        }
                        else
                        {
                            print '<script>alert("incorrect password.")</script>';
                            print '<script>window.location.assign("login.php");</script>';
                        }
                    }
                   
                    
                }
                if($tem==0)
                {
                    print '<script>alert("Username not exist in the database.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
                if($tem==2)
                {
                    print '<script>alert("incorrect password.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
                if($tem==3)
                {
                    print '<script>alert("Account not activated.")</script>';
                    print '<script>window.location.assign("login.php");</script>';
                }
            }
            
        }    
        ?>
</body>
</html>