

<div class="modal fade delete-modal" id="delete-post{{ $post->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal-border">
            <div class="modal-header border border-0">
                <h5 class="modal-title mx-auto mt-3" style="color: #EB5E5E" id="modalTitleId">
                    Delete Post
                </h5>
            </div>

            <div class="modal-body mx-auto text-wrap" style="width: 13rem; text-align:center">
                <p class="fw-bold">Are you sure you want to delete this post?</p>
            </div>


            <div class="modal-footer mx-auto mb-3 border border-0">
                <form action="{{ route('post.destroy', $post->id) }}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="button" class="delete-btn-cancel me-2 rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="delete-btn-delete ms-2 rounded-pill">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


