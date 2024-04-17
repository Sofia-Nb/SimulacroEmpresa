<?php
/**
 * En la clase Cliente:
 * 1. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */

 class Cliente{
    private $nombre; // STRING.
    private $apellido; // STRING.
    private $estaDadoDeBaja; // BOOLEAN.
    private $tipoDocumento; // STRING DNI, LIBRETA CIVICA, LIBRETA DE ENROLAMIENTO...
    private $numeroDocumento; // ENTERO.
    
    // MÉTODO CONSTRUCTOR.
    public function __construct($nom, $ap, $estado, $tipDoc, $numDoc){
        $this->nombre = $nom;
        $this->apellido = $ap;
        $this->estaDadoDeBaja = $estado;
        $this->tipoDocumento = $tipDoc;
        $this->numeroDocumento = $numDoc;
    }
    
    // MÉTODOS DE ACCESO (GETTERS).
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstadoDadoDeBaja(){
        return $this->estaDadoDeBaja;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    // MÉTODOS DE ACCESO (SETTERS).
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setEstadoDadoDeBaja($estado){
        $this->estaDadoDeBaja = $estado;
    }
    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }
    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento = $numeroDocumento;
    }

    // MÉTODO estadoCliente: Este método valida si el cliente está o no dado de baja.
    public function estadoCliente(){
        $validacion = $this->getEstadoDadoDeBaja(); // valor TRUE o FALSE.
        if ($validacion){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    // MÉTODO __toSTRING.
    public function __toString(){
        $estado = $this->estadoCliente();
        $cartelClientes = "-----------------------------------------------------------\n";
        $cartelClientes .= "CLIENTE: \n";
        $cartelClientes .= "Nombre del cliente: ".$this->getNombre()."\n";
        $cartelClientes .= "Apellido del cliente: ".$this->getApellido()."\n";
        if ($estado){
            $cartelClientes .= "Estado: Cliente activo\n";
        }else{
            $cartelClientes .= "Estado: Cliente bloqueado\n";
        }
        $cartelClientes .= "Documento: ".$this->getTipoDocumento()." - N° ".$this->getNumeroDocumento()."\n";
        $cartelClientes .= "-----------------------------------------------------------\n";
        
        return $cartelClientes;
    }
}