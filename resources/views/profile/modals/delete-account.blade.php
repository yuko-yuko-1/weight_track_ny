<div class="modal fade" id="deleteAccountModal-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteAccountModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h5 modal-title" id="deleteAccountModalLabel">
                    Delete my account
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel-delete btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-delete-account btn-sm" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<form id="deleteAccountForm" action="{{ route('profile-destroy',['id' => $user->id]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>

<script>
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        document.getElementById('deleteAccountForm').submit();
    });
</script>