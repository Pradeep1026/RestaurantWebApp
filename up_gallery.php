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
if(isset($_GET['gal_id'])){
	$id = $_GET['gal_id'];
	$edit_query = $db->query("select * from gallery where id='$id'") or die(mysqli_error());
	$edit_row = mysqli_fetch_assoc($edit_query);
}
?>
<!-- Start Content -->
<div class="welcome_page">
	<!-- Start Section 1 -->
 	<div class="container p20_0"> 
        	
          <div class="col-md-4 col-sm-4 col-xs-12">
          	  <div class="main_h3" style="color:#0CF;" align="center">UPLOAD IMAGES</div>
         	  <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
          	  <?php
			  	if(isset($_POST['submit'])){
					$title = $_POST['title'];
					$image = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];
					
					if($image !=''){
						move_uploaded_file($image_tmp,"images/gallery/$image");
					}
					//Start Update Query
					if(isset($_GET['gal_id'])) {
						if($image !=''){ $db->query("UPDATE `gallery` SET `image`='$image' where id='$id'") or die(mysqli_error());}
						$sql = $db->query("UPDATE `gallery` SET `image_name`='$title' WHERE id='$id'") or die(mysqli_error());
					}
					else{
						$sql = $db->query("INSERT INTO `gallery`(`id`, `image_name`, `image`) VALUES ('','$title','$image')") or die(mysqli_error());
					}
					if($sql){
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
                                echo "<div> Image is successfully updated!</div>";
                              ?>
                        </div>
                    </div>
                 <?php } 
				 	if(isset($_GET['del'])){ ?>		
                    <div class="row">	
                         <div class="alert alert-danger f17" role="alert">
                              <?php
                                echo "<div> Image Deleted successfully!</div>";
                              ?>
                        </div>
                    </div>
                 <?php } ?> 
             </div>
            <!-- End Success Message -->
              <form action="" method="post" enctype="multipart/form-data">
              	  <input type="text" name="title" placeholder="Image Name" class="form-control cus_form" value="<?php echo $edit_row['image_name']?>" />
                  <input type="file" name="image" class="form-control cus_form" value="<?php echo $edit_row['image']?>" />
                   <?php if(isset($_GET['gal_id'])){
						 if($edit_row['image'] != ''){ ?>
                        <span><img src="images/gallery/<?php echo $edit_row['image']?>" class="img-circle" width="80" height="50"></span>
                        <?php } else {  ?>
							 <img src="images/loading.gif" class="img img-circle" alt="dummy image" height="50" />
						<?php }?>
                        
                        <div class="clearfix m10_auto"></div>
                     <?php } ?>
                  <input type="submit" name="submit" value="SUBMIT" class="cus_form_btn_1 btn-block" />
              </form>
          </div>  
          
          <div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:65px;">
          
          	  <div style="overflow-x:scroll">
                <table class="table table-bordered" id="pages">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Image&nbsp;Title</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
							$id = 1;
							$query = $db->query("select * from gallery") or die(mysqli_error());
							while($row = mysqli_fetch_assoc($query)){
								echo '<tr align="center">';
								echo '<td style="padding-top:20px;">'.$id.'</td>';
								echo '<td style="padding-top:20px;">'.$row['image_name'].'</td>'; ?>
								<td>
                                	<?php 
										if($row['image']!=''){
										?>
										<img src="images/gallery/<?php echo $row['image'];?>" class="img img-circle" width="80" height="50" />
										<?php } else { ?>
										<img src="images/loading.gif" class="img img-circle" alt="dummy image" width="80" height="50" />
									<?php }?>
                                </td>
								<?php
                                echo '<td style="padding-top:20px;"><a href="up_gallery.php?gal_id='.$row['id'].'" class="btn btn-sm btn-warning">Edit</a>&nbsp;&nbsp;&nbsp;<a href="delete.php?gal_id='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a></td>';
								echo '</tr>';
								$id++;
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