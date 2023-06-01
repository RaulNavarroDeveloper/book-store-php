<?php
namespace BookStore\Modelos;
use BookStore\Database\DBConexion;
use PDO;
class Usuario
{
    protected int $usuario_id;
    protected int $rol_fk_id;
    protected string $email;
    protected string $password;
    protected string $nombre;
    protected string $apellido;

    public function traerPorEmail(string $email): ?Usuario
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM usuarios
                  WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        $usuario = $stmt->fetch();

        return $usuario ? $usuario : null;
    }
    public function obtenerPorId(int $id): ?Usuario
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM usuarios
                WHERE usuario_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $usuario = $stmt->fetch();
        return $usuario ? $usuario : null;
    }

    public function crear(array $data): void
    {
        $query = "INSERT INTO usuarios (nombre, apellido, email, password, rol_fk_id)
                  VALUES (:nombre, :apellido, :email, :password, :rol_fk_id)";
        DBConexion::getConexion()->prepare($query)->execute([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => $data['password'],
            'rol_fk_id' => $data['rol_fk_id'],
        ]);
    }

    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function getRolFkId(): int
    {
        return $this->rol_fk_id;
    }

    public function setRolFkId(int $rol_fk_id): void
    {
        $this->rol_fk_id = $rol_fk_id;
    }


}
