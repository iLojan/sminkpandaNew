<?php include '../../includes/session.php'; 
$conn = $pdo->open();
?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body class="bg-gray-50">

    <?php include '../navbar.php'; ?>

    <div class="flex justify-center bg-gray-50 py-12 px-4 sm:px-12 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>

                <h2 class="mt-6 text-center text-2xl font-extrabold text-gray-900">
                    <?php echo "Hi Moa ".$user['lastName']."! Welcome back !"; ?>

                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Manage your Shops and other services here
                </p>
            </div>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="w-full md:w-4/5 lg:w-3/4 text-center m-auto" id="shopListApp">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="shop in shops">
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        <div class="flex " v-if="shop.images">
                                            <div class="flex-shrink-0 h-20 w-20"
                                                v-for="(code,index) in (shop.images.split(','))" v-if="index < 1">
                                                <img class="h-20 w-20 h-20 w-20 rounded-lg" :src='"../../images/"+code'
                                                    :alt="shop.name">
                                            </div>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-left">
                                        <div class="text-sm text-gray-900">{{shop.name}}</div>
                                        <div class="text-sm text-gray-500">
                                            {{shop.addressLine1}},{{shop.addressLine2}},{{shop.city}}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                            @click="createShop(shop.id)">Edit</a>
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                            @click="addProductLink(shop.id)">Add Product</a>
                                    </td>
                                </tr>

                                <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

<script>
////////////////




var application = new Vue({
    el: '#shopListApp',
    data: {
        shops: '',
        myModel: false,
        actionButton: 'Insert',
        dynamicTitle: 'Add Data',
        images: []
    },
    methods: {
        fetchAllData: function() {
            let getShop = "getShop";
            const data = 'type=' + getShop;
            axios.post('./getShop.php', data).then(function(response) {
                console.log("response", response.data);
                application.shops = response.data;
                // this.images = response.data.images;
                console.log("this.images ", this.images);
            });
        },
        createShop(id) {
            //  :href="'./setup-shop.php?type=editShop&a='"+  
            window.location.href = `./setup-shop.php?type=editShop&a=${id}`;

        },
        addProductLink(id) {
            //  :href="'./setup-shop.php?type=editShop&a='"+  
            window.location.href = `../product-details/product-list.php?a=${id}`;

        },
    },
    created: function() {

        this.fetchAllData();
    }
});
</script>

<<style>
    .dashboard-main {
    padding: 3em;
    width: 100%;
    grid-gap: 1em;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .main-menu-box {
    grid-gap: 2em;
    background: #fff;
    padding:16px;
    border: 1px solid #e6e6e6;
    position: relative;
    height: 315px;
    }
    .menu-title {
    font-size: 17px;
    font-weight: 600;
    line-height: 26px;
    }
    .main-desc {
    margin-top: 9px;
    font-size: 12px;
    line-height: 22px;
    }
    .menu-icon {
    height: 135px;
    margin-bottom: 19px;

    }
    .menu-icon img {
    width: 100%;
    height: 150px;
    }
    .add-button{
    padding:0 3em;
    }
    .bottom-button {
    position: absolute;
    padding-bottom: 40px;
    bottom: -26px;
    width: 88%;
    }
    .add-btn {
    float: right;
    }
    .edit-btn:hover,.add-btn:hover{
    color:#059d8c !important
    }
    .edit-btn,.add-btn{
    font-size: 14px;
    font-weight: 500;
    color:#09B7A3 !important;
    cursor: pointer;
    }
    </style>>