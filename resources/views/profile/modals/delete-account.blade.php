<div class="modal fade" id="delete-account-#">
    <div class="modal-dialog justify-content-center">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i> Delete my account
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account?</p>
            </div>
            <div class="modal-footer border-0">
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-cancel-delete btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-delete-account btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
