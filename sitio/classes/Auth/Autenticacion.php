<?php
namespace BookStore\Auth;
use BookStore\Modelos\Usuario;
class Autenticacion
{
    public function iniciarSesion(string $email, string $password): bool
    {

        $usuario = (new Usuario())->traerPorEmail($email);

        if(!$usuario) {
            return false;
        }

        if(!password_verify($password, $usuario->getPassword())) {
            return false;
        }

        $this->autenticar($usuario);

        return true;
    }

    public function autenticar(Usuario $usuario)
    {
        $_SESSION['usuario_id'] = $usuario->getUsuarioId();
        $_SESSION['rol_fk_id'] = $usuario->getRolFkId();
    }

    public function cerrarSesion()
    {
        unset($_SESSION['usuario_id'], $_SESSION['rol_fk_id']);
    }

    public function estaAutenticado():bool
    {
        return isset($_SESSION['usuario_id']);
    }

    public function esAdmin():bool
    {
        return $_SESSION['rol_fk_id'] === 1;
    }

    public function getId(): ?int
    {
        return $this->estaAutenticado() ? $_SESSION['usuario_id'] : null;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->estaAutenticado() ? (new Usuario)->obtenerPorId($_SESSION['usuario_id']) : null;
    }
}