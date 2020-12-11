<?php
include './includes/session.php'; 
include './includes/clientHeader.php';
   $conn = $pdo->open();
   ?>

<body id="getDetails">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <?php
           include './includes/scripts.php'; 
           ?>
    <!-- ========== HEADER ========== -->
    <?php
      include './header.php'; 
   ?>

    <main id="content" role="main">


        <?php
        include './indexBanner.php'; 
       ?>
        <div class="container">

            <?php
         include './viewAllShops.php'; 
           ?>

            <?php
           include './onSale.php'; 
           ?>
        </div>

    </main>


    <?php
           include './includes/clientFooter.php'; 
           ?>



    <!-- ========== END MAIN CONTENT ========== -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    // <!-- ========== FOOTER ========== -->