<?php
class User {

    private $pdo;

    public $id;
    public $name;
    public $email;
    public $password;
    public $level;
    public $active;
    public $lastAccess;
    public $session;
    public $avatar;
    public $timeStamp;

    public function __construct()
    {
      try
      {

          $this->pdo = Conexion::conectar();

      }

      catch (Exception $e)
      {

        die($e->getMessage());

      }
    }

    public function lastAccess($id)
    {
      $date = date('Y-m-d H-i-s');
      $stm = $this->pdo->prepare("UPDATE users SET lastAccess=? WHERE id=?");
      $stm->execute(array($date, $id));
    }

    public function validate($email, $password)
    {
        $password = Conexion::encryptor('encrypt', $password);
        $stm = $this->pdo->prepare("SELECT * FROM users WHERE email = ? and password = ?");
        $stm->execute(array($email, $password));
        if ($stm->rowCount() > 0) {

            return $stm->fetch(PDO::FETCH_OBJ);
        }
        else
        {
            return false;
        }
    }

    public function update($user)
    {
        $password = Conexion::encryptor('encrypt', $user->password);
        $stm = $this->pdo->prepare("UPDATE users SET name=?, email=?, password=?, level=? WHERE id=?");
        $stm->execute(array($user->name, $user->email, $password, $user->level, $user->id));
    }

    public function create($user)
    {
        $password = Conexion::encryptor('encrypt', $user->password);
        $stm = $this->pdo->prepare("INSERT INTO  users (name, email, password, level) VALUES(?,?,?,?)");
        $stm->execute(array(strtoupper($user->name), strtoupper($user->email), $password, $user->level));
    }

    public function delete($id)
    {
        $stm = $this->pdo->prepare("DELETE FROM users WHERE id=?");
        $stm->execute(array($id));
    }

    public function listar()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM users ORDER BY name");
            $stm->execute();

            if ($stm->rowCount() > 0) {

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            else
            {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }


}

?>
