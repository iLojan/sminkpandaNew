<?php include '../../includes/session.php'; ?>
  <?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

  <?php include '../header.php'; ?>
<body onload="getShopDetails()">
<?php include '../navbar.php'; ?>
    <div class="container">
    <div>
    <div class="row mt-5">
      <div class="col-md-12 m-auto">
        <!-- Editable table -->
        <div class="card">
          <div class="card-header shop-header font-weight-bold text-uppercase py-3">
          <input type="hidden" id="shopId" value="<?php echo $_GET['a']?>">
            <h3 class="m-0">Shops List</h3>
            <span>
              <a href="./product-setup.php?shopId=<?php echo $_GET['a']?>">
                <i class="fas fa-plus"></i> Add Item
              </a>
            </span>
          </div>
          <div class="card-body">
            <div id="table" class="table-editable">
              <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                  <tr>
                    <th class="text-center">Product title</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Sub category name</th>
                    <th class="text-center">#</th>
                  </tr>
                </thead>
                <tbody id="productList">
               
                  <!-- This is our clonable table line -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Editable table -->
      </div>
    </div>
  </div>
  </div>

</body>
<script>
  function getShopDetails() {
    
            
              const shopName = document.getElementById("productList");
              const shopId = document.getElementById("shopId");
              let getShop = "product-list";
              const data = 'type=' + getShop+'&shopId='+shopId.value;
              axios
                  .post("./product.php", data)
                  .then(response => {
                      console.log("postcode", response.data.statusCode);
                      shopName.innerHTML = response.data.statusCode;
                  })
                  .catch(error => {
                      console.log("error", error);
                  })

          }
</script>