<form id="editWeightForm" action="{{ route('weight-update', ['id' => 0]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div id="editWeightModal" class="modal edit-modal">
        <div class="modal-content">
            <div class="modal-header">Edit Weight Log</div>
            <div class="modal-body">
                <div class="edit-modal-field">
                    <label for="editDate">Date</label>
                    <span id="editDate"></span>
                </div>
                <div class="edit-modal-field">
                    <label for="editWeight">Weight</label>
                    <input type="text" id="editWeight" name="editWeight">
                    <input type="hidden" id="editWeightId" name="weightId">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel-button" onclick="closeModal()">Cancel</button>
                <button class="update-button" type="submit">Update</button>
            </div>
        </div>
    </div>
</form>