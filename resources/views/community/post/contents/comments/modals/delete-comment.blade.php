

<div class="modal fade delete-comment" id="delete-comment-{{ $comment->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('comment.destroy', ['comment_id' => $comment->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                <h5 class="modal-title mx-auto" style="color: #FD7168" id="modalTitleId">
                    Delete your comment
                </h5>
                </div>

                <div class="modal-body mx-auto text-wrap" style="width: 300px; text-align:center">
                   <p class="fw-bold">Are you sure you want to delete this comment?</p>
                </div>


                <div class="modal-footer mx-auto">
                    <button type="button" class="delete-comments-btn-cancel btn-sm " data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="delete-comments-btn-delete ">Delete</button>
                </div>

            </form>

        </div>
    </div>
</div>


</div>

