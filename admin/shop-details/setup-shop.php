  <?php include '../../includes/session.php'; ?>
  <?php
  
	// if(!isset($_SESSION['user'])){
	// 	header('location: ../../includes/signin.php');
	// }
?>

  <?php include '../header.php'; ?>

  <body class="bg-gray-50">
      <?php include '../navbar.php'; ?>
      <div class="container mt-5" id="shopSetupApp">

          <div class="flex justify-center bg-gray-50 py-12 px-4 sm:px-12 lg:px-8">
              <div class="max-w-md w-full space-y-8">
                  <div>

                      <h2 class="mt-6 text-center text-2xl font-extrabold text-gray-900">
                          Shop Details

                      </h2>
                      <p class="mt-2 text-center text-sm text-gray-600">
                          List your property and Item selling!
                      </p>
                  </div>
              </div>
          </div>
          <div class="w-full md:w-4/5 lg:w-3/4 text-center m-auto">

              <div class="mt-5 md:mt-0 md:col-span-2">
                  <form action="#" method="POST">
                      <div class="shadow overflow-hidden sm:rounded-md text-left">
                          <div class="px-4 py-5 bg-white sm:p-6">
                              <div class="grid grid-cols-6 gap-6">

                                  <div class="col-span-6 ">
                                      <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                          name</label>
                                      <input type="text" v-model="shop.name" autocomplete="off" :class="inputClassName">
                                  </div>

                                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                      <label for="city" class="block text-sm font-medium text-gray-700">Mobile
                                          Number</label>
                                      <input type="text" v-model='shop.mobile' id="city" :class="inputClassName">
                                  </div>

                                  <div class="col-span-6 sm:col-span-4">
                                      <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                          address</label>
                                      <input type="text" v-model='shop.email' autocomplete="off"
                                          :class="inputClassName">
                                  </div>



                                  <div class="col-span-6">
                                      <label for="street_address"
                                          class="block text-sm font-medium text-gray-700">Address Line 1</label>
                                      <input type="text" v-model="shop.addressLine1" autocomplete="off"
                                          :class="inputClassName">
                                  </div>
                                  <div class="col-span-6">
                                      <label for="street_address"
                                          class="block text-sm font-medium text-gray-700">Address Line 2</label>
                                      <input type="text" v-model="shop.addressLine2" autocomplete="off"
                                          :class="inputClassName">
                                  </div>



                                  <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                      <label for="state" class="block text-sm font-medium text-gray-700">Postcode
                                      </label>
                                      <input type="text" v-model="shop.postcode" :class="inputClassName">
                                  </div>
                                  <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                      <label for="state" class="block text-sm font-medium text-gray-700">State /
                                          City</label>
                                      <input type="text" v-model="shop.city" :class="inputClassName">
                                  </div>

                                  <div class="col-span-6">
                                      <label class="block text-sm font-medium text-gray-700">
                                          Cover photo
                                      </label>
                                      <div
                                          class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                          <div class="space-y-1 text-center">
                                              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                  fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                  <path
                                                      d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                              </svg>
                                              <div class="flex text-sm text-gray-600">
                                                  <label for="file-upload"
                                                      class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                      <span>Upload a file</span>
                                                      <input type="file" id="file-upload" name="file-upload"
                                                          accept="image/*" @change="uploadImage($event)" multiple
                                                          class="sr-only">
                                                  </label>
                                                  <p class="pl-1">or drag and drop</p>
                                              </div>
                                              <p class="text-xs text-gray-500">
                                                  PNG, JPG, GIF up to 10MB
                                              </p>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div v-for="item in url" :key="item.id">
                                              <div id="preview" class="preview">
                                                  <img :src="'../../images/'+item" alt="" srcset="">
                                              </div>
                                          </div>
                                          <div v-for="item in shop.url" :key="item.id">
                                              <div id="preview" class="preview">
                                                  <img :src="'../../images/'+item.url" alt="" srcset="">
                                                  <div class="img-delete-main">
                                                      <i class="fas fa-trash"></i>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="" vfo></div>
                                      </div>
                                  </div>
                              </div>


                          </div>
                      </div>

                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button type="submit" @click="saveShops()"
                              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              Save
                          </button>
                      </div>
              </div>
              </form>
          </div>
      </div>
      </div>




      <div class="modal fade add-story-popup" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <!-- <div class="modal-header border-0"></div> -->
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                  <div class="modal-body text-center pl-5 pr-5 mt-3">
                      <label class="error-icon text-success">
                          <i class="fas fa-exclamation-triangle"></i>
                      </label>
                      <span class="text-success" style="16px"> saved successfully'</span>
                  </div>
                  <div class="modal-footer border-0 pt-0" style="justify-content: center;">
                      <button type="button" @click="navigateToShopMain()" class="btn btn-outline-success"
                          data-dismiss="modal">Close</button>
                      <!--  -->
                  </div>
              </div>
          </div>
      </div>
      </div>
  </body>
  <script>
var application = new Vue({
    el: '#shopSetupApp',
    data: {
        inputClassName: 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-200 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3',
        shop: {
            id: '',
            name: '',
            mobile: '',
            email: '',
            addressLine1: '',
            addressLine2: '',
            city: '',

            postcode: '',
            type: 'setUpShop'
        },
        url: [],
        item: {
            //...
            image: null,
            imageUrl: null
        },
        test: "test"

    },
    methods: {

        uploadImage(event) {

            console.log("event", event);
            for (let i = 0; i < event.target.files.length; i++) {

                const file = event.target.files[i]
                this.image = file
                this.item.imageUrl = URL.createObjectURL(file);

                console.log("test", URL.createObjectURL(file));
                const URLUP = '../common-service/upload.php';

                let data = new FormData();
                data.append('name', 'my-picture');
                data.append('file', event.target.files[i]);

                let config = {
                    header: {
                        'Content-Type': 'image/png'
                    }
                }

                axios.post(URLUP, data, config).then(
                    response => {
                        this.url.push(response.data.url)
                        console.log('image upload response > ', this.shop)
                    }
                )
            }
        },
        getShopDeatils: function() {
            let urlParams = new URLSearchParams(window.location.search);
            console.log(urlParams.has('a')); // true
            console.log(urlParams.get('a')); // "MyParam"
            if (urlParams.has('a')) {
                this.shop.id = urlParams.get('a')
            }
            let getShop = "getShopById";
            const data = 'type=' + getShop + '&shopId=' + this.shop.id;
            axios
                .post("./getShop.php", data)
                .then(response => {
                    console.log("postcode", response.data);
                    if (this.shop.id) {
                        this.shop = response.data
                    }

                })
                .catch(error => {
                    // $('.add-story-popup').modal('show');
                    console.log("error", error);

                })
        },
        saveShops: function() {
            console.log("shop details", this.shop);
            let getShop = "setUpShop";
            const data = 'type=' + getShop +
                '&name=' + this.shop.name +
                '&mobile=' + this.shop.mobile +
                '&email=' + this.shop.email +
                '&addressLine1=' + this.shop.addressLine1 +
                '&addressLine2=' + this.shop.addressLine2 +
                '&postcode=' + this.shop.postcode +
                '&url=' + this.url +
                '&shopId=' + this.shop.id +
                '&city=' + this.shop.city;
            axios
                .post("./shop.php", data)
                .then(response => {
                    console.log("postcode", response.data);
                    $('.add-story-popup').modal('show');

                })
                .catch(error => {
                    console.log("error", error);
                })
        },
        onChange(e) {
            const file = e.target.files[0]
            this.image = file
            this.item.imageUrl = URL.createObjectURL(file);
            console.log("this.item", file)
        },
        navigateToShopMain() {
            window.open('../shop-details/', '_self');
        },
        //   var myDropzone = new Dropzone(".dropzone", {
        //           url: "../common-service/upload.php",
        //           paramName: "file",
        //           maxFilesize: 2,
        //           maxFiles: 10,
        //           acceptedFiles: "image/*,application/pdf",
        //           success: function(file, response) {
        //               console.log(file.name);
        //               console.log(response);
        //               url.push(file.name);
        //           }
        //       });

    },
    created: function() {


        this.getShopDeatils();

    },
})
  </script>

  <style lang="scss">

  </style>