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
                                    On Sale
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- End Nav Classic -->

                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab">
                        <ul class="row list-unstyled products-group no-gutters shop-grid-main">
                            <?php
                     $stmt = $conn->prepare("SELECT p.id,p.name as title,p.brand,p.productCondition,p.price,p.priceType,p.authenticity,p.description,s.id 
                     as shop_id,s.name as shop_name,c.id as category_id,c.name as category_name,sc.id 
                     as sub_c_id,sc.name as sub_category_name 
                     FROM product p INNER JOIN shops s on p.shopId = s.id 
                     INNER JOIN category c on p.category = c.id 
                     INNER JOIN subcategory sc on p.subCategory = sc.id");
                     $stmt->execute();
                     foreach($stmt as $row){
                    ?>


                            <div class="main-menu-box">
                                <div class="mb-2"><a href=""
                                        class="font-size-12 text-gray-5"><?php echo $row['shop_name']; ?></a></div>
                                <h5 class="mb-1 product-item__title"><a href="../ "
                                        class="text-blue font-weight-bold"><?php echo $row['title']; ?></a></h5>


                                <div class="menu-icon">
                                    <?php 
                                                                
                                    $product_id = $row['id'];
                                    $stmt = $conn->prepare("SELECT * FROM product_images where product_id = $product_id LIMIT 1");
                                    $stmt->execute();
                                    foreach($stmt as $rowImg){
                                    ?>
                                    <img class="img-fluid" src="./images/<?php echo $rowImg['url'];?>"
                                        alt="Image Description"></a>
                                    <?php } ?>

                                </div>
                                <div class="text-gray-100">Rs.<?php echo $row['price']; ?></div>



                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <button class="add-btn"><i class="fas fa-cart-arrow-down"></i>Add to cart</button>

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