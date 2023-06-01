<?php
namespace BookStore\Validacion;
class ProductoValidar
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

    /**
     * @return array
     */
    public function getErrores(): array
    {
        return $this->errores;
    }

    protected function validar()
    {
        //Titulo
        if(empty($this->data['nombre'])) {
            $this->errores['nombre'] = 'Tenés que escribir el nombre del producto';
        } else if(strlen($this->data['nombre']) < 5){
            $this->errores['nombre'] = 'Tenés que escribir al menos 5 caracteres para el nombre del producto';
        }
        if(empty($this->data['nombre_autor'])){
            $this->errores['nombre_autor'] = 'Tenés que escribir el nombre del autor';
        }
        if(empty($this->data['apellido_autor'])){
            $this->errores['apellido_autor'] = 'Tenés que escribir el apellido del autor';
        }

        if(empty($this->data['categoria_id_fk'])) {
            $this->errores['categoria_id_fk'] = 'Tenés que escribir la categoria del producto';
        }

        if(empty($this->data['precio'])) {
            $this->errores['precio'] = 'Debes incluir el precio del producto';
        } else if(!is_numeric($this->data['precio'])){
            $this->errores['precio'] = 'No puedes escribir letras en este campo';
        }

        if(empty($this->data['descripcion'])) {
            $this->errores['descripcion'] = 'Debes incluir una descripcion para el producto';
        } else if(strlen($this->data['descripcion']) < 25){
            $this->errores['descripcion'] = 'La descripción debe tener más de 25 caractéres';
        }

        if(empty($this->data['imagen'])) {
            $this->errores['imagen'] = 'Debes incluir una imagen para el producto';
        }
    }
}
