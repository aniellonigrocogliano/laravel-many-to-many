import './bootstrap';
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
    '../img/**'
])

document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('deleteModal');
    const baseRoute = '/admin/technologies/:id'; // Definisci l'URL base qui

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const action = baseRoute.replace(':id', id);

        const deleteForm = deleteModal.querySelector('#deleteForm');
        deleteForm.setAttribute('action', action);
    });
});