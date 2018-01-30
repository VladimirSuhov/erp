
<!-- Modal -->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_product"  onsubmit="return false" autocomplete="off">
                    <input type="hidden" name="add_product" value="1">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date_added">Date</label>
                            <input type="text" class="form-control" name="date_added" id="date_added" value="<?php echo date("Y-m-d");?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
                            <small id="product_error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_category">Select Category</label>
                        <select name="product_category" id="product_category" class="form-control" ></select>
                    </div>
                    <div class="form-group">
                        <label for="product_brand">Select Brand</label>
                        <select name="product_brand" id="product_brand" class="form-control" ></select>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product Price">
                        <small id="price_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Quantity</label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Product Quantity">
                        <small id="quantity_error" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>