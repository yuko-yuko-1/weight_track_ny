{{-- 永久削除　Permanently Delete --}}
<div class="modal fade" id="permanently-delete-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            {{-- Modal Header --}}
            <div class="modal-header border-danger">
                <h5 class="modal-title">
                    <i class="fa-solid fa-trash-can"></i> Delete post
                </h5>
            </div>
            {{-- Modal Body --}}
            <div class="modal-body">
                <p>Are you sure you want to delete <span class="fw-bold">{{ $post->title }}</span> ?</p>
                <p class="fw-light">This action will permanetly delete the post.</p>
            </div>
            {{-- Modal Footer --}}
            <div class="modal-footer border-0">
                <form action="{{ route('admin.posts.destroy', $post->id )}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>