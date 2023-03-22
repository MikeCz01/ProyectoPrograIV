<div class="modal fade" id="modalProfesorMateria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModalDocenteMateria">Nuevo Proceso</h5>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
      </div>
      <div class="modal-body">
        <form id="formProfesorMateria" name="formProfesorMateria">
        <input type="hidden" name="idprofesormateria" id="idprofesormateria" value="">
          <div class="form-group">
            <label for="listProfesorMateria">Seleccione el Docente</label>
            <select class="form-control"name="listProfesorMateria" id="listProfesorMateria">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listGrado">Seleccione el Grado</label>
            <select class="form-control"name="listGrado" id="listGrado">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listAula">Seleccione el Aula</label>
            <select class="form-control"name="listAula" id="listAula">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listMateria">Seleccione la Materia</label>
            <select class="form-control"name="listMateria" id="listMateria">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listPeriodo">Seleccione el Periodo</label>
            <select class="form-control"name="listPeriodo" id="listPeriodo">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listEstado">Estado</label>
            <select class="form-control"name="listEstado" id="listEstado">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
          </div> 
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" id="actionProfesorMateria" type="submit">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>