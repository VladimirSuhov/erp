<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>ERP</title>
</head>
<body>
<!--Navbar -->
<?php include "templates/header.php";?>
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
                    <a href="#" class="btn btn-primary">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brands</h5>
                    <p class="card-text">Here you can manage your brands and add new brands</p>
                    <a href="#" class="btn btn-primary">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Here you can manage your products and add new products</p>
                    <a href="#" class="btn btn-primary">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>