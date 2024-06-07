<form action="{{ route('weight-update', ['id' => $weight->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div id="editWeightModal" class="modal edit-modal">
        <div class="modal-content">
            <div class="modal-header">Edit Weight Log</div>
            <div class="modal-body">
                <div class="edit-modal-field">
                    <label for="editDate">Date</label>
                    <span id="editDate">{{ $weight->record_date }}</span>
                </div>
                <div class="edit-modal-field">
                    <label for="editWeight">Weight</label>
                    <input type="text" id="editWeight" name="editWeight">
                    <input type="hidden" name="weightId" value="{{ $weight->id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="cancel-button" onclick="closeModal()">Cancel</button>
                <button class="update-button" type="submit">Update</button>
            </div>
        </div>
    </div>
</form>
