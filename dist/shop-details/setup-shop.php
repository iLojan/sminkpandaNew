  <?php include '../../includes/session.php'; ?>
  <?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

  <?php include '../header.php'; ?>

  <body onload="getShopDeatils()">
      <?php include '../navbar.php'; ?>

      <div class="container mt-5">
          <div class="col-md-12 m-auto">
              <div class="card border-0">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 mb-5 mt-3 shop-title">
                              <h3>Shop Details</h3>
                              <span>List your property and Item selling!</span>
                          </div>
                          <div class="col-12">
                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Shop Name</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="shopName" class="form-control input-max-width">
                                  </div>
                              </div>

                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Mobile Numbe</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="mobile" class="form-control input-max-width">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Email</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="email" class="form-control input-max-width">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Address line 1</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="addressLine1" class="form-control input-max-width">
                                  </div>
                              </div>

                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Address line 2</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="addressLine2" class="form-control input-max-width">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">City</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="city" class="form-control input-max-width">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-lg-2">
                                      <label for="">Postcode</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <input type="text" id="postcode" class="form-control input-max-width">
                                  </div>
                              </div>
                              <div class="row form-group row">
                                  <div class="col-lg-2">
                                      <label for="">Postcode</label>
                                  </div>
                                  <div class="col-lg-8 ">
                                      <div class="dropzone"></div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                      <div class="col-lg-4 ">
                                          <button onClick="saveShops()" class="btn btn-primary">Save</button>
                                      </div>

                               
                                  <input type="hidden" id="shopId" value="<?php echo $_GET['a']?>">
                              </div>


                          </div>
                      </div>

                  </div>
              </div>
          </div>
          <script>
          //Disabling autoDiscover
          Dropzone.autoDiscover = false;
          var url = [];
          const shopName = document.getElementById("shopName");
          const shopId = document.getElementById("shopId")
          const mobile = document.getElementById("mobile");
          const email = document.getElementById("email");
          const addressLine1 = document.getElementById("addressLine1");
          const addressLine2 = document.getElementById("addressLine2");
          const postcode = document.getElementById("postcode");
          const city = document.getElementById("city");
          $(function() {
              //Dropzone class
              var myDropzone = new Dropzone(".dropzone", {
                  url: "../common-service/upload.php",
                  paramName: "file",
                  maxFilesize: 2,
                  maxFiles: 10,
                  acceptedFiles: "image/*,application/pdf",
                  success: function(file, response) {
                      console.log(file.name);
                      console.log(response);
                      url.push(file.name);
                  }
              });
          });

          function saveShops() {


              let setUpShop = "setUpShop";
              const data = 'type=' + setUpShop + '&shopName=' + shopName.value + '&mobile=' + mobile.value + '&email=' +
                  email.value +
                  '&addressLine1=' + addressLine1.value + '&addressLine2=' + addressLine2.value + '&city=' + city
                  .value + '&postcode=' +
                  postcode.value + "&url=" + url + "&city=" + city.value+"&shopId="+shopId.value
              axios
                  .post("shop.php", data)
                  .then(response => {
                      console.log("postcode", response);
                  })
                  .catch(error => {
                      console.log("error", error);
                  })

          }

          function getShopDeatils() {
              let getShop = "getShopById";
              const data = 'type=' + getShop + '&shopId=' + shopId.value;
              axios
                  .post("./getShop.php", data)
                  .then(response => {
                      console.log("postcode", response.data.statusCode.id);
                      shopId.value = response.data.statusCode.id;
                      shopName.value = response.data.statusCode.name
                      mobile.value = response.data.statusCode.mobile;
                      email.value = response.data.statusCode.email
                      addressLine1.value = response.data.statusCode.addressLine1;
                      addressLine2.value = response.data.statusCode.addressLine2
                      city.value = response.data.statusCode.city;
                      postcode.value = response.data.statusCode.postcode;
                  })
                  .catch(error => {
                      console.log("error", error);
                  })
          }
          </script>
      </div>
  </body>