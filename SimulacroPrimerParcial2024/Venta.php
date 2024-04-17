<?php
/**
 * 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
 * motos y el precio final.
 * 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
 * atributo de la clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 *  4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
 * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
 * vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
 * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
 */

 class Venta{
    private $numero;
    private $fecha;
    private Cliente $objCliente;
    private $ColeccionMotos;
    private $precioFinal;

    // MÉTODO CONSTRUCTOR.
    public function __construct($num, $fech, Cliente $objCliente, $preFinal, $colMotos){
        $this->numero = $num;
        $this->fecha = $fech;
        $this->objCliente = $objCliente;
        $this->ColeccionMotos = $colMotos;
        $this->precioFinal = $preFinal;
    }
    
    // MÉTODOS DE ACCESO (GETTERS).
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getColeccionMotos(){
        return $this->ColeccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    // MÉTODOS DE ACCESO (SETTERS).
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setObjCliente($referenciaCliente){
        $this->objCliente = $referenciaCliente;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->ColeccionMotos = $coleccionMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    /**
     * recibe por parámetro un objeto moto y lo
     * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
     * vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */
    public function incorporarMoto($objMoto){
        $colMotos = $this->getColeccionMotos();
        $estadoMoto = $objMoto->getActiva();
        if ($estadoMoto){
            array_push($colMotos, $objMoto);
            $this->setColeccionMotos($colMotos);
        }
        $precioMoto = $objMoto->darPrecioVenta();
        $this->setPrecioFinal($precioMoto);
    }

    // MÉTODO __toSTRING.
    public function __toString(){
        $colMotos = $this->getColeccionMotos();
        $cartelVentas = "------------------------------------------------\n";
        $cartelVentas .= "VENTA: \n";
        $cartelVentas .= "Número de venta: ".$this->getNumero()."\n";
        $cartelVentas .= "Fecha de venta: ".$this->getFecha()."\n";
        $cartelVentas .= $this->getObjCliente()."\n";
        $cartelVentas .= "Precio final: ".$this->getPrecioFinal()."\n";
        $cartelVentas .= "------------------------------------------------\n";

        return $cartelVentas;
    }
 }