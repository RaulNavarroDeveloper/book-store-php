<?php
namespace BookStore\Modelos;
use BookStore\Database\DBConexion;
use PDO;
use DateTime;
class Producto
{
    protected ?string $nombre;
    protected ?string $categoria_id_fk;
    protected ?string $categoria_nombre;
    protected  ?int $producto_id;
    protected ?string $autor;
    protected ?string $descripcion;
    protected ?int $precio;
    protected ?int $oferta;
    protected ?string $imagen;
    protected ?string $imagen_alt;
    protected ?string $imagen_preview;
    protected ?float $calificacion;




    public function info ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items i JOIN categorias c ON i.categoria_id_fk = c.categoria_id;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    // METODO ANTERIOR DE FILTRADO.
    //        $array = (new self())->info();
    //        $Afiltrado = array_filter($array, function($data) {
    //            return $data->getCategoriaId() === '5';
    //        });
    //         return $Afiltrado;

    public function categoriaEconomia ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items WHERE categoria_id_fk = 1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();

    }

    public function categoriaDesarrolloPersonal ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items WHERE categoria_id_fk = 2";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    public function categoriaInformatica ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items WHERE categoria_id_fk = 3";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    public function categoriaEspiritualidad ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items WHERE categoria_id_fk = 4";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    public function categoriaFiccion ()
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items WHERE categoria_id_fk = 5";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }


    public function buscarPorId (int $id)
    {
        $db = DBConexion::getConexion();
        $query = "SELECT * FROM items JOIN categorias on items.categoria_id_fk = categorias.categoria_id
                  WHERE producto_id = ?" ;
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $items = $stmt->fetch();

        return $items ? $items : null;
    }

    public function descripcionCorta (int $id)
    {
        $productos = (new self())->info();
        foreach ($productos as $producto){
            if ($producto->getProductoId() === $id){

                $descripcion = $producto->getDescripcion();
                $cantidadCaracteres = strlen($descripcion);
                if($cantidadCaracteres > 250){
                   $descripcionCorta = substr($descripcion, 0, 250);
                    return $descripcionCorta . '...';
                }
            }
        }
    }

    public function DescripcionAdministracion (int $id)
    {
        $productos = (new self())->info();
        foreach ($productos as $producto){
            if($producto->getProductoId() === $id){
                $descripcion = $producto->getDescripcion();
                $descripcionCorta = substr($descripcion, 0, 200);
                return $descripcionCorta . '...';
            }
        }
    }

    public function  crear (array $data)
    {
        $db = DBConexion::getConexion();
        //TODO: Fecha de publicacion
        $query = "INSERT INTO items (usuario_id_fk, nombre, autor, categoria_id_fk, precio, oferta, imagen, imagen_preview, imagen_alt, descripcion)
                  VALUES (:usuario_id_fk, :nombre, :autor, :categoria_id_fk, :precio, :oferta, :imagen, :imagen_preview, :imagen_alt, :descripcion)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'usuario_id_fk'     => $data['usuario_id_fk'],
            'nombre'            => $data['nombre'],
            'autor'             => $data['nombre_autor'] . " " .  $data['apellido_autor'],
            'categoria_id_fk'   => $data['categoria_id_fk'],
            'precio'            => $data['precio'],
            'oferta'            => $data['oferta'],
            'imagen'            => $data['imagen'],
            'imagen_preview'    => $data['imagen_preview'],
            'imagen_alt'      => $data['imagen_alt'],
//            'calificacion'    => $data['calificacion'],
            'descripcion'       => $data['descripcion']
        ]);
    }

    public function eliminar ():void
    {
        $db = DBConexion::getConexion();
        $query = "DELETE FROM items
                  WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->getProductoId()]);

    }

    public function editar (array $data):void
    {
        $db = DBConexion::getConexion();
        $query= "UPDATE items
                SET usuario_id_fk       = :usuario_id_fk,
                    nombre              = :nombre,
                    autor               = :autor,
                    categoria_id_fk     = :categoria_id_fk,
                    precio              = :precio,
                    oferta              = :oferta,
                    imagen              = :imagen,
                    imagen_preview      = :imagen_preview,
                    imagen_alt          = :imagen_alt,
                    descripcion         = :descripcion
                WHERE producto_id       = :producto_id" ;
        $stmt = $db->prepare($query);
        $stmt->execute([
            'producto_id'               => $this->getProductoId(),
            'usuario_id_fk'             => $data['usuario_id_fk'],
            'nombre'                    => $data['nombre'],
            'autor'                     => $data['nombre_autor'] . " " .  $data['apellido_autor'],
            'categoria_id_fk'           => $data['categoria_id_fk'],
            'precio'                    => $data['precio'],
            'oferta'                    => $data['oferta'],
            'imagen'                    => $data['imagen'],
            'imagen_preview'            => $data['imagen_preview'],
            'imagen_alt'                => $data['imagen_alt'],
            'descripcion'               => $data['descripcion'],
        ]);
    }
    public function getProductoId() : ?int
    {
        return $this->producto_id;
    }

    public function setProductoId (?int $producto_id) :void
    {
        $this->producto_id = $producto_id;
    }

    public function getNombre () : ?string
    {
        return $this->nombre;
    }

    public function setNombre (?string $nombre) :void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion () : ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion (?string $descripcion) :void
    {
        $this->descripcion = $descripcion;
    }

    public function getAutor () : ?string
    {
        return $this->autor;
    }

    public function setAutor (?string $autor) :void
    {
        $this->autor = $autor;
    }

    public function getCategoriaId () : ?string
    {
        return $this->categoria_id_fk;
    }

    public function setCategoriaId (?string $categoria) :void
    {
        $this->categoria_id_fk = $categoria;
    }

    public function getCategoriaNombre () : ?string
    {
        return $this->categoria_nombre;
    }

    public function setCategoriaNombre (?string $categoria) :void
    {
        $this->categoria_nombre = $categoria;
    }

    public function getPrecio () : ?int
    {
        return $this->precio;
    }

    public function setPrecio (?int $precio) :void
    {
        $this->precio = $precio;
    }

    public function getOferta () : ?int
    {
        return $this->oferta;
    }

    public function setOferta (?int $oferta) :void
    {
        $this->oferta = $oferta;
    }

    public function getImagen () : ?string
    {
        return $this->imagen;
    }

    public function setImagen (?string $imagen) :void
    {
        $this->imagen = $imagen;
    }

    public function getImagenAlt () : ?string
    {
        return $this->imagen_alt;
    }

    public function setImagenAlt (?string $imagenAlt) : void
    {
        $this->imagen_alt = $imagenAlt;
    }

    public function getImagenPreview () : ?string
    {
        return $this->imagen_preview ;
    }

    public function setImagenPreview(?string $imagenPreview) : void
    {
        $this->imagen_preview = $imagenPreview;
    }

    public function getCalificacion () : ?float
    {
        return $this->calificacion ;
    }

    public function setCalificacion(?float $fecha_publicacion) : void
    {
        $this->calificacion = $this->fecha_publicacion;
    }

    public function calcularEnvio() : ?string
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $fecha = new DateTime();
        $fecha->modify('+1 day');
        $numdia = $fecha->format('d');
        $nomdia = $fecha->format('l');
        $mes = $fecha->format('m');
        switch($mes){
            case 01:
                $mes = 'Enero';
                break;
            case 02:
                $mes = 'Febrero';
                break;
            case 03:
                $mes = 'Marzo';
                break;
            case 04:
                $mes = 'Abril';
                break;
            case 05:
                $mes = 'Mayo';
                break;
            case 06:
                $mes = 'Junio';
                break;
            case 07:
                $mes = 'Julio';
                break;
            case '08':
                $mes = 'Agosto';
                break;
            case '09':
                $mes = 'Septiembre';
                break;
            case 10:
                $mes = 'Octubre';
                break;
            case 11:
                $mes = 'Noviembre';
                break;
            case 12:
                $mes = 'Diciembre';
                break;
                return $mes;
        }

        switch ($nomdia){
            case 'Monday':
                $nomdia = 'Lunes';
                break;
            case 'Tuesday':
                $nomdia = 'Martes';
                break;
            case 'Wednesday':
                $nomdia = 'Miercoles';
                break;
            case 'Thursday':
                $nomdia = 'Jueves';
                break;
            case 'Friday':
                $nomdia = 'Viernes';
                break;
            case 'Saturday':
                $nomdia = 'Sábado';
                break;
            case 'Sunday':
                $nomdia = 'Domingo';
                break;
                return $nomdia;
        }
        return "$nomdia $numdia de $mes";
    }


}

?>