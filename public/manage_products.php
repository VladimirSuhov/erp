<?php include 'templates/header.php'?>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Added Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="get_products">

            </tbody>
        </table>
    </div>

<?php include_once 'templates/update_products.php'?>
<?php include_once 'templates/footer.php'?>