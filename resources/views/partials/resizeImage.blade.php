<!-- ingrandire la foto quando cliccata!-->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- larghezza maggiore -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Immagine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img id="modalImage" src="" alt="Immagine grande" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imageModal = document.getElementById('imageModal')
        imageModal.addEventListener('show.bs.modal', function (event) {
            var trigger = event.relatedTarget
            var imgSrc = trigger.getAttribute('data-img')
            var modalImage = imageModal.querySelector('#modalImage')
            modalImage.src = imgSrc
        })
    })
</script>
