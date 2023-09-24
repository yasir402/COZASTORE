<?php
include('admin/config.php');
include ('funtion/common_function.php');
?>



    <!-- Your content here -->

<!-- navbar -->
<?php
include('includes/header.php');

?>

<style>
	*{

		margin:0;
		padding:0;
	}
</style>
<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<!-- <div class="layer-slick1 animated" data-appear="fadeInDown" data-delay="0">
								-- <span class="ltext-202 cl2 respon2">
									Men Collection 2018
								</span> -->
						<!-- </div> --> 
								
							<div class="layer-slick1 animated " data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
								Coza Store
								</h2>
							</div>
								
							<div class="layer-slick1 animated" data-appear="zoomIn" data-delay="1600">
								<a href="display_all.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

			
			</div>
		</div>
	</section>












	<div class="bg-light">
    <div class="container">
        <h1 class="text-center">Featured Products</h1>
        <p class="text-center">Quality is our first approach</p>
    </div>
</div>

<!-- products -->


<div class="container ">
    <div class="row">
        <?php
        if(isset($_GET['search'])){
            search();
            cart();
        }
        else{
            cart();
            getproduct();
            getuniquecategory();
            getuniquebrands();
        }
        ?>
    </div>
</div>



    





















<?php

include('includes/footer.php');

?>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- https://cdnjs.com/libraries/popper.js/2.5.4 -->
    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"
    ></script> -->

    <!-- More: https://getbootstrap.com/docs/5.0/getting-started/introduction/ -->
  </body>
</html>
