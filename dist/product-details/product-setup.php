<?php include '../../includes/session.php'; ?>
<?php
  
	if(!isset($_SESSION['user'])){
		header('location: ../../includes/signin.php');
	}
?>

<?php include '../header.php'; ?>

<body onload="loadData()">
    <?php include '../navbar.php'; ?>

    <div class="container mt-5">
        <div class="card col-md-12">
            <div class="card-header">
                <h3>Shop Details</h3>
                <span class="sub-title">List your property and Item selling!</span>
            </div>
            <div class="card-body form">
                <div class="row m-0">
                    <div class="col-md-4">
                        <label>Category</label>
                        <select class="form-control" id="category" id="category" onchange="getSubCategory()">

                        </select>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-4">
                        <label>Sub Category</label>
                        <select class="form-control" id="subCategory">

                        </select>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" @click="saveProduct()" class="form-control" id="title" />
                    </div>

                </div>

                <div class="row m-0">
                    <div class="col-md-4">
                        <label>Price Type</label>
                        <select class="form-control" id="priceType">
                            <option value="fixed">Fixed</option>
                            <option value="negotiable">Negotiable</option>
                            <option value="on_call">On Call</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Price</label>
                        <input type="number" class="form-control" id="price" />
                    </div>
                    <div class="col-md-3">
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="quantity" />
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-4">
                        <label>Brand</label>
                        <input type="text" class="form-control" id="brand">
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-4">
                        <label>Authenticity</label>

                        <input type="text" class="form-control" id="authenticity">
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-4">
                        <label> Product Condition</label>
                        <select class="form-control" id="productCondition">
                            <option value="New with tags">New with tags</option>
                            <option value="New without tags">New without tags</option>
                            <option value="New with tags">New with defects</option>
                            <option value="New without tags">Pre-owned</option>
                        </select>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-4">
                        <label> Color</label>
                        <select id='setColor'  class="form-control">
                            <option value='0'>Select Colr</option>
                            <option value='Black'>Black</option>
                            <option value='Brown'>Brown</option>
                            <option value='Blue'>Blue</option>
                            <option value='Gray'>Gray</option>
                            <option value='Green'>Green</option>
                            <option value='Beige'>Beige</option>
                            <option value='Gold'>Gold</option>
                        </select>


                    </div>
                    <div class="col-md-4">
                        <label> Metal</label>
                        <select id='setColor'  class="form-control">
                            <option value='0'>Select Colr</option>
                            <option value='Black'>Black</option>
                            <option value='Brown'>Brown</option>
                            <option value='Blue'>Blue</option>
                            <option value='Gray'>Gray</option>
                            <option value='Green'>Green</option>
                            <option value='Beige'>Beige</option>
                            <option value='Gold'>Gold</option>
                        </select>


                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-4">
                    <label>Size</label>
                        <input type="text" class="form-control" id="brand">
                    </div>
                    </div>
                    <div class="row m-0">
                    <div class="col-md-4">
                    <label>width</label>
                        <input type="text" class="form-control" id="brand">
                    </div>
                    <div class="col-md-4">
                    <label>height</label>
                        <input type="text" class="form-control" id="brand">
                    </div>
                    </div>
           
                <div class="row m-0">
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" id="description" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-6">
                        <label>Set Features</label>
                        <div class="row m-0">

                            <input type="text" class="col-5" id="feature" />
                            <button class="col-2" class="btn" onclick="addFeatures()">Add</button>
                        </div>
                        <div class="row m-0" id="featureList">
                            <li></li>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12">
                        <div class="col-lg-12">

                            <div class="dropzone"></div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-12 text-right">
                        <button onclick="saveProduct()" class="btn btn-primary">Save</button>
                    </div>
                </div>


            </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="editAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">...</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="shopId" value="<?php echo $_GET['shopId']?>">
    </div>
    <script>
    //Disabling autoDiscover
    var FeatureList = [];
    Dropzone.autoDiscover = false;
    var url = [];
    const category = document.getElementById("category");
    const subCategory = document.getElementById("subCategory");
    const title = document.getElementById("title");
    const priceType = document.getElementById("priceType");
    const price = document.getElementById("price");
    const quantity = document.getElementById("quantity");
    const brand = document.getElementById("brand");
    const authenticity = document.getElementById("authenticity");
    const description = document.getElementById("description");
    const shopId = document.getElementById("shopId");
    const productCondition = document.getElementById("productCondition");
    $(document).ready(function() {

        // Initialize select2
        $("#selUser").select2();
        $("#setColor").select2();
        $("#setMetal").select2();
        $("#category").select2();
        
        // Read selected option
        //  $('#but_read').click(function(){
        //    var username = $('#selUser option:selected').text();
        //    var userid = $('#selUser').val();

        //    $('#result').html("id : " + userid + ", name : " + username);

        //  });
    });
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

    function loadData() {
        getCategory();
    }

    function getCategory() {




        let getShop = "getCategory";
        const data = 'type=' + getShop;
        axios
            .post("./product.php", data)
            .then(response => {
                console.log("postcode", response.data.statusCode);
                category.innerHTML = response.data.statusCode;
            })
            .catch(error => {
                console.log("error", error);
            })

    }
    const getSubCategory = () => {


        let getShop = "subCategory";
        const data = 'type=' + getShop + '&id=' + category.value;
        axios
            .post("./product.php", data)
            .then(response => {
                console.log("postcode", response.data.statusCode);
                subCategory.innerHTML = response.data.statusCode;
            })
            .catch(error => {
                console.log("error", error);
            })
    }

    function saveProduct() {
        var lang = [];
        $("input[name='prolang']:checked").each(function() {
            lang.push(this.value);
        });


        let setUpShop = "save";
        const data = 'type=' + setUpShop + '&category=' + category.value + '&subCategory=' + subCategory.value +
            '&title=' + title.value +
            '&priceType=' + priceType.value + '&price=' + price.value + '&quantity=' + quantity.value + '&brand=' +
            brand.value + "&url=" + url + "&authenticity=" + authenticity.value + "&description=" + description.value +
            "&productCondition=" + productCondition.value + "&shopId=" + shopId.value + "&FeatureList=" + FeatureList
        axios
            .post("./product.php", data)
            .then(response => {
                console.log("postcode", response);
            })
            .catch(error => {
                console.log("error", error);
            })

    }




    function addFeatures() {
        var theFeature = document.getElementById("feature");
        if (theFeature.value == "" || theFeature.value.length == 0) {
            return false; //stop the function since the value is empty.
        }
        FeatureList.push(theFeature.value);
        document.getElementById("featureList").children[0].innerHTML += "<li>" + FeatureList[FeatureList.length - 1] +
            "</li>";
        theFeature.value = ""
    }
    </script>
    </div>
</body>