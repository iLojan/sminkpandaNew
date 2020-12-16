<div class="mb-5">
    <div class="row">
        <!-- Deal -->

        <!-- End Deal -->
        <!-- Tab Prodcut -->
        <div class="col">
            <!-- Features Section -->
            <div class="">
                <!-- Nav Classic -->
                <div class="position-relative bg-white text-center z-index-2">
                    <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="pills-one-example1-tab" data-toggle="pill"
                                href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                aria-selected="true">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    On Sale <?php  echo $_GET['name']; ?>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- End Nav Classic -->


                <!-- SELECT * FROM product p
inner join category c 
on c.id = p.category 
inner join subcategory sc 
on sc.id = p.subCategory 
where c.name ="Fashion & Beauty" or sc.name = "".$_GET['name']. -->


                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab">
                        <ul class="row list-unstyled products-group no-gutters shop-grid-main">
                            <?php
                     $stmt = $conn->prepare("SELECT p.id, 
                     p.name as property_name,
                     p.price,
                     p.quantity,c.name as category_name,
                     sc.name as subcategory_name FROM 
                     product p inner join category c on c.id = p.category 
                     inner join subcategory sc on sc.id = p.subCategory 
                     where c.name ='' or sc.name ='Clothing' ");
                     $stmt->execute();
                     foreach($stmt as $row){
                    ?>


                            <div class="main-menu-box">

                                <div class="mb-2">
                                    <a class="font-size-12 text-gray-5"><?php echo $row['subcategory_name']; ?></a>
                                </div>
                                <h5 class="mb-1 product-item__title"><a
                                        class="text-blue font-weight-bold"><?php echo $row['property_name']; ?></a>
                                </h5>


                                <div class="menu-icon">
                                    <?php 
                                                                
                                    $product_id = $row['id'];
                                    $stmt = $conn->prepare("SELECT * FROM product_images where product_id = $product_id LIMIT 1");
                                    $stmt->execute();
                                    foreach($stmt as $rowImg){
                                      echo $rowImg['url'];
                                    ?>
                                    <img class="img-fluid" src="./images/<?php echo $rowImg['url'];?>"
                                        alt="Image Description">


                                    <?php } ?>

                                </div>
                                <div class="text-gray-100">Rs.<?php echo $row['price']; ?></div>



                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a class="add-btn " href="./item-details.php?id=<?php echo $row['id']; ?>"><i
                                            class="fas fa-cart-arrow-down"></i>Buy</a>

                                </div>

                            </div>


                            <?php } ?>
                        </ul>
                    </div>

                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Features Section -->
        </div>
        <!-- End Tab Prodcut -->
    </div>
</div>