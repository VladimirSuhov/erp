
<!-- Modal -->
<div class="modal fade" id="update_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_brands_form" onsubmit="return false" autocomplete="off">
                    <input type="hidden" name="update_brand" value="1">
                    <input type="hidden" name="bid" value="" id="bid">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" name="update_brand_name" id="update_brand_name" aria-describedby="brand_error"
                               placeholder="Enter brand name">
                        <small id="brand_error" class="form-text text-muted"></small>
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