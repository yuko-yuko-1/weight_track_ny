<div class="modal fade" id="post_meal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-warning modal-meal">
            <div class="modal-body">
                <form action="{{ route('meal.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                       <span class="d-block text-danger small">{{$message}}</span>
                    @enderror
                    <label for="description" class="form-label mt-3 fw-bold modal_meals_letters">Memo</label>
                    <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    @error('description')
                        <span class="d-block text-danger small">{{$message}}</span>
                    @enderror
                    <label for="record_date" class="form-label mt-3 fw-bold modal_meals_letters">Time</label>
                    <input type="time" name="record_date" id="record_date" class="form-control">
                    @error('record_date')
                        <span class="d-block text-danger small">{{$message}}</span>
                    @enderror
                    <label for="record_date" class="form-label mt-3 fw-bold modal_meals_letters">Record Date</label>
                    <input type="date" name="record_date" id="record_date" class="form-control">
                    @error('record_date')
                        <span class="d-block text-danger small">{{$message}}</span>
                    @enderror
            </div>
            <div class="modal-footer border-0 modal_btn">
                <div>
                    <button type="button" data-bs-dismiss="modal" class="btn inline-block btn-outline-warning">Cancel</button>
                    <button type="submit" class="btn inline-block btn-warning">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>