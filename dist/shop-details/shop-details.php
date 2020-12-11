<?php include '../../includes/session.php'; 
$conn = $pdo->open();
?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>
<body onload="getShopDetails()">
<?php include '../navbar.php'; ?>
    <div class="container">
    <div class="col-md-12 m-auto">
      <div class="col-12 shop-title mb-4 mt-3">
        <h1>Hi Moa Admin! Welcome back !</h1>
        <span>Manage your Shops and other services here</span>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="addShop card">
            <a href="./shop-details/setup-shop.php">
              <div class="card-body">
                <i class="fas fa-plus"></i>
                <label for class="w-100">Add Shops</label>
              </div>
            </a>
          </div>
        </div>


        
        <div  id="shopList" class="row m-0"> 
      
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  function getShopDetails() {
    
            
              const shopName = document.getElementById("shopList");
           
              let getShop = "getShop";
              const data = 'type=' + getShop;
              axios
                  .post("./getShop.php", data)
                  .then(response => {
                      console.log("postcode", response.data.statusCode);
                      shopName.innerHTML = response.data.statusCode;
                  })
                  .catch(error => {
                      console.log("error", error);
                  })

          }
</script>