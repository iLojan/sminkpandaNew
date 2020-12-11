<?php include './session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include './siginHeade.php'; ?>

<body class="hold-transition register-page m-0 bg-gray-50 ">
    <?php include './siginHeade.php'; ?>
    <div class="container m-0">

        <?php
      if(isset($_SESSION['error'])){
        echo "
        
          <div class='alert  alert-dismissible fade show alert-danger col-3 m-auto'>
          ".$_SESSION['error']."
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
        <div class='alert  alert-dismissible fade show alert-success col-3 m-auto'>
        ".$_SESSION['success']."
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>
        ";
        unset($_SESSION['success']);
      }
    ?>


        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-12 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <div class="w-6/12 m-auto">
                        <img class="mx-auto w-full" src="../images/logo/sminkPandY.png" alt="Workflow">
                    </div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Sign up to your account
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Or
                        <a href="signin.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                            I already have a membership
                        </a>
                    </p>
                </div>
                <form action="register.php" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <input type="text"
                                        value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>"
                                        required name="firstname" id="first_name" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-300 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                        name</label>
                                    <input type="text"
                                        value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"
                                        name="lastname" id="last_name" autocomplete="family-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-300 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                        address</label>
                                    <input type="text" name="email"
                                        value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>"
                                        id="email_address" autocomplete="email"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-300 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3">
                                </div>



                                <div class="col-span-6">
                                    <label for="street_address"
                                        class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="text" name="password" id="password" autocomplete="street-address"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-300 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3">
                                </div>

                                <div class="col-span-6">
                                    <label for="street_address" class="block text-sm font-medium text-gray-700">confirm
                                        password</label>
                                    <input type="text" name="repassword" id="repassword" autocomplete="street-address"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 border-solid border-2 border-gray-300 block w-full shadow-sm sm:text-sm  rounded-md py-2.5 px-3">
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>


</body>

</html>