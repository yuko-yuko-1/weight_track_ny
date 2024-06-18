
<div class="modal fade"  id="edit-post{{ $post->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg rounded-3">
        <div class="modal-content edit-modal-border">
            <div class="modal-header custom-modal-header border border-0">
                <h3 class="modal-title text-center mx-auto" id="modalTitleId" style="color: #FADE7F;" >
                    Edit Your Post
                </h3>
            </div>

            <div class="modal-body custom-modal-body mx-auto">
                <div class="add-title">
                    <form action="{{ route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                                <label for="title"><h4>Title</h4></label><br>
                                <input type="text" name="title" value="{{ old('title', $post->title )}}" id="title" class="form-control form-control-lg rounded">
                                {{-- Error --}}
                                @error('title')
                                <p class="text-danger small">{{ $message }}</p>
                                @enderror
                    <div class="row">
                        <div class="col mt-3">
                            {{-- <div class="add-content"> --}}
                                <label for="content" class="mt-3"><h4>Content</h4></label><br>
                                <textarea name="content" id="content" cols="50" rows="10" class="form-control form-control-lg rounded">{{ old('content', $post->content) }}</textarea>
                            {{-- </div> --}}
                                  {{-- Error --}}
                                  @error('content')
                                  <p class="text-danger small">{{ $message }}</p>
                                  @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="add-image col">
                            {{-- <div class="row">
                                <div class="col text-left"> --}}
                                    <div class="row justify-content-center image-change-container">
                                        <div class="col-auto mt-4">
                                        {{-- <i class="fa-regular fa-image icon-md fa-image-edit font-weight-bold text-secondary ms-5" width="5px" height="5px"></i>
                                        <a href="{{ $post->image }}" id="add-image" class="link-underline-dark">
                                            <span class="change-image h3 text-dark me-4">Change Image</span>
                                        </a> --}}
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>
                                    </div>

                                {{-- </div> --}}
                                {{-- <div class="col img-new"> --}}
                                    <div class="text-center mt-2">
                                        <img src="{{ $post->image }}" width="300px" height="200px" alt="new_posts" class="mt-2 mb-3 rounded">
                                    </div>
                                {{-- </div>
                            </div> --}}
                                    {{-- Error --}}
                                    @error('image')
                                    <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center custom-modal-footer mb-1 border border-0">
                        <button type="button" class="edit-btn-cancel btn-sm me-2 mt-3 rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="edit-btn-post btn-sm ms-2 mt-3 rounded-pill" >Post</button>
                    </div>
                </form>
            </div>
          </div>

        </div>
    </div>


</div>

{{-- <script> document.getElementById('add-image').addEventListener('click', function() { document.getElementById('file-input').click(); }); </script> --}}
