const prof = document.querySelector('#tab');

if (prof) {
    prof.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-proff') {
            if (confirm('Vous voullez bien supprimer ce professeur  ?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/admin/prof/${id}/delete`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}

const personel = document.querySelector('#tabPerso');

if (personel) {
    personel.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-personel') {
            if (confirm('Vous voullez bien supprmer cette secrétaire  ?')) {
                const id = e.target.getAttribute('data-personel');

                fetch(`/admin/personel/${id}/delete`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}