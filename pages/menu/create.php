<!-- Modal -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="table" id="dataStore">
                    <div class="mb-3">
                        <label>Menu</label>
                        <input type="text" name="menu" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Information</label>
                        <textarea name="info" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="store()">Save changes</button>
            </div>
        </div>

        