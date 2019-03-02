<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/simplelightbox.css"/>
    <title>Restaurant Website</title>
     <?php 
  	   include('css_files.php'); 
  	 ?>  
 </head>
 <body>
 <div id="fb-root"></div>
	<script async defer src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=2270128646589976&autoLogAppEvents=1"></script>
     <div class="loader"><img src="images/loading.gif" alt="" /></div>
      <?php 
  	   include('nav_bar.php'); 
  	 ?>
</section>
<div class="clearfix"></div> 

<section>
    
<style type="text/css">
.fb-div {
	  border: 1px solid #dddfe2;
    border-radius: 3px;
		margin-top: 10px;
    margin-bottom: 10px;
		text-align: center;
}
.container {
  max-width: 1170px;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.container .gallery a img {
  float: left;
  width: 25%;
  height: auto;
  height:200px;
  border: 5px solid #fff;
  -webkit-transition: -webkit-transform .15s ease;
  -moz-transition: -moz-transform .15s ease;
  -o-transition: -o-transform .15s ease;
  -ms-transition: -ms-transform .15s ease;
  transition: transform .15s ease;
  position: relative;
}
.container .gallery a:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -o-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  z-index: 5;
}
.container .gallery a.big img {
  width: 40%;
}
.align-center {
  text-align: center;
}
</style>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="section-title">
        	<div class="main_h3" style="color:#0CF;" align="center">GALLERY</div>
         <div class="line" align="center"><img class="img-responsive" src="images/undr.png" /></div> 
    		</div>
    	</div>
	</div>
    <div class="clearfix p20_0"></div>
    <div class="container">
    	<div class="gallery">
        	<?php
				include('db.php');
				$gal_query = $db->query("select * from gallery") or die(mysqli_error());
				while($gal_row = mysqli_fetch_assoc($gal_query)){
					echo '<a href="images/gallery/'.$gal_row['image'].'"><img src="images/gallery/'.$gal_row['image'].'" alt="'.$gal_row['image'].'" /></a>';
				}
			?>
			<div class="clear"></div>

		</div>
    </div>
    <div class="clearfix p20_0"></div>        
</section> 

<!-- facebook comment Box -->
<div class="fb-div">
	<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"  data-numposts="5"></div>
</div>
<!-- Close facebook comment Box -->

<?php 
	include('footer.php');
	include('js_files.php');
?>
<script type="text/javascript" src="js/simple-lightbox.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox();

		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});
</script>

</body>
</html>
