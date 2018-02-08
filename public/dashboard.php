<?php include 'templates/header.php'?>
<br/><br/>
<div class="container">
   <div class="row">
       <div class="col-md-4">
           <div class="card mx-auto">
               <img class="card-img-top mx-auto" src="images/generic-user-purple.png"  style="width:60%;" alt="User image">
               <div class="card-body">
                   <h5 class="card-title">Profile</h5>
                   <p class="card-text"> <i class="fa fa-user">&nbsp</i>Vladimir Sukhov</p>
                   <p class="card-text"> <i class="fa fa-user">&nbsp</i>Admin</p>
                   <p class="card-text">Last Login: xxxx-xx-xx</p>
                   <a href="#" class="btn btn-primary">
                       <i class="fa fa-edit">&nbsp</i>
                       Edit profile</a>
               </div>
           </div>
       </div>
       <div class="col-md-8">
           <div class="jumbotron" style="width:100%; height: 100%;">
                <h1>Welcome Admin,</h1>
               <div class="row">
                   <div class="col-sm-6">
                       <iframe src="http://free.timeanddate.com/clock/i638873c/n366/szw110/szh110/cf100/hnce1ead6"
                               frameborder="0" width="160" height="160">
                       </iframe>
                   </div>
                   <div class="col-sm-6">
                       <div class="card">
                           <div class="card-body">
                               <h5 class="card-title">New Orders</h5>
                               <p class="card-text">Here you can make invoices and create new orders</p>
                               <a href="#" class="btn btn-primary">New Orders</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>


<div class="container">
    <p></p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">Here you can manage your categories and add new categories</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#category">Add</a>
                    <a href="manage_categories.php" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brands</h5>
                    <p class="card-text">Here you can manage your brands and add new brands</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brands">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Here you can manage your products and add new products</p>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#products">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'templates/modals/modal_category.php'?>
<?php include 'templates/modals/modal_brands.php'?>
<?php include 'templates/modals/modal_products.php'?>

<?php include_once 'templates/footer.php'?>