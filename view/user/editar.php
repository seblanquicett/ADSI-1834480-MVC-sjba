<div class="container">
    <form method="POST" action="index.php?c=user&a=update">
        <div class="row">
            <div class="col">
                <input type="hidden" name="id" class="form-control" value="<?=$user->id?>">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" value="<?=$user->name?>">
            </div>
            <div class="col-6">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?=$user->email?>">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Level</label>
                <select class="form-control" name="level" id="level">
                    <option <?php if($user->level == 1) echo"selected";?> value="1" >Super Usuario</option>
                    <option <?php if($user->level == 2) echo"selected";?> value="2">Admin</option>
                </select>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
