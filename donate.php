<?php  
include_once("frontheader.php");

?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btndonate'])) {
        
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        include_once("shared/donateclass.php");

        //create object
        $obj = new Donate();

        //generate a unique reference number

        $myreference = "CH".rand().time();

        //make use of insert details method
        $output = $obj->insertDetails($_POST['firstname'],$_POST['lastname'],$_POST['email'], $_POST['amount'], $myreference);




    // //create object of payment class
    // $obj = new Payment();

    //make use of initialize paystack transaction method
    $output = $obj->initializePaystackTransaction($_POST['email'], $_POST['amount'], $myreference);

    

    $redirect_url = $output['data']['authorization_url'];

    if (!empty($redirect_url)) {
        # redirect to paystack payment gateway
        header("Location: $redirect_url");
    }else {
        
            echo "<pre>";
            print_r($output);
            echo "</pre>";
    }
    

    }
    ?>


<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h3 class="text-center text-decoration-underline mt-5 donationheader">DONATE HERE</h3>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">

                        <div>
                           <label for="firstname" class="form-label" >Firstname</label>
                           <input type="text" name="firstname" class="form-control" placeholder="enter first name">
                        </div>

                        <div>
                           <label for="lastname" class="form-label mt-3" >Lastname</label>
                           <input type="text" name="lastname" class="form-control" placeholder="enter last name">
                        </div>

                        <div>
                           <label for="email" class="form-label mt-3" >Email</label>
                           <input type="email" name="email" class="form-control" placeholder="enter email address">
                        </div>

                        <div class="input-group mb-3 mt-4">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount">
                    <span class="input-group-text">.00</span>
                    </div>


    <input type="submit"  name="btndonate" value="Donate With Paystack" class="btn btn-primary">
                  
                        </form>
                    </div>
                </div>
            </div>

            <!-- row ends here -->
        </div>
    </div>
</section>


<!-- Bootstrap java script goes here-->
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>





