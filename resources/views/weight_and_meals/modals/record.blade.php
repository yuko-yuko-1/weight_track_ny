<div class="modal fade " id="record_weight" tabindex="-1" >  
    {{-- record-weight{{$user->id}} 上にADD --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-warning record_weight">
            <div class="modal-body modal-box">
                <form action="{{ route('weight.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                {{-- Date--}}
                <div class="date">
                    <label for="date" class="col-mb-12 col-form-label modal_record_letters">Date</label>
                     <input id="record_date" type="date" class="form-control @error('record_date') is-invalid @enderror" name="record_date" autofocus>
                </div>
                

                {{-- Weight --}}
                <div class="weight ">
                    <label for="weight" class="col-md-12 col-form-label modal_record_letters">Weight(kg)</label>
                    <input id="current_weight" type="number" class="form-control @error('current_weight') is-invalid @enderror" name="current_weight" value="{{ old('current_weight') }}" required autocomplete="weight" autofocus>

                </div>
            </div>
            <div class="modal-footer border-0 col-mb-12 modal_btn">
                
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