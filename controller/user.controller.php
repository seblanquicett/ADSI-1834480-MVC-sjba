<?php
require_once "model/user.php";

class UserController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new User();
    }

    
    public function index()
    {
        require_once "view/header.php";
        require_once "view/footer.php";
    }

    public function listar()
    {
        $users = $this->model->listar();
        require_once "view/header.php";
        require_once "view/mensaje.php";
        require_once "view/tables.php";
        require_once "view/footer.php";
    }


    public function update(){
        $user = new User();
        $user->id = $_REQUEST['id'];
        $user->name = $_REQUEST['name'];
        $user->email = $_REQUEST['email'];
        $user->password = $_REQUEST['password'];
        $user->level = $_REQUEST['level'];
        $this->model->update($user);
        $c = Conexion::encryptor('encrypt', 'user');
        $listar = Conexion::encryptor('encrypt', 'listar');
        $msj = Conexion::encryptor('encrypt', 'Usuario Actualizado Correctamente!!!');
        header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
    }

    public function create(){
        $user = new User();
        $user->id = $_REQUEST['id'];
        $user->name = $_REQUEST['name'];
        $user->email = $_REQUEST['email'];
        $user->password = $_REQUEST['password'];
        $user->level = $_REQUEST['level'];
        $this->model->create($user);
        $c = Conexion::encryptor('encrypt', 'user');
        $listar = Conexion::encryptor('encrypt', 'listar');
        $msj = Conexion::encryptor('encrypt', 'Usuario Creado Correctamente!!!');
        header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->model->delete($id);
        $c = Conexion::encryptor('encrypt', 'user');
        $listar = Conexion::encryptor('encrypt', 'listar');
        $msj = Conexion::encryptor('encrypt', 'Usuario Eliminado Correctamente!!!');
        header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
    }

    public function login()
    {
        require_once "view/mensaje.php";
        require_once "view/user/login.php";
    }

    public function validate($email, $password)
    {
        $row = $this->model->validate($email, $password);
        if (($row) != false) {
            $lastAccess = $this->model->lastAccess($row->id);
            $_SESSION['id']   = $row->id;
            $_SESSION['name'] = $row->name;
        }
        header('Location: index.php');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    public function subirDocument()
    {
        $id          = $_REQUEST['id'];
        $guardado    =$_FILES['archivo']['tmp_name'];
        $tipoArchivo =$_FILES['archivo']['type'];
        $cedulaPDF   =$target_di = 'Cedula.pdf';
        $cedulaPNG   =$target_di = 'Cedula.png';
        

        $c = Conexion::encryptor('encrypt', 'user');
        $listar = Conexion::encryptor('encrypt', 'listar');

        if(!file_exists('archivos/'.$id)){
            mkdir('archivos/'.$id,0777,true);
            if(file_exists('archivos/'.$id)){
                if($tipoArchivo == "application/pdf"){
                    move_uploaded_file($guardado, 'archivos/'.$id.'/'.$cedulaPDF);
                    $msj = Conexion::encryptor('encrypt', 'Archivo Subido con Exito!!!');
                    header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
                }elseif ($tipoArchivo == "image/png") {
                    move_uploaded_file($guardado, 'archivos/'.$id.'/'.$cedulaPNG);
                    $msj = Conexion::encryptor('encrypt', 'Archivo Subido con Exito!!!');
                    header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
                }
                else{
                    $msj = Conexion::encryptor('encrypt', 'Formato de Archivo No soportado!!!');
                    header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
                }
            }
        }else{
            if($tipoArchivo == "application/pdf"){
                move_uploaded_file($guardado, 'archivos/'.$id.'/'.$cedulaPDF);
                $msj = Conexion::encryptor('encrypt', 'Archivo Subido con Exito!!!');
                header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
            }elseif ($tipoArchivo == "image/png") {
                move_uploaded_file($guardado, 'archivos/'.$id.'/'.$cedulaPNG);
                $msj = Conexion::encryptor('encrypt', 'Archivo Subido con Exito!!!');
                header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
            }
            else{
                $msj = Conexion::encryptor('encrypt', 'Formato de Archivo No soportado!!!');
                header('Location: index.php?c='.$c.'&a='.$listar.'&m='.$msj);
            }
        }
    }

    public function verArchivos()
    {
        $id = Conexion::encryptor('decrypt', $_REQUEST['id']);
        require_once "view/header.php";
        require_once "view/mensaje.php";
        require_once "view/user/archivos.php";
        require_once "view/footer.php";
    }
}