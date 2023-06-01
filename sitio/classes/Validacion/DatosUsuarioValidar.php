<?php
namespace BookStore\Validacion;

class DatosUsuarioValidar
{
    protected $data = [];
    protected $errores = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validar();
    }

    public function HayErrores() :bool
    {
        return !empty($this->errores);
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    protected function validar()
    {
        if(empty($this->data['nombre'])) {
            $this->errores['nombre'] = 'Es necesario tu nombre para el registro.';
        }
        if(empty($this->data['apellido'])) {
            $this->errores['apellido'] = 'Es necesario tu apellido para el registro.';
        }
        if(empty($this->data['email'])) {
            $this->errores['email'] = 'Debes colocar el email de inicio de sesión.';
        }
        if(empty($this->data['password'])) {
            $this->errores['password'] = 'Debes incluir la contraseña de acceso';
        } else if (strlen($this->data['password']) < 8){
            $this->errores['password'] = 'La contraseña debe tener al menos 8 caracteres';
        }
        if(empty($this->data['password_confirmar'])) {
            $this->errores['password_confirmar'] = 'Debes repetir la contraseña para asegurarte de que son iguales.';
        }
        if(!empty($this->data['password']) && !empty($this->data['password_confirmar'])){
            if($this->data['password'] !== $this->data['password_confirmar']){
                $this->errores['password_confirmar'] = 'Las contraseñas no coinciden, intentalo nuevamente.';
            }
        }

    }
}