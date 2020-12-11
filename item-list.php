<?php
include './includes/session.php'; 
include './includes/clientHeader.php';
   $conn = $pdo->open();
   ?>

<body id="getDetails">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- ========== HEADER ========== -->
    <?php
      include './itemHeader.php'; 
   ?>
    <main id="content" role="main">
        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <?php include './item-left-menu.php'; ?>
                    <?php include './item-filter.php'; ?>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <?php include './seach-item-list.php'; ?>
                </div>
            </div>
        </div>
    </main>


    <!-- ========== END MAIN CONTENT ========== -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    const getDetails = () => {
        alert("test")
        const shopList = document.getElementById("shop_list");
        let getShop = "getShop";
        const data = 'type=' + getShop;
        axios
            .post("./getDetails.php", data)
            .then(response => {
                console.log("postcode", response.data.statusCode);
                shopList.innerHTML = response.data.statusCode;
            })
            .catch(error => {
                console.log("error", error);
            })

    }
    </script>
    <!-- ========== FOOTER ========== -->
    <?php
   include './includes/scripts.php';
   ?>