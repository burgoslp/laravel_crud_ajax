<div class="modal fade" id="modalEditPersona" tabindex="-1" role="dialog" aria-labelledby="modalEditPersona" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="personaedit" action="" method="POST" >
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" class="form-control" placeholder="" >

          <div class="form-group">
              <label for="textInputName">Nombre:</label>
              <input type="text" name="nombre" class="form-control" placeholder="">
              <div class="invalid-feedback" id="erroreditnombre"></div>
          </div>
          <div class="form-group">
              <label for="textInputLastname">Apellido:</label>
              <input type="text" name="apellido" class="form-control" placeholder="" >
              <div class="invalid-feedback" id="erroreditapellido"></div>
          </div>
          <div class="form-group">
              <label for="textInputDni">cedula:</label>
              <input type="text" name="cedula" class="form-control" placeholder="">
              <div class="invalid-feedback" id="erroreditcedula"></div>
          </div>
         

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="personaedit" >Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botoncerrarmodal">Cerrar</button>
      </div>
    </div>
  </div>
</div>