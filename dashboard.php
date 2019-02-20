<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Restaurant Website</title>
     <?php 
  	   include('css_files.php'); 
  	 ?>  
 </head>

<body>
	<div class="loader"><img src="images/loading.gif" alt="" /></div>
        <!--
        <section>
         <div class="banner">
         <img class="img-responsive logo1" src="images/logo.png"/>
		 <img src="images/Dashboard.jpg"  class="img-responsive">
		</div>
        </section> -->
<?php 
include('db.php');
include('admin_nav_bar.php'); 
if(isset($_SESSION['a_name'])){ 
?>
<!-- Start Content -->
<div class="welcome_page">
	<!-- Start Section 1 -->
 	<div class="container" style="padding:150px 0px 200px;"> 
        	<h2 align="center" style="font-weight:bold; text-transform:uppercase;">Wecome To " RESTAURANT KING "</h2>
    </div>
	<!-- End Section 1 -->
</div>  
<!-- End Content -->
<?php 
include('footer.php');
include('js_files.php');
}else{
	header("location:index.php");
	}
?>
</body>
</html>