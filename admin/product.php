<?php
include('header.php');
// Add these debug lines before executing the query


if (isset($_GET['del'])) {
    $del = mysqli_query($con, "DELETE FROM `products` WHERE pro_id= '" . $_GET['delete_id'] . "'");
}

// Pagination variables
$limit = 5; // Number of items to display per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number

// Calculate the offset for the SQL query
$offset = ($page - 1) * $limit;

// Count total rows in the products table
$totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `products`"));

// Calculate the total number of pages
$totalPages = ceil($totalRows / $limit);

// Query to fetch products with pagination

?>

</script>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-10 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="product_add.php"><button style="background-color:#EB1616;font-weight:bolder;color:white;float:right;margin-bottom:5px;" class="btn">Add New</button></a>
                            <h6 class="mb-4">Products list</h6>
                                
                            

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">pro_id</th>
                                        <th scope="col">pro_name</th>
                                        <th scope="col">pro_description</th>
                                        <th scope="col">pro_keyword</th>
                                        <th scope="col">cat_id</th>
                                        <th scope="col">brand_id</th>
                                        <th scope="col">pro_image1</th>
                                      
                                        <th scope="col">pro_price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    <?php
$sqlq=mysqli_query($con,"SELECT * FROM `products` LIMIT $limit OFFSET $offset" );
 while( $st=mysqli_fetch_array($sqlq)){
?>



                                        <td ><?php echo $st['pro_id'] ?></td>
                                        <td><?php echo $st['pro_name'] ?>  </td>
                                        <td><?php echo $st['pro_description']?>  </td>
                                        <td><?php echo $st['pro_keyword'] ?>  </td>
                                        <td><?php echo $st['cat_id'] ?>  </td>
                                        <td><?php echo $st['brand_id'] ?>  </td>

                                        <td>
                                            
                                        <img src=" <?php echo $st['pro_image1'] ?>" width="150px" height="150px" alt="">
                                    
                                   </td>
    
                                        <td>    <?php echo $st['pro_price'] ?></td>
                                        <td>
                                            
                                     <a href="product.php?del&delete_id=<?php echo $st['pro_id']?>">   <button style="background-color:#EB1616;font-weight:bolder;color:white; margin-right:10px;"  class="btn">Delete</button></a>
                                
                                        
                                        
                                    </tr>
                        <?php
 }
                        ?>
                                </tbody>
                            </table>

</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="product.php?page=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php } ?>
        <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="product.php?page=<?php echo $page + 1; ?>">Next</a>
        </li>
    </ul>
</nav>

                        </div>
                    </div>
            </div>
            <?php


    
include('footer.php');
?>

