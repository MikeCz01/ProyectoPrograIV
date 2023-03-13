<div class="modal fade" id="modalMateria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModalMateria">Nuevo Materia</h5>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
      </div>
      <div class="modal-body">
        <form id="formMateria" name="formMateria">
          <input type="hidden" name="idmateria" id="idmateria" value="">
          <div class="form-group">
            <label for="control-label">Nombre de la materia:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label for="listEstado">Estado</label>
            <select class="form-control"name="listEstado" id="listEstado">
                <option value="1">Activa</option>
                <option value="2">Inactiva</option>
                
            </select>
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