@if($meal)
<div class="modal fade" id="meals_delete_{{$meal->id}}">
  
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger modal-delete">
            <div class="modal-header border-danger">
                <h4 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>Delete the Meal Post
                </h4>
            </div>
            <div class="modal-body delete-body text-center">
                Are you sure you want to delete this picture?
                <div>
                    <img src="{{ asset('images/meal/' . $meal->image) }}" alt="Latest Meal" class="image-delete">    
                </div>
            </div>
            <div class="modal-footer border-0 modal_btn">
            <form action="{{route('meal.destroy', $meal->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
        </div>
    </div>
</div> 
@endif