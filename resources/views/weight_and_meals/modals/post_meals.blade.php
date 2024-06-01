<div class="modal fade " id="post_meal">  
    {{-- record-weight{{$user->id}} 上にADD --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-warning modal-meal">
            <div class="modal-body">
                {{-- image --}}
                <form action="{{ route('meal.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="file" name="image" id="image" class="form-control" >
                    @error('image')
                       <span class="d-block text-danger small">{{$message}}</span>
                    @enderror
                {{-- Memo --}}
                <label for="description" class="form-label mt-3 fw-bold modal_meals_letters">Memo</label>
                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                @error('description')
                <span class="d-block text-danger small">{{$message}}</span>
                @enderror
            </div>
            <div class="modal-footer border-0 modal_btn">
                    <div class="">
                    <button type="button" data-bs-dismiss="modal" class="btn inline-block btn-outline-warning">Cancel</button>
                    <button type="submit" class="btn inline-block btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>