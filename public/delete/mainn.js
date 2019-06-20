const etd = document.querySelector('#tabetd');

if (etd) {
    etd.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-etd') {
            if (confirm('Vous voullez bien supprmer cet étudiant  ?')) {
                const id = e.target.getAttribute('data-etd');

                fetch(`/secre/etudiant/${id}/delete`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}

const grp = document.querySelector('#tabGpEt');

if (grp) {
    grp.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-group') {
            if (confirm('Vous voullez bien supprmer ce groupe  ?')) {
                const id = e.target.getAttribute('data-group');

                fetch(`/secre/group/${id}/delete`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}