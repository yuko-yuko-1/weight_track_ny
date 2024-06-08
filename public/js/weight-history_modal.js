function openEditModal(element) {
    const date = element.getAttribute('data-date');
    const weight = element.getAttribute('data-weight');
    const weightId = element.getAttribute('data-weight-id');

    document.getElementById('editDate').textContent = date;
    document.getElementById('editWeight').value = weight;
    document.getElementById('editWeightId').value = weightId;

    const form = document.getElementById('editWeightForm');
    form.action = `/log-weight-history/${weightId}/update`;

    document.getElementById('editWeightModal').style.display = "block";
}

function closeModal() {
    document.getElementById('editWeightModal').style.display = "none";
}

// Delete modal button
function openDeleteModal(element) {
    const date = element.getAttribute('data-date');
    const weight = element.getAttribute('data-weight');
    const weightId = element.getAttribute('data-weight-id');

    document.getElementById('deleteDate').textContent = date;
    document.getElementById('deleteWeight').textContent = weight;

    const form = document.getElementById('deleteWeightForm');
    form.action = `/log-weight-history/${weightId}/delete`;

    document.getElementById('deleteWeightModal').style.display = "block";
}

function closeDeleteModal() {
    document.getElementById('deleteWeightModal').style.display = "none";
}
