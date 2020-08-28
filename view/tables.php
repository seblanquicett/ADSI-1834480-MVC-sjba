<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> TABLA DE USUARIOS</h6>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <i style="font-size: 20px;" class="fas fa-user-plus"></i> Crear Usuario
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="myTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>LEVEL</th>
                        <th>ULTIMA_SESSION</th>
                        <th>FECHA_REGISTRO</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tfoot class="thead-dark">
                    <tr>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>LEVEL</th>
                        <th>ULTIMA_SESSION</th>
                        <th>FECHA_REGISTRO</th>
                        <th>OPCIONES</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
          $num = 0;
            foreach ($users as $users) {
              $num++;
              ?>
                    <tr>
                        <td><?=$users->name?></td>
                        <td><?=$users->email?></td>
                        <td><?=$users->level?></td>
                        <td><?=$users->lastAccess?></td>
                        <td><?=$users->timeStamp?></td>
                        <td><a title="Editar" type="buttom" class="btn-circle btn-success btn-sm" href="#" data-toggle="modal"
                                data-target="#editar<?=$num?>">
                                <i style="font-size: 17px;" class="fas fa-edit"></i>
                            </a>
                            <a title="Eliminar" class="btn-circle btn-danger btn-sm" type="buttom" href="#" data-toggle="modal"
                                data-target="#eliminar<?=$num?>">
                                <i style="font-size: 17px;" class="fas fa-trash-alt"></i>
                            </a>
                            <a title="subirDocumento" class="btn-circle btn-primary btn-sm" type="buttom" href="#"
                                data-toggle="modal" data-target="#subir<?=$num?>">
                                <i style="font-size: 17px;" class="fas fa-cloud-upload-alt"></i>
                            </a>
                            <a title="VerArchivos" type="buttom" class="btn-circle btn-warning btn-sm" href="index.php?c=<?=Conexion::encryptor('encrypt', 'user')?>&a=<?=Conexion::encryptor('encrypt', 'verArchivos')?>&id=<?=Conexion::encryptor('encrypt', $users->id)?>">
                                <i style="font-size: 17px;" class="fas fa-file-download"></i>
                            </a>
                            <div class="modal fade" id="editar<?=$num?>" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title" id="staticBackdropLabel">EDITAR USUARIO <i
                                                    style="font-size: 30px;" class="fas fa-user-edit"></i>
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                action="index.php?c=<?=Conexion::encryptor('encrypt', 'user')?>&a=<?=Conexion::encryptor('encrypt', 'update')?>">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="id" class="form-control"
                                                            value="<?=$users->id?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="">Nombre</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="<?=$users->name?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="<?=$users->email?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Contraseña</label>
                                                        <?php $password = Conexion::encryptor('decrypt', $users->password);?>
                                                        <input id="password" type="text" name="password"
                                                            class="form-control" value="<?=$password?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Level</label>
                                                        <select class="form-control" name="level" id="level">
                                                            <option <?php if($users->level == 1) echo"selected";?>
                                                                value="1">Super Usuario</option>
                                                            <option <?php if($users->level == 2) echo"selected";?>
                                                                value="2">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="eliminar<?=$num?>" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR USUARIO
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger text-center" role="alert">
                                                <i style="font-size: 40px;" class="fas fa-exclamation-triangle"></i>
                                                <br>
                                                Se eliminara el usuario <?=$users->name?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-block"
                                                data-dismiss="modal">Cancelar</button>
                                            <a class="btn btn-danger btn-block" type="buttom"
                                                href="index.php?c=<?=Conexion::encryptor('encrypt', 'user')?>&a=<?=Conexion::encryptor('encrypt', 'delete')?>&id=<?php echo $users->id; ?>">
                                                <i style="font-size: 20px;" class="fas fa-trash-alt"></i>Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="subir<?=$num?>" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="staticBackdropLabel">SUBIR ARCHIVO
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="index.php?c=<?=Conexion::encryptor('encrypt', 'user')?>&a=<?=Conexion::encryptor('encrypt', 'subirDocument')?>"
                                                method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$users->id?>">
                                                <input type="file" name="archivo">
                                                <br><br>
                                                <button class="btn btn-primary btn-block">SUBIR
                                                    ARCHIVO</button>
                                                <button type="button" class="btn btn-danger btn-block"
                                                    data-dismiss="modal">CANCELAR</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR NUEVO USUARIO</h5>
            </div>
            <div class="modal-body">
                <form method="POST"
                    action="index.php?c=<?=Conexion::encryptor('encrypt', 'user')?>&a=<?=Conexion::encryptor('encrypt', 'create')?>">
                    <div class="row">
                        <div class="col">
                            <label for="">Nombre</label>
                            <input type="text" name="name" class="form-control" value="" placeholder="Nombre">
                        </div>

                        <div class="col">
                            <label for="">Correo</label>
                            <input type="email" name="email" class="form-control" value="" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" class="form-control" value=""
                                placeholder="Contraseña">
                        </div>
                        <div class="col">
                            <label for="">Rol</label>
                            <select class="form-control" name="level" id="level">
                                <option value="1">Super Usuario</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>