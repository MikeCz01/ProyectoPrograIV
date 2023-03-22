<div class="modal fade" id="modalNota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalActividad">Cargar Nota</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="formNota" name="formNota">
                    <input type="hidden" name="ideventregada" id="ideventregada" value="<?= $ev_entregada; ?>">
                    <div class="form-group">
                        <label for="control-label">Nota</label>
                        <input type="number" class="form-control" name="nota" id="nota">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Nota.</label>
                        <p>Los cambios no podran ser editados</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" id="action" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>