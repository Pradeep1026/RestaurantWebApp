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
  	   include('nav_bar.php'); 
  	 ?>
</section>
<div class="clearfix"></div> 

<section>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
        <div class="main_h3" style="color:#0CF;" align="center">Reserve your Table</div>
         <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
    </div>
     <div class="inner">
        <p> Book a table online.</p>
         <span></span>
         </div>
         
            <div class="reservation-form-holder">
                <div class="reservation-form">
                    <div id="message"></div>
                    <?php
						include('db.php');
						if(isset($_POST['submit'])){
							$date = $_POST['resdate'];
							$time = $_POST['time'];
							$table = $_POST['table'];
							$mem = $_POST['members'];
							$parkingslot = $_POST['parkingslot'];
							$name = $_POST['name'];
							$email = $_POST['email'];
							$mob = $_POST['phone'];
							$addr = $_POST['address'];
							$sql = $db->query("INSERT INTO `reserve_table`(`id`, `date`, `time`, `table_no`, `no_of_people`, `parking_slot`,  `name`, `email`, `mobile`, `addr`) VALUES ('','$date','$time','$table','$mem','$parkingslot','$name','$email','$mob','$addr')") or die(mysqli_error());
							if($sql){
								echo "<script>alert('Your Table Reserved Successfully');</script>";
							}
						}
					?>
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Book a table</h3>
                                <!--date-->
                                <input type="date" name="resdate" class="form-control cus_form" required="required" />
                                <!--time--> 
                                <select name="time" class="form-control cus_form">
                                  
                                    <option value="9:00am">9:00 am</option>
                                    <option value="9:30am">9:30 am</option>
                                    <option value="10:00am">10:00 am</option>
                                    <option value="10:30am">10:30 am</option>
                                    <option value="11:00am">11:00 am</option>
                                    <option value="11:30am">11:30 am</option>
                                    <option value="12:00pm">12:00 pm</option>
                                    <option value="12:30pm">12:30 pm</option>
                                    <option value="1:00pm">1:00 pm</option>
                                    <option value="1:30pm">1:30 pm</option>
                                    <option value="2:00pm">2:00 pm</option>
                                    <option value="2:30pm">2:30 pm</option>
                                    <option value="3:00pm">3:00 pm</option>
                                    <option value="3:30pm">3:30 pm</option>
                                    <option value="4:00pm">4:00 pm</option>
                                    <option value="4:30pm">4:30 pm</option>
                                    <option value="5:00pm">5:00 pm</option>
                                    <option value="5:30pm">5:30 pm</option>
                                    <option value="6:00pm">6:00 pm</option>
                                    <option value="6:30pm">6:30 pm</option>
                                    <option value="7:00pm">7:00 pm</option>
                                    <option value="7:30pm">7:30 pm</option>
                                    <option value="8:00pm">8:00 pm</option>
                                    <option value="8:30pm">8:30 pm</option>
                                    <option value="9:00pm">9:00 pm</option>
                                    <option value="9:30pm">9:30 pm</option>
                                    <option value="10:00pm">10:00 pm</option>
                                    <option value="10:30pm">10:30 pm</option>
                                    <option value="11:00pm">11:00 pm</option>
                                    <option value="11:30pm">11:30 pm</option>
                                </select>
                                <!--restaurant-->                                      
                                <select class="form-control cus_form" name="table">
                                    <option value="Table 1">Table 1</option>
                                    <option value="Table 2">Table 2</option>
                                    <option value="Table 3">Table 3</option>
                                    <option value="Table 4">Table 4</option>
                                    <option value="Table 5">Table 5</option>
                                    <option value="Table 6">Table 6</option>
                                    <option value="Table 7">Table 7</option>
                                    <option value="Table 8">Table 8</option>
                                    <option value="Table 9">Table 9</option>
                                    <option value="Table 10">Table 10</option>
                                </select>
                                <!--person-->    
                                <select class="form-control cus_form" name="members">
                                    <option value="1 Person">1 Person</option>
                                    <option value="2 Peoples">2 Peoples</option>
                                    <option value="3 Peoples">3 Peoples</option>
                                    <option value="4 Peoples">4 Peoples</option>
                                    <option value="5 Peoples">5 Peoples</option>
                                    <option value="6 Peoples">6 Peoples</option>
                                </select>
								<h3>Book Parking slot</h3>
								 <!--person-->    
                                <select class="form-control cus_form" name="parkingslot">
                                    <option value="Slot 1">None</option>
                                    <option value="Slot 1">Slot 1</option>
                                    <option value="Slot 2">Slot 2</option>
                                    <option value="Slot 3">Slot 3</option>
                                    <option value="Slot 4">Slot 4</option>
                                    <option value="Slot 5">Slot 5</option>
                                    <option value="Slot 6">Slot 6</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h3>Contact Details</h3>
                                <!--name--> 
                                <input type="text" name="name" placeholder="Name" class="cus_form form-control" required="required" />
                                <!--mail--> 
                                <input type="email" placeholder="Email ID" name="email" class="cus_form form-control" required="required" />
                                <!--phone--> 
                                <input type="text" placeholder="9963XXXX68" class="cus_form form-control" name="phone" required="required" />         
                                <!--message-->    
                                <textarea class="cus_form form-control" placeholder="Address" rows="4" name="address" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6"></div>
                            <div class="col-md-6">
                            	<button type="submit" name="submit" class="cus_form_btn">Make a reservation</button>   
                            </div>
                        </div>
                               										           											
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            
</section>

<!-- Start Our Specials -->
<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="">
<div class="section-title2">
      <div class="main_h3" style="color:#0CF;" align="center">Our Specials</div>
         <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
    </div>
     <div class="inner2">
        <p>Enter text here, select options and click the "Remove Duplicate Lines" button from above.</p>
         <span></span>
         </div>
          <div class="marq">
    <marquee direction="left" scrollamount="10" onmouseover="this.stop();" onmouseout="this.start();">
    <img src="images/1-1.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/1-2.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/1-3.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/1-4.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/1-5.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="images/1-6.jpg" style="padding-right:15px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </marquee>
    </div>
   </div>
  </div>
 </div>
</div>
</section> 
<!-- End Our Specials -->        

<?php 
	include('footer.php');
	include('js_files.php');
?>
</body>
</html>
