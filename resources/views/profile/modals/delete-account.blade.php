<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="delete-account-modal-content">
            <div class="delete-account-modal-header">
                <h3 class="h5 delete-account-modal-title" id="deleteAccountModalLabel">
                    Delete my account
                </h3>
            </div>
            <div class="delete-account-modal-body">
                <p>Are you sure you want to delete your account?</p>
            </div>
            <div class="delete-account-modal-footer border-0">
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
