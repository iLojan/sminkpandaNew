<?php include '../../includes/session.php'; ?>
<?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body>
    <?php include '../navbar.php'; ?>

    <div class="container mt-5" id="productSetUpApp">
        <div class="card col-md-12">
            <div class="card-header">
                <h3>Product Details</h3>
                <span class="sub-title">List your property and Item selling!</span>
            </div>
            <input type="hidden" id="productId" value="<?php echo $_GET['id']?>">
            <div class="card-body form">
                <div class="row  pt-3 form-group">
                    <div class="col-md-4">
                        <label>Category</label>
                        <select class="form-control" v-model="product.category" @change="getSubCategory()">
                            <option v-for="item in categoryLists" :key="item.id" :value="item.id">{{item.category_name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="" v-if="product.category">
                    <div class="row  pt-3 form-group">
                        <div class="col-md-4">
                            <label>Sub Category</label>
                            <select class="form-control" v-model="product.subCategory">
                                <option v-for="subCategory in subCategoryLists" :key="subCategory.id"
                                    :value="subCategory.id">{{subCategory.sub_category_name}}</option>;

                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="row  pt-3 form-group">
                            <div class="col-md-12">
                                <label>Title</label>
                                <input type="text" @click="saveProduct()" class="form-control"
                                    v-model="product.title" />
                            </div>

                        </div>

                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label>Price Type</label>
                                <select class="form-control" v-model="product.priceType">
                                    <option value="fixed">Fixed</option>
                                    <option value="negotiable">Negotiable</option>
                                    <option value="on_call">On Call</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Price</label>
                                <input type="number" class="form-control" v-model="product.price" />
                            </div>
                            <div class="col-md-3">
                                <label>Quantity</label>
                                <input type="number" class="form-control" v-model="product.quantity" />
                            </div>
                        </div>

                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label>Brand</label>
                                <input type="text" class="form-control" v-model="product.brand">
                            </div>
                        </div>
                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label>Authenticity</label>

                                <input type="text" class="form-control" v-model="product.authenticity">
                            </div>
                        </div>

                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label> Product Condition</label>
                                <select class="form-control" v-model="product.productCondition">
                                    <option value="New with tags">New with tags</option>
                                    <option value="New without tags">New without tags</option>
                                    <option value="New with tags">New with defects</option>
                                    <option value="New without tags">Pre-owned</option>
                                    <option value="Used">Used</option>
                                </select>
                            </div>
                        </div>
                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label> Color</label>
                                <input type="text" class="form-control" v-model="product.Color" class="form-control">



                            </div>
                            <div class="col-md-4">
                                <label> Metal</label>
                                <input type="text" v-model="product.Metal" class="form-control">


                            </div>
                        </div>
                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label>Size</label>
                                <input type="text" class="form-control" v-model="product.Size">
                            </div>
                        </div>
                        <div class="row  pt-3 form-group">
                            <div class="col-md-4">
                                <label>width</label>
                                <input type="text" class="form-control" v-model="product.width">
                            </div>
                            <div class="col-md-4">
                                <label>height</label>
                                <input type="text" class="form-control" v-model="product.height">
                            </div>
                        </div>

                        <div class="row  pt-3 form-group">
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control" v-model="product.description" cols="30"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row  pt-3 form-group">
                            <div class="col-md-6">
                                <label>Set Features</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" v-model="feature.name"
                                        placeholder="Enate Features" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append " @click="addFeatures()">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fas fa-plus"></i>Add</span>
                                    </div>
                                </div>
                                <div class="row m-0" id="featureList">

                                    <li v-for="item in featureList" :key="item.id" v-if="item.name">
                                        {{item.name}}</li>
                                </div>



                            </div>
                        </div>
                        <div class="row m-0">

                            <div class="col-lg-12 ">
                                <label>Image</label>
                                <div class="file-area">
                                    <input type="file" id="image" class="box__file" accept="image/*"
                                        @change="uploadImage($event)" multiple>
                                    <div class="file-dummy">
                                        <i class="fas fa-upload"></i>
                                        <span class="default">Click to select a file, or drag it here</span>
                                        <span class="success">Great, your file is selected</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div v-for="item in imgUrl" :key="item.id">
                                        <div id="preview" class="preview">
                                            <img :src="'../../images/'+item" alt="" srcset="">
                                        </div>
                                    </div>
                                    <div v-for="item in product.url" :key="item.id" v-if="item.url">
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
                        <div class="row  pt-3 form-group">
                            <div class="col-md-12 text-right mt-4">
                                <button @click="saveProperty()" class="btn btn-primary col-md-4"><i
                                        class="far fa-save"></i>
                                    Save</button>
                            </div>
                        </div>
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
            categoryLists: '',
            subCategoryLists: '',
            featureList: [],
            product: {
                id: 0,
                category: "",
                subCategory: "",
                title: "",
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
                    '&title=' + this.product.title +
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