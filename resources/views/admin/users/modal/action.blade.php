{{-- 永久削除　Permanently Delete --}}
<div class="modal fade" id="permanently-delete-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            {{-- Modal Header --}}
            <div class="modal-header border-danger">
                <h5 class="modal-title">
                    <i class="fa-solid fa-trash-can"></i> Delete user
                </h5>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <p>Are you sure you want to delete <span class="fw-bold">{{ $user->username }}</span> ?</p>
                <p class="fw-light">This action will permanetly delete the user's account.</p>
            </div>
            {{-- Modal Footer --}}
            <div class="modal-footer border-0">
                <form action="{{ route('admin.users.destroy', $user->id )}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>