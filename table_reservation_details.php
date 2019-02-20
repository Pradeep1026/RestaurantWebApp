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
    
<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('db.php');
include('admin_nav_bar.php'); 
if(isset($_SESSION['a_name'])){ 
//Edit Query
if(isset($_GET['item_id'])){
	$id = $_GET['item_id'];
	$edit_query = $db->query("select * from main_menu where item_id='$id'") or die(mysqli_error());
	$edit_row = mysqli_fetch_assoc($edit_query);
}
?>
<!-- Start Content -->
<div class="welcome_page">
	<!-- Start Section 1 -->
 	<div class="container p20_0"> 
        <div class="main_h3" style="color:#0CF;" align="center">TABLE RESERVATION DETAILS</div>
        <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div>           
          
          <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:65px;">
          
          	  <div style="overflow-x:scroll">
                <table class="table table-bordered" id="pages">
                    <thead>
                        <tr>
                           <th class="text-center">S.No</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Table No.</th>
                            <th class="text-center">No. Of People</th>
							<th class="text-center">Parking Slot</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
							$i = 1;
							$sql = $db->query("select * from `reserve_table` ORDER BY id DESC") or die(mysqli_error());
							while($row = mysqli_fetch_assoc($sql)){
								echo '<tr align="center">';
								echo '<td>'.$i.'</td>';
								echo '<td>'.$row['date'].'</td>';
								echo '<td>'.$row['time'].'</td>';
								echo '<td>'.$row['table_no'].'</td>';
								echo '<td>'.$row['no_of_people'].'</td>';
								echo '<td>'.$row['parking_slot'].'</td>';
								echo '<td>'.$row['name'].'</td>';
								echo '<td>'.$row['email'].'</td>';
								echo '<td>'.$row['mobile'].'</td>';
								echo '<td>'.$row['addr'].'</td>';
								echo '</tr>';
								$i++;
							}
						?>                      
                    </tbody>
                 </table>
            </div>

          </div>  
            
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