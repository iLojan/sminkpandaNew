<?php include '../../includes/session.php'; ?>
<?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container" id="productListApp">
        <div class="col-md-12 m-auto">
            <div class="col-12 shop-title mb-4 mt-3">
                <h1>Hi Moa Admin! Welcome back ! </h1>
                <span>Manage your Shops and other services here</span>
            </div>
            <input type="hidden" id="shopId" value="<?php echo $_GET['a']?>">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Product title</th>
                        <th scope="col">Category</th>
                        <th scope="col"> Sub category name</th>
                        <th scope="col">
                            <div class="w-100 text-right">
                                <a class="btn btn-primary" @click="addNewItem()">

                                    <i class="fas fa-plus"></i>
                                    <label for class="mb-0"> Add Shops</label>
                                </a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in product" :key="index" v-if="item.title">

                        <th scope="row">{{item.id}}</th>
                        <td>{{item.title}}</td>
                        <td>{{item.category_name}}</td>
                        <td>{{item.sub_category_name}}</td>
                        <td> <span class="table-remove">
                                <a href="./product-setup.php?id=product.id&shop_id='.$shopId.'"></a>
                                <a type="button" class="btn btn-success" @click="editProperty(item.id,item.shop_id)"><i
                                        class="fas fa-edit"></i>Edit</a>
                                <button type="button" class="btn btn-secondary"
                                    @click="removeProperty(item.id)">Remove</button>
                            </span></td>
        </div>
        </tr>
        </tbody>
        </table>


    </div>
    </div>
    </div>

</body>
<script>
var application = new Vue({
    el: '#productListApp',
    data: {
        product: {},
    },
    methods: {
        getShopDetails: function() {
            let url = window.location.search.substring(1);
            let params = new URLSearchParams(url);

            this.product.shop_id = params.get("a");
            let getShop = "product-list";
            const data = 'type=' + getShop + '&shopId=' + this.product.shop_id;
            axios
                .post("./product.php", data)
                .then(response => {
                    console.log("postcode", response.data);
                    this.product = response.data;
                    console.log("this.product", this.product);
                })
                .catch(error => {
                    console.log("error", error);
                })
        },
        editProperty(id, shopId) {
            window.location.href = `./product-setup.php?id=${id}&shop_id=${shopId}&type=save`;
        },
        addNewItem() {
            let url = window.location.search.substring(1);
            let params = new URLSearchParams(url);

            let shoId = params.get("a");
            window.location.href = `./product-setup.php?shop_id=${shoId}&type=save`;

        }
    },
    created: function() {

        this.getShopDetails();
    }
});
</script>