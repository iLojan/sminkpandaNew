     <!-- Recently viewed -->


     <div class="space-top-2">
         <dv
             class=" d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
             <h3 class="section-title mb-0 pb-2 font-size-22">Bestsellers</h3>
         </dv>
         <div class="js-slick-carousel u-slick u-slick--gutters-2 overflow-hidden u-slick-overflow-visble pt-3 pb-6"
             data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
             <div class="js-slide">
                 <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible shop-grid-main">

                     <?php
                     $stmt = $conn->prepare("SELECT * FROM shops");
                     $stmt->execute();
                     foreach($stmt as $row){
                    ?>


                     <div class="main-menu-box">

                         <div class="menu-icon">
                             <?php 
                                    $shopId = $row['id'];
                                    $stmt = $conn->prepare("SELECT * FROM shop_images where shop_id = $shopId LIMIT 1");
                                    $stmt->execute();
                                    foreach($stmt as $rowImg){
                                    ?>
                             <img class="img-fluid" src="./images/<?php echo $rowImg['url'];?>"
                                 alt="Image Description"></a>
                             <?php } ?>

                         </div>
                         <div class="menu-title"> <?php echo $row['name']; ?></div>
                         <div class="main-desc"><?php echo $row['city']; ?></div>
                     </div>


                     <?php } ?>
                 </ul>
             </div>

         </div>
     </div>