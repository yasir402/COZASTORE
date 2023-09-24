<?php
include('admin/config.php');
include ('funtion/common_function.php');
?>



    <!-- Your content here -->
    <link rel="stylesheet" href="style.css"/>
<!-- navbar -->
<?php
include('includes/header.php');

?>
<main style="height:90vh;">
<div class="bg-light">
    <h1 class="text-center">
        My Store
    </h1>
    <p class="text-center">
        Quality is our first approach
    </p>
</div>
<!-- products -->
<div class="col-md-12">

<div class="row">
<!-- getting produts -->
<?php
detail();
 getuniquecategory();
 getuniquebrands();
?>
</div>
</div>
    
</div>


</div>

</main>

















<?php

include('includes/footer.php')

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
