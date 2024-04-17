<?php
/**
 * 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
 * incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
 * venta y false en caso contrario).
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
 * clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
 * Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
 * la venta, el método realiza el siguiente cálculo:
 * 
 *  $_venta = $_compra + $_compra * (anio * por_inc_anual)
 * donde $_compra: es el costo de la moto.
 * anio: cantidad de años transcurridos desde que se fabricó la moto.
 * por_inc_anual: porcentaje de incremento anual de la moto.
 */

 class Moto{
    private $codigo; // ENTERO
    private $costo; // FLOAT
    private $anioFabricacion; // ENTERO
    private $descripcion; // STRING
    private $porcentajeIncrementoAnual; // ENTERO
    private $activa; // BOOLEAN: DISPONIBLE (TRUE) NO DISPONIBLE (FALSE)

    // MÉTODO CONSTRUCTOR.
    public function __construct($cod, $cost, $anioFabric, $desc, $incrementoAnual, $act){
        $this->codigo = $cod;
        $this->costo = $cost;
        $this->anioFabricacion = $anioFabric;
        $this->descripcion = $desc;
        $this->porcentajeIncrementoAnual = $incrementoAnual;
        $this->activa = $act;
    }
    
    // MÉTODOS DE ACCESO (GETTERS).
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }
    
    // MÉTODOS DE ACCESO (SETTERS).
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    /**
     * calcula el valor por el cual puede ser vendida una moto.
     * Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
     * la venta, el método realiza el siguiente cálculo
     */
    public function darPrecioVenta(){
        $validacion = $this->getActiva();
        $compra = $this->getCosto();
        $anioFabricacion = $this->getAnioFabricacion();
        $anio = date("Y") - $anioFabricacion;
        $porIncanual = $this->getPorcentajeIncrementoAnual();
        if ($validacion){
            $venta = $compra + $compra * ($anio * $porIncanual);
        }else{
            $venta = 0;
        }
        return $venta;
    }

        // MÉTODO estadoCliente: Este método valida si el cliente está o no dado de baja.
        public function estadoActivo(){
            $res = "";
            $validacion = $this->getActiva(); // valor TRUE o FALSE.
            if ($validacion){
                $res = "Disponible.\n";
            }else{
                $res = "No disponible\n";
            }
            return $res;
        }

    // MÉTODO __toSTRING.
    public function __toString(){
        $cartelMotos = "------------------------------------------------\n";
        $cartelMotos .=  "MOTO: \n";
        $cartelMotos .= "Código de la moto: ".$this->getCodigo()."\n";
        $cartelMotos .= "Año de fabricacion: ".$this->getAnioFabricacion()."\n";
        $cartelMotos .= "Descripcion: ".$this->getDescripcion()."\n";
        $cartelMotos .= "Estado: ".$this->estadoActivo()."\n";
        $cartelMotos .= "Costo Total: ".$this->darPrecioVenta()."\n";
        $cartelMotos .= "------------------------------------------------\n";

        return $cartelMotos;
    }
 }