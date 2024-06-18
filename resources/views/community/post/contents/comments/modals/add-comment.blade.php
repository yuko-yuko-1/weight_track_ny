

<div class="modal fade " id="add-comment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('comment.store', ['post_id' => $post->id])}}" method="POST">

                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" style="color: #A8D2A2;" id="modalTitleId">
                        Add your comment
                    </h5>
                </div>

                <div class="modal-body d-flex justify-content-center align-items-center">
                    <textarea name="add-comment" id="add-comment" cols="40" rows="5" style="width: 90%;"></textarea>
                </div>

                {{-- <form action="{{route('comment.store', $post->id)}}" method="post"> --}}
                    <div class="modal-footer mx-auto mb-3">
                        <button type="button" class="add-comments-btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="add-comments-btn-post btn-sm">Post</button>
                     </div>
                {{-- </form> --}}

            </form>
        </div>
    </div>
</div>

