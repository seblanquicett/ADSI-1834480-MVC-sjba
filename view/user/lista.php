<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                      <i style="font-size: 20px;" class="fas fa-user-plus"></i> REGISTRAR USUARIO
                    </button>
                    <br><br>
                    <div class="table-responsive shadow">
                    <table id="myTable" class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NONBRE</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">LEVEL</th>
                        <th scope="col">ULTIMA SESION</th>
                        <th scope="col"><i style="font-size: 20px;" class="fas fa-cog"></i> ACCION
                      </tr>
                    </thead>
                    <?php foreach($listar as $row)
                    {?>
                        <tbody>
                            <tr>
                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->email ?></td>
                                <td><?php echo $row->level ?></td>
                                <td><?php echo $row->lastAccess ?></td>
                                <td>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#edit">
                                        <i style="font-size: 25px;" class="fas text-success fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#delete">
                                        <i  style="font-size: 25px;" class="fas text-danger fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    <?php 
                    }?>
               </table>
               </div>      
               <!-- Button trigger modal -->


<!-- Modal IEDITAR -->
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">EDITAR USUARIO</h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-primary">CONFIRMAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ELIMINAR -->
<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR USUARIO</h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
        <a href="" type="button" class="btn btn-primary">CONFIRMAR</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal REGISTRAR -->
<div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR USUARIO</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Correo</label>
                <input type="email" class="form-control" id="email">
              </div>
            </div> 
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Contraseña</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Level</label>
                <select name="level" id="level" class="form-control">
                <option value="">Seleccione...</option>
                  <option value="1">Level 1</option>
                  <option value="2">Level 2</option>
                  <option value="2">Level 3</option>
                </select>
              </div>
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-success">REGISTRAR</button>
        </form>
      </div>
    </div>
  </div>