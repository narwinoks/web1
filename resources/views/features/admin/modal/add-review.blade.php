<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">Review User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-review">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="key" id="key" value="review">
        <div class="mb-1">
            <label for="name" class="form-label">Photo</label>
            <input type="file" class="form-control input-custom" aria-label="photo" aria-describedby="basic-addon1"
                id="file" name="file" accept="image/*">
        </div>
        <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control input-custom" placeholder="Name.." aria-label="name"
                aria-describedby="basic-addon1" id="name" name="name">
            <span class="error-name text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="review" class="form-label">Review</label>
            <textarea type="text" rows="5" class="form-control input-custom" placeholder="Enter Your review"
                aria-label="review" aria-describedby="basic-addon1" id="review" name="review"></textarea>
            <span class="error-review text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="Rating" class="form-label">Rating</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" aria-label="Close"
            class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
        <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
            <div class="spinner-border d-none mx-4" role="status">
            </div>
            <span class="mr-4" id="tag-button"> <i aria-disabled="true" class="fas fa-save"></i>
                Simpan</span>
        </button>
    </div>
</form>
