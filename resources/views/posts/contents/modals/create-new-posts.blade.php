

<div class="modal fade " id="create-new-posts-{{ $community->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" style="color: #A8D2A2;" id="modalTitleId">
                    Create New Posts
                </h5>
            </div>


        <div class="modal-body mx-auto">
            {{--  enctype="multipart/form-dataが無いと、画像の保存ができない--}}
            <form action="{{ route('post.store', $community->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="add-title">               
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" width="100">              
            </div>
            {{-- Error --}}
            @error('title')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
            <div class="row">
             <div class="col-6">
                <div class="add-content">
                    <label for="content">Content</label><br>
                    <input type="text" name="content" id="content" width="">
                </div>
            {{-- Error --}}
            @error('content')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
             </div>
             <div class="add-image col-6">
                {{-- <i class="fa-regular fa-image icon-md fa-image-new">
                    <span>Add Image</span>
                </i> --}}
                <input type="file" name="image" id="image" class="form-control form-control-sm">
                    {{-- <div class="img-new">
                        <img src="{{asset('images/new-posts.png')}}" width="190px" height="90px" alt="new_posts" >
                    </div> --}}
             </div>
             {{-- Error --}}
            @error('image')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        </div>
          <div class="modal-footer mx-auto mb-3">

            <button type="button" class="newposts-btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="newposts-btn-post btn-sm">Post</button>
        </form>

          </div>
        </div>
    </div>
</div>
</div>


</div>
