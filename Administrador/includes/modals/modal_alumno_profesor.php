<div class="modal fade" id="modalAlumnoProfesor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModalAlumnoProfesor">Nuevo Proceso Alumno</h5>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
      </div>
      <div class="modal-body">
        <form id="formAlumnoProfesor" name="formAlumnoProfesor">
        <input type="hidden" name="idalumnoprofesor" id="idalumnoprofesor" value="">
          <div class="form-group">
            <label for="listProfesor">Seleccione el Alumno</label>
            <select class="form-control"name="listAlumno" id="listAlumno">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listGrado">Seleccione el Docente</label>
            <select class="form-control"name="listProfesor" id="listProfesor">
            <!--Contenido del ajax -->  
            </select>
          </div> 
          <div class="form-group">
            <label for="listAula">Seleccione el Periodo</label>
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
            <button class="btn btn-primary" id="actionAlumnoProfesor" type="submit">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>