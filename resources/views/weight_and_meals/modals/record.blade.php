<div class="modal fade " id="record_weight" tabindex="-1" >  
    {{-- record-weight{{$user->id}} 上にADD --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-warning record_weight">
            <div class="modal-body modal-box">
                {{-- Date--}}
                <div class="date">
                    <label for="date" class="col-mb-12 col-form-label modal_record_letters">Date</label>
                     <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" autofocus>
                </div>
                

                {{-- Weight --}}
                <div class="weight ">
                    <label for="weight" class="col-md-12 col-form-label modal_record_letters">Weight(kg)</label>
                    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>

                </div>
            </div>
            <div class="modal-footer border-0 col-mb-12 modal_btn">
                <form action="" method="post">
                    @csrf
                    @method('POST')
                    <div class="row mb-0">
                        <div class="modal_btn">
                            <button type="button" data-bs-dismiss="modal" class="btn inline-block btn-outline-warning">Cancel</button>
                            <button type="submit" class="btn inline-block btn-warning">Save</button>
                            </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>