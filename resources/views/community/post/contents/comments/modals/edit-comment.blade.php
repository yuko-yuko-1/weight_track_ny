

<div class="modal fade " id="edit-comment-{{$comment->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('comment.update', ['comment_id' => $comment->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" style="color: #F8DF88;" id="modalTitleId">
                        Edit your comment
                    </h5>
                </div>

                <div class="modal-body d-flex justify-content-center align-items-center">
                    <textarea name="comment_content" id="edit-comment" cols="40" rows="5" style="width: 90%;">{{$comment->comment_content}}</textarea>
                </div>

                <div class="modal-footer mx-auto">
                   <button type="button" class="edit-comments-btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="edit-comments-btn-post btn-sm">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

