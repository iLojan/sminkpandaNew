<?php include '../../includes/session.php'; ?>
<?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body class="bg-gray-50">
    <?php include '../navbar.php'; ?>

    <div class="container mt-5" id="productSetUpApp">


        <div class="flex justify-center bg-gray-50 py-12 px-4 sm:px-12 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>

                    <h2 class="mt-6 text-center text-2xl font-extrabold text-gray-900">
                        Product Details

                    </h2>
                    <input type="hidden" id="productId" value="<?php echo $_GET['id']?>">
                    <p class="mt-2 text-center text-sm text-gray-600">
                        List your property and Item selling!
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-4/5 lg:w-3/4 text-center m-auto">

            <div class="mt-5 md:mt-0 md:col-span-2">
                
                    <div class="shadow overflow-hidden sm:rounded-md text-left">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="first_name" :class="labelStyle">Category</label>
                                    <select :class="inputClassName" v-model="product.category"
                                        @change="getSubCategory()">
                                        <option v-for="item in categoryLists" :key="item.id" :value="item.id">
                                            {{item.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!--  -->
                            <div class="grid grid-cols-6 gap-6 pt-6" v-if="product.category">
                                <div class="col-span-6 lg:col-span-2">
                                    <label :class="labelStyle">Sub Category</label>
                                    <select :class="inputClassName" v-model="product.subCategory">
                                        <option v-for="subCategory in subCategoryLists" :key="subCategory.id"
                                            :value="subCategory.id">{{subCategory.name}}</option>

                                    </select>
                                </div>
                                <div class="col-span-6 lg:col-span-4 lg:col-start-1">
                                    <label :class="labelStyle">Title</label>
                                    <input type="text" @click="saveProduct()" :class="inputClassName"
                                        v-model="product.name" />
                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label>Price Type</label>
                                    <select :class="inputClassName" v-model="product.priceType">
                                        <option value="fixed">Fixed</option>
                                        <option value="negotiable">Negotiable</option>
                                        <option value="on_call">On Call</option>
                                    </select>
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label>Price</label>
                                    <input type="number" :class="inputClassName" v-model="product.price" />
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label>Quantity</label>
                                    <input type="number" :class="inputClassName" v-model="product.quantity" />
                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label>Brand</label>
                                    <input type="text" :class="inputClassName" v-model="product.brand">
                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label>Authenticity</label>
                                    <input type="text" :class="inputClassName" v-model="product.authenticity">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label> Product Condition</label>
                                    <select :class="inputClassName" v-model="product.productCondition">
                                        <option value="New with tags">New with tags</option>
                                        <option value="New without tags">New without tags</option>
                                        <option value="New with tags">New with defects</option>
                                        <option value="New without tags">Pre-owned</option>
                                        <option value="Used">Used</option>
                                    </select>
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label> Color</label>
                                    <input type="text" :class="inputClassName" v-model="product.Color"
                                        :class="inputClassName">

                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label> Metal</label>
                                    <input type="text" v-model="product.Metal" :class="inputClassName">
                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label>Size</label>
                                    <input type="text" :class="inputClassName" v-model="product.Size">
                                </div>
                                <div class="col-span-6 lg:col-span-2 lg:col-start-1">
                                    <label>width</label>
                                    <input type="text" :class="inputClassName" v-model="product.width">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label>height</label>
                                    <input type="text" :class="inputClassName" v-model="product.height">
                                </div>
                                <div class="col-span-6 lg:col-span-6">
                                    <label>Description</label>
                                    <textarea :class="inputClassName" v-model="product.description" cols="30"
                                        rows="5"></textarea>

                                </div>
                                <div class="col-span-6 lg:col-span-4">

                                    <label>Set Features</label>
                                    <div class="grid grid-cols-6 ">
                                        <div class="col-span-5 lg:col-span-4">
                                            <input type="text" :class="inputClassName" v-model="feature.name"
                                                placeholder="Enate Features" aria-label="Recipient's username"
                                                aria-describedby="basic-addon2">

                                        </div>
                                        <div class="col-span-1 lg:col-span-1">
                                            <div class="inline-flex justify-center py-2.5 mt-1 px-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 text-white"
                                                @click="addFeatures()">
                                                <span class="input-group-text" id="basic-addon2">Add</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0" id="featureList">

                                        <li v-for="item in featureList" :key="item.id" v-if="item.name">
                                            {{item.name}}</li>
                                    </div>
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
                                        <div v-for="item in imgUrl" :key="item.id">
                                            <div id="preview" class="preview">
                                                <img :src="'../../images/'+item" alt="" srcset="">
                                            </div>
                                        </div>
                                        <div v-for="item in product.url" :key="item.id">
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

                                <div class="col-span-6 lg:col-span-4"></div>
                                <div class="col-span-6 lg:col-span-4"></div>
                                <div class="col-span-6 lg:col-span-4"></div>
                                <div class="col-span-6 lg:col-span-4"></div>

                            </div>

                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button  @click="saveProperty()"
                                class="inline-flex justify-center py-2.5 px-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
               
            </div>
        </div>

      

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade add-product-popup" id="editAlert" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="alert-mgs">Successfully saved</p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <input type="text" class="shop-id" id="shopId" value="<?php echo $_GET['shop_id']?>"> -->

    </div>
    <script>
    var application = new Vue({
        el: '#productSetUpApp',
        data: {
            inputClassName: 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-200 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3',
            labelStyle: "block text-sm font-medium text-gray-700",
            categoryLists: '',
            subCategoryLists: '',
            featureList: [],
            product: {
                id: 0,
                category: "",
                subCategory: "",
                name: "",
                priceType: "",
                price: "",
                productCondition: "",
                brand: "",
                authenticity: "",
                description: "",
                shopId: "",
                create_date: "",
                quantity: "",
                Metal: "",
                Color: "",
                Size: "",
                width: "",
                height: "",
                url: [{
                        id: "",
                        url: "",
                        isMain: null,
                        product_id: "",
                        create_date: ""
                    },

                ],
                feature: [{
                        id: "0",
                        name: ""
                    }

                ]
            },
            feature: {
                name: null,
                id: null
            },
            item: {
                //...
                image: null,
                imageUrl: null
            },
            imgUrl: []
        },
        methods: {
            addFeatures: function() {
                this.featureList.push({
                        ...this.feature
                    }

                );

                this.product.feature = this.featureList

            },
            uploadImage(event) {


                for (let i = 0; i < event.target.files.length; i++) {

                    const file = event.target.files[i]
                    this.image = file
                    this.item.imageUrl = URL.createObjectURL(file);

                    const URLUP = '../common-service/upload.php';

                    let data = new FormData();
                    data.append('name', 'my-picture');
                    data.append('file', event.target.files[i]);

                    let config = {
                        header: {
                            'Content-Type': 'image/png'
                        }
                    }

                    axios.post(
                        URLUP,
                        data,
                        config
                    ).then(
                        response => {

                            this.imgUrl.push(response.data.url)

                        }
                    )
                }
            },
            loadData: function() {
                let url = window.location.search.substring(1);
                let params = new URLSearchParams(url);
                this.product.id = params.get("id");
                this.product.shopId = params.get("shop_id");
                this.getProductDetails();
                this.getCategory();
            },
            getProductDetails: function() {


                if (this.product.id) {
                    let getShop = "getproductById";
                    const data = 'type=' + getShop + '&productId=' + this.product.id;
                    axios
                        .post("./product.php", data)
                        .then(response => {

                            this.product = response.data;
                            if (this.product.category) {
                                this.getSubCategory();
                            }
                            this.featureList = this.product.feature;



                        })
                        .catch(error => {
                            console.log("error", error);
                        })
                }
            },

            getSubCategory: function() {


                let getShop = "subCategory";
                const data = 'type=' + getShop + '&id=' + this.product.category;
                axios
                    .post("./product.php", data)
                    .then(response => {

                        this.subCategoryLists = response.data;
                    })
                    .catch(error => {
                        console.log("error", error);
                    })
            },
            getCategory: function() {

                let getShop = "getCategory";
                const data = 'type=' + getShop;
                axios
                    .post("./product.php", data)
                    .then(response => {

                        this.categoryLists = response.data;
                    })
                    .catch(error => {
                        console.log("error", error);
                    })

            },
            saveProperty: function() {

                console.log(this.product.feature);
                let setUpShop = "save";
                const data = 'type=' + setUpShop +
                    '&category=' + this.product.category +
                    '&subCategory=' + this.product.subCategory +
                    '&title=' + this.product.name +
                    '&priceType=' + this.product.priceType +
                    '&price=' + this.product.price +
                    '&quantity=' + this.product.quantity +
                    '&brand=' + this.product.brand +
                    "&url=" + this.imgUrl +
                    "&authenticity=" + this.product.authenticity +
                    "&description=" + this.product.description +
                    "&productCondition=" + this.product.productCondition +
                    "&shopId=" + this.product.shopId +
                    "&featureList=" + JSON.stringify(this.product.feature) +
                    "&id=" + this.product.id
                axios
                    .post("./product.php", data)
                    .then(response => {
                        $('.add-product-popup').modal('show');
 window.open('./product-list.php', '_self');
                    })
                    .catch(error => {
                        console.log("error", error);
                    })
            }


        },
        created: function() {
            this.loadData();
        },
    });
    </script>
    <style>
    #featureList li {
        padding-right: 12px;
    }

    #basic-addon2 {
        padding: 0 24px;
        font-weight: 600;
    }

    #basic-addon2 i {
        padding-right: 6px;
    }
    </style>
    </div>
</body>