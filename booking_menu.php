<?php
@ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Restaurant King</title>
     <?php 
  	   include('css_files.php'); 
  	 ?>  
 </head>
 <body>
      
      <?php
	  	error_reporting(E_ERROR | E_WARNING);
	  	include('db.php'); 
         include('nav_bar.php');   
  	 ?>
<div class="clearfix"></div> 

    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
            <div class="main_h3" style="color:#0CF;" align="center">MENU</div>
             <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
    		</div>
        </div>
    </div>
    <div class="clearfix p10_0"></div>
    <div class="container booking_strip">
    	<div class="row">
        	<div class="col-md-3">CATEGORY</div>
            <div class="col-md-6">MENU </div>
            <div class="col-md-3">CART (Please Add Items in the cart).</div>
        </div>
    </div>
    <div class="clearfix" style="margin:1px auto; border-bottom:1px solid #FFF;"></div>
    	<div class="container">
            <div class="col-md-3" style="background:#F7F7F7 !important; margin-left:-15px; margin-right:10px;">
                <?php
					$mainmenu_query = $db->query("select * from `main_menu`") or die(mysqli_error());
					while($mainmenu_row = mysqli_fetch_assoc($mainmenu_query)){
						echo '<div class="booking_left"><a href="#'.$mainmenu_row['item_name'].'">'.$mainmenu_row['item_name'].'</a></div>';
						echo '<div class="clearfix"></div>';
					}
				?>
            </div>
            <div class="col-md-5" style="background:#F7F7F7 !important;">
            	<form action="#" method="post">
                <div style=" padding:5px 0px; margin:-40px 0px 0px 370px;"><input type="submit" name="submit" style=" style="position:fixed;"" value="submit" class="sub_menu_submit"></div>
                <div class="scroll-design">
            	<!-- Start Menu 1 -->
                 <?php
					$mainmenu_query = $db->query("select * from `main_menu`") or die(mysqli_error());
					while($mainmenu_row = mysqli_fetch_assoc($mainmenu_query)){ 
						$main_item = $mainmenu_row['item_name']?>
						<h4 style="padding:5px 0px 10px; font-size:15px; font-weight:bold; font-style:italic; text-transform:uppercase;" id="<?php echo $main_item?>"><?php echo $main_item?></h4>
                <div class="clearfix"></div>
                <div style="border-bottom:1px solid #333;"></div>
                	<!-- Sub Menu -->
				<?php 
                    $submenu_query = $db->query("select * from sub_menu where menu_item='$main_item'") or die(mysqli_error());
                    while($submenu_row = mysqli_fetch_assoc($submenu_query)){?>
                    	
                        <div class="row">
                        	
                            <div class="col-md-8">
                                <div class="booking_left_1 sub_menu_item"><a href="#"><?php echo $submenu_row['sub_menu_item']?></a></div>
                            </div>
                            <div class="col-md-4">
                                <div align="right"><i class="fa fa-inr" style="padding-top:20px; color:#000;"></i><span class="price"> <?php echo $submenu_row['price']?></span> &nbsp; &nbsp; &nbsp; <input type="checkbox" name="sub_menu[]" value="<?php echo $submenu_row['sub_item_id']?>" /></div>
                               
                            </div>
                        </div>	
                        					
				<?php
				} } echo '<div class="clearfix"></div>';	?>
              </form>
            </div>
            </div>
            <div class="col-md-4" style="">
            	<div class="row" style="background:#F7F7F7 !important; margin:0px -35px 0px -5px !important;">
                	<?php
						$i=1;
						$price='';
						if(isset($_POST['submit'])){ 
							$rand = rand(10,10000);
							$item_id = $_POST['sub_menu']; 
							if($item_id !=''){							
							$query = $db->query("select * from sub_menu where sub_item_id IN('".implode("','",$item_id)."')") or die(mysqli_error());
							while($row = mysqli_fetch_assoc($query)){
								$sub_menu_item = $row['sub_menu_item'];
								$cost = $row['price'];
							?>
							<div class="row">
                                <div class="col-md-8">
                                    <div class="booking_left_1" style="font-weight:bold;"><a href="#"><?php echo $row['sub_menu_item']?></a></div>
                                </div>
                                <div class="col-md-4">
                                    <div align="right"><i class="fa fa-inr" style="padding-top:15px; color:#000;"></i> <?php echo $row['price']?></div>
                                </div>
                            </div>
						<?php 						
                        $_SESSION['cust_id'] = "CUST_".$rand;
                        $cust_id = $_SESSION['cust_id'];
						$sql = $db->query("INSERT INTO `order_menu`(`order_id`, `cust_id`, `item_name`, `price`) VALUES ('','$cust_id','$sub_menu_item','$cost')") or die(mysqli_error());
						$price += $row['price'];	
						$i++;}}}?>                	
                    <div class="clearfix"></div>
                	<div style="border-bottom:1px solid #333; margin:5px 15px 10px;"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="booking_left_1" style=" font-size:12px;"><a href="#">Sub Total</a></div>
                        </div>
                        <div class="col-md-4">
                            <div align="right"><i class="fa fa-inr" style="padding-top:15px; color:#000;"></i> <?php echo $price;?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="border-bottom:1px solid #333; margin:5px 15px 10px;"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="booking_left_1" style=" font-size:12px;"><a href="#">Service Charge</a></div>
                        </div>
                        <div class="col-md-4">
                            <div align="right"><i class="fa fa-inr" style="padding-top:15px; color:#000;"></i> <?php $ser_tax = $price*0.1; echo $ser_tax;?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row" style="padding-top:20px;">
                        <div class="col-md-8">
                            <div class="booking_left_1" style="font-weight:bold;"><a href="#">TOTAL</a></div>
                        </div>
                        <div class="col-md-4">
                            <div align="right"><i class="fa fa-inr" style="padding-top:15px; color:#000;" name="totalPrice" id = "totalPrice"></i> <?php $_SESSION['totalPrice'] = $price + $ser_tax; echo $_SESSION['totalPrice'];?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row"><a href="checkout.php" class="cus_form_btn_1 btn-block">CHECKOUT</a></div>
                    
              </div>
            </div>
      </div>
    <div class="clearfix" style="margin-bottom:30px;"></div>
    </div>
<!--<script type="text/javascript">
	$(".booking_left").click(function(){
		$(".booking_left a").addClass("bok_active");	
	})
</script>
<script type="text/javascript">
	function getContent(){
		jQuery.ajax({
        url: "booking_menu.php",
        success: function(result) { //alert(result);
               html = jQuery('<div>').html(result); 

            alert(html.find("div.sub_menu_item").attr("class"));
            var item = html.find("div.sub_menu_item").html(); alert(item);
            var price = html.find("span.price").html(); alert(price);

        },
    });
	}
</script> -->
<?php 
	include('footer.php');
	include('js_files.php');
?>
</body>
</html>
