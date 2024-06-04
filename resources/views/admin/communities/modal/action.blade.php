{{-- モーダル！（コミュニティを edit/delete するページ） --}}
{{-- admin/communities/index.bladeに、@iuncludeされている！ --}}


    {{-- 編集　Edit --}}
    <div class="modal fade" id="edit-community-{{ $community->id }}">
        <div class="modal-dialog">
            <div class="modal-content border-warning">
                <form action="{{ route('admin.communities.update', $community->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Modal Header --}}
                    <div class="modal-header border-warning">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-pen-to-square"></i> Edit community
                        </h5>
                    </div>
                    {{-- Modal Body --}}
                    <div class="modal-body">
                        <div class="mt-3">
                            <input type="text" name="name" value="{{ $community->name }}" class="form-control">
                        </div>
                    </div>
                    {{-- Modal Footer --}}
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- 削除　Delete --}}
    <div class="modal fade" id="delete-community-{{ $community->id }}">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                {{-- Modal Header --}}
                <div class="modal-header border-danger">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-trash-can"></i> Delete community
                    </h5>
                </div>
                {{-- Modal Body --}}
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ $community->name }}</span> community?</p>
                    <p class="fw-light">This action will affect all the posts under this community. Posts without a community will fall under Uncategorized.</p>
                </div>
                {{-- Modal Footer --}}
                <div class="modal-footer border-0">
                    <form action="{{ route('admin.communities.destroy', $community->id )}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
