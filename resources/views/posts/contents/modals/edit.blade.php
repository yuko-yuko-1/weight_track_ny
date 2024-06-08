
<div class="modal fade"  id="edit-post">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="modalTitleId">
                    Edit Your Post
                </h5>
            </div>



        <div class="modal-body mx-auto">
            <div class="add-title">
                <form action="{{ route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PATCH')

                            <label for="title">Title</label><br>
                            <input type="text" name="title" id="title" width="100">
                        </div>

                        <div class="row">
                        <div class="col-6">
                            <div class="add-content">
                                <label for="content">Content</label><br>
                                <input type="text" name="content" id="content" width="">
                            </div>
                        </div>
                        <div class="add-image col-6">
                                <i class="fa-regular fa-image icon-md fa-image-edit"><span><a href="#" id="add-image">Change Image</a></span></i>
                            <div class="img-new">
                                <img src="{{asset('images/apple.png')}}" width="190px" height="90px" alt="new_posts" >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="modalClose edit-btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="edit-btn-post btn-sm" >Post</button>
                    </div>
                    </div>

            </form>
</div>
</div>


</div>

