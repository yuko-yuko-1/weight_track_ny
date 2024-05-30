

<div class="modal fade " id="create-new-posts">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" style="color: #A8D2A2;" id="modalTitleId">
                    Create New Posts
                </h5>
            </div>



        <div class="modal-body mx-auto">
            <div class="add-title">
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
                <i class="fa-regular fa-image icon-md fa-image-new">
                    <span><a href="#" id="add-image">Add Image</a></span>
                </i>
                    <div class="img-new">
                        <img src="{{asset('images/new-posts.png')}}" width="190px" height="90px" alt="new_posts" >
                    </div>
             </div>
        </div>
        </div>
          <div class="modal-footer mx-auto mb-3">

            <button type="button" class="newposts-btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="newposts-btn-post btn-sm">Post</button>

          </div>
        </div>
    </div>
</div>
</div>


</div>
