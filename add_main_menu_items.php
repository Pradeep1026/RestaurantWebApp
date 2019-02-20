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
        </section>
		banner section-->
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
        	
          <div class="col-md-4 col-sm-4 col-xs-12">
          	  <div class="main_h3" style="color:#0CF;" align="center">MAIN MENU ITEMS</div>
         	  <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div>
              <?php
			  	if(isset($_POST['submit'])){
					$item = $_POST['item_name'];
					if(isset($_GET['item_id'])){
						$query = $db->query("UPDATE `main_menu` SET `item_name`='$item' WHERE item_id='$id'") or die(mysqli_error());
					} else {
						$query = $db->query("INSERT INTO `main_menu`(`item_id`, `item_name`) VALUES ('','$item')") or die(mysqli_error());
					}
					if($query){
						header("location:".$_SERVER['PHP_SELF']."?msg=msg");
					}
				}
			  ?> 
              <!-- Start Success Message -->
             <div style="padding-top:15px;">
                 <?php
                   if(isset($_GET['msg'])){ ?>		
                    <div class="row">	
                         <div class="alert alert-success f17" role="alert">
                              <?php
                                echo "<div> Menu Item Updated successfully!</div>";
                              ?>
                        </div>
                    </div>
                 <?php } 
				 	if(isset($_GET['del'])){ ?>		
                    <div class="row">	
                         <div class="alert alert-danger f17" role="alert">
                              <?php
                                echo "<div> Menu item Deleted successfully!</div>";
                              ?>
                        </div>
                    </div>
                 <?php } ?> 
             </div>
            <!-- End Success Message -->
          	  <form action="" method="post" enctype="multipart/form-data">
              	  <input type="text" name="item_name" placeholder="Main Menu Item" class="form-control cus_form" value="<?php echo $edit_row['item_name'];?>" />
                  <input type="submit" name="submit" value="SUBMIT" class="cus_form_btn_1 btn-block" />
              </form>
          </div>  
          
          <div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:65px;">
          
          	  <div style="overflow-x:scroll">
                <table class="table table-bordered" id="pages">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Main Menu Item</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
							$i = 1;
							$sql = $db->query("select * from `main_menu` ORDER BY item_id DESC") or die(mysqli_error());
							while($row = mysqli_fetch_assoc($sql)){
								echo '<tr align="center">';
								echo '<td>'.$i.'</td>';
								echo '<td>'.$row['item_name'].'</td>';
								echo '<td><a href="add_main_menu_items.php?item_id='.$row['item_id'].'" class="btn btn-sm btn-warning">Edit</a>&nbsp;&nbsp;&nbsp;<a href="delete.php?item_id='.$row['item_id'].'" class="btn btn-sm btn-danger">Delete</a></td>';
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