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
        <div class="section-title2">
            <div class="main_h3" style="color:#0CF;" align="center">Our Speciality</div>
            <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
        </div>
        <div class="inner3">
            <p>OUR SPECIAL CHOICES</p>
             <span></span>
        </div>
        <div class="row">
         <div class="col-md-4">
             <div class="spec">
             <img class="img-responsive spec_img" src="images/1.jpg" />
             <div class="main_h3_1">Koonthal Roast Recipe</div>
          <p>Dummy text: Its function as a filler or as a tool for comparing the visual impression of different typefaces Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content. </p>
          <ul class="list icons">
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Preparation Time: 1/2 hour</li>
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Cooking Time: 10-20 minute</li>
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Serves 4</li>
          </ul>
             </div>
         </div>
         <div class="col-md-4">
             <div class="spec">
             <img class="img-responsive spec_img" src="images/kerala_chicken.jpg" />
             <div class="main_h3_1">Baked Chicken Drumstick</div>          
             <p>Dummy text: Its function as a filler or as a tool for comparing the visual impression of different typefaces Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content. </p>
              <ul class="list icons">
                <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Preparation Time: 30 Minutes to 1hr</li>
                <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Cooking Time: 30 minute</li>
                <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Serves 4-6</li>
              </ul>
          
             </div>
         </div>
         <div class="col-md-4">
             <div class="spec">
             <img class="img-responsive spec_img" src="images/fish.jpg" />
             <div class="main_h3_1">Fish in Banana Leaf Wrap</div>
             </h2>
          <p>Dummy text: Its function as a filler or as a tool for comparing the visual impression of different typefaces Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content.</p>
          <ul class="list icons">
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Preparation Time: 1/2 hour</li>
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Cooking Time: 10-20 minute</li>
            <li style="color:#000;"><i class="fa fa-check-square-o" style="color:#0CF;"></i>Serves 4</li>
          </ul>
          
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
