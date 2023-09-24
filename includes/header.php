<?php
// include ('../funtion/common_function.php');
$current_page = $_SERVER['PHP_SELF'];
$is_main_page = (basename($current_page) !='index.php');
session_start();

?>
<style>
    /* Custom CSS for the user dropdown button */
 /* Custom CSS for the user dropdown button */
.btn-secondary.dropdown-toggle {
    background-color: white;
    color: black;
    padding: 8px 16px; /* Adjust padding for better button size */
    border: 1px solid #ccc;
    border-radius: 5px; /* Add rounded corners */
    transition: background-color 0.3s, border-color 0.3s; /* Smooth transitions */
}

/* Change the hover and active styles */
.btn-secondary.dropdown-toggle:hover {
    background-color: #f5f5f5;
    color: black;
    border: 1px solid #aaa; /* Slightly darker border on hover */
}

.btn-secondary.dropdown-toggle:focus {
    background-color: white;
    border: 1px solid #aaa;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2); /* Add a subtle box shadow on focus */
}

</style>

<link rel="stylesheet" href="./style.css">
<!-- Header -->
<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
						
							</li>

							<li>
								<a href="display_all.php">Shop</a>
							</li>


							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
						
							<div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                // Display the username if the user is logged in (you should have a user authentication system)
                // Replace 'USERNAME' with the actual variable or function that holds the username
				echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
                ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <?php
                // Check if the user is logged in, and if so, display account settings and logout options
                if (isset( $_SESSION['username'])) {
                    echo '<a class="dropdown-item" href="account_settings.php">Account Settings</a>';
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                } else {
                    // If the user is not logged in, display a login link
                    echo '<a class="dropdown-item" href="user_login.php">Login</a>';
                }
                ?>
            </div>
        </div>
							</div>
						</div>
							 <div class="flex-c-m h-full p-r-24">
     
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="cart.php">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php  cart_item();  ?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							</a>
						</div>
					
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">
                            <?php
                            // Check if it's the index.php page to display the search bar
                            if ($is_main_page) {
                                echo '<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">';
                                echo '<i class="zmdi zmdi-search"></i>';
                                echo '</div>';
                            }
                            ?>
                        </div>

				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<?php
        // Check if it's the index.php page to display the search bar
        if ($is_main_page) {
            echo '<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">';
            echo '<div class="container-search-header">';
            echo '<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">';
            echo '<img src="images/icons/icon-close2.png" alt="CLOSE">';
            echo '</button>';
            echo '<form class="wrap-search-header flex-w p-l-15">';
            echo '<button class="flex-c-m trans-04">';
            echo '<i class="zmdi zmdi-search"></i>';
            echo '</button>';
            echo '<input class="plh3" type="text" name="search" placeholder="Search...">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
        ?>
	</header>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>