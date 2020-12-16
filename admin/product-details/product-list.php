<?php include '../../includes/session.php'; ?>
<?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body class="bg-gray-50">







    <?php include '../navbar.php'; ?>


    <div class="container" id="productListApp">
        <div class="w-full lg:w-4/5 m-auto">

            <div class="grid grid-cols-8 gap-6 px-4">
                <div class="col-span-8">
                    <div class="text-center my-5">
                        <h1 class="mt-6 text-center text-2xl font-extrabold text-gray-900">Hi Moa Admin! Welcome back !
                        </h1>
                        <span class="mt-2 text-center text-sm text-gray-600">Manage your Shops and other services
                            here</span>
                    </div>
                    <input type="hidden" id="shopId" value="<?php echo $_GET['a']?>">
                    <div class="w-100 text-right my-4">
                        <a class="px-5 py-1 my-4 rounded text-white text-sm bg-color" @click="addNewItem()">

                            <!-- <svg class="text-xs" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg> -->
                            <label for class="mb-0"> Add Shops</label>
                        </a>
                    </div>
                </div>
                <div class="col-span-8 lg:col-span-2 md:col-span-3" v-for="(item,index) in product" :key="index"
                    v-if="item.title">
                    <div class="bg-white rounded overflow-hidden shadow-md">
                        <div class=""
                                                v-for="(code,index) in (item.images.split(','))" v-if="index < 1">
                        <img :src='"../../images/"+code' class="w-full lg:h-40 h-44" alt=""
                            srcset="">
                        <div class="m-4">
                            <span class="font-bold">{{item.title}}</span>
                            <span class="block text-gray500 text-sm">{{item.sub_category_name}}</span>
                            <span class="table-remove block mt-4">
                                <a href="./product-setup.php?id=product.id&shop_id='.$shopId.'"></a>
                                <a type="button" class="px-5 py-1  rounded text-white text-sm bg-color"
                                    @click="editProperty(item.id,item.shop_id)">

                                    Edit</a>
                                <button type="button"
                                    class="px-5 py-1  rounded text-white text-sm bg-red-500 float-right"
                                    @click="removeProperty(item.id)">Remove</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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