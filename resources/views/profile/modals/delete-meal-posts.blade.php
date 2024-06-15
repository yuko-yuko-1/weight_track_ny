<!-- resources/views/profile/modals/delete-meal-posts.blade.php -->
<div class="modal fade" id="deleteMealModal" tabindex="-1" aria-labelledby="deleteMealModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="deleteMealModalLabel">Delete This Meal?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Are you sure you want to delete this picture?
        <div>
          <img src="" alt="Meal to be deleted" id="mealToDeleteImage" class="image-delete meal-item modal-meal-image">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <form id="deleteMealForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
