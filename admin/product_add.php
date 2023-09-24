<?php
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $products_name = $_POST["products_name"];
    $product_description = $_POST["product_description"];
    $product_keyword = $_POST["product_keyword"];
    $category = $_POST["category"];
    $brands = $_POST["brands"]; // Make sure to add 'name' attribute to the Brands dropdown
    $product_price = $_POST["product_price"];
$status = 'true';
    // Handle image uploads
    $upload_dir = "upload/"; // Directory where images will be stored

    // Generate unique file names for the uploaded images
    $image1 = $upload_dir . uniqid() . "_" . $_FILES["products_image1"]["name"];
    $image2 = $upload_dir . uniqid() . "_" . $_FILES["products_image2"]["name"];
    $image3 = $upload_dir . uniqid() . "_" . $_FILES["products_image3"]["name"];


 
    // Move uploaded images to the designated directory
  

    
        move_uploaded_file($_FILES["products_image1"]["tmp_name"], $image1);
        move_uploaded_file($_FILES["products_image2"]["tmp_name"], $image2);
        move_uploaded_file($_FILES["products_image3"]["tmp_name"], $image3);
    // Insert data into the database with complete image paths
    $query = "INSERT INTO products (pro_name, pro_description, pro_keyword, cat_id, brand_id, pro_image1, pro_image2, pro_image3, pro_price,date,stutus)
              VALUES ('$products_name', '$product_description', '$product_keyword', '$category', '$brands', '$image1', '$image2', '$image3', '$product_price',NOW(),'$status')";
    
    if (mysqli_query($con, $query)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

}
?>

<!-- Rest of your HTML and form -->





<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Products</h6>

                        <a href="product.php"><button style="background-color:#EB1616;font-weight:bolder;color:white;float:right;margin-bottom:5px;" class="btn">back to list</button></a>
                            <form autocomplete="off" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">products_name</label>
                                    <input type="text" name="products_name" class="form-control" >
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">product_description</label>
                                    <input type="text" name="product_description" class="form-control" >
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">product_keyword</label>
                                    <input type="text" name="product_keyword" class="form-control" >
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                  <select name="category" id="" class="form-control">
                                  <option value="">---Select---</option>
                                    <?php
                                    $queer= mysqli_query( $con,"Select * from `categories`");
                                    while( $st=mysqli_fetch_array($queer)){
                                    ?>

                                          <option value="<?php echo $st['cat_id'] ?>"><?php echo $st['cat_name'] ?> </option>
                <?php
                                    }
                ?>

                                  </select>
                                    
                                </div>
                                <div class="mb-2">
                                <label class="form-label">Brands</label>
                                  <select name="brands" id="" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                    $queer= mysqli_query( $con,"Select * from `brands`");
                                    while( $st=mysqli_fetch_array($queer)){
                                    ?>

                                          <option value="<?php echo $st['brand_id'] ?>"><?php echo $st['brand_name'] ?> </option>
                <?php
                                    }
                ?>

                                </div>
<br>
                                <div class="mb-3 ">
                                    <label class="form-label">products_image1</label>
                                    <input type="file" name="products_image1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">products_image2</label>
                                    <input type="file" name="products_image2" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">products_image3</label>
                                    <input type="file" name="products_image3" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">product_price</label>
                                    <input type="text" name="product_price" class="form-control">
                                </div>
                    
                               <div>
                  <button name="insert"  type="submit" class="btn"  style="background-color:#EB1616;font-weight:bolder;color:white;">ADD</button>
                             </div>
                            </form>
                        </div>
                    </div>













<?php
include('footer.php');
?>