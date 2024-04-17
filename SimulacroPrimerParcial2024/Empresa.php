<?php
/**
 * 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
 * motos y la colección de ventas realizadas.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
 * 3. Los métodos de acceso para cada una de las variables instancias de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
 * retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
 * 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
 * parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
 * se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
 * Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
 * para registrar una venta en un momento determinado.
 * El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
 * venta.
 * 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
 * número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
 */

 class Empresa {
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;

    public function __construct($denom, $direc, $colClient, $colMotos, $colVentas){
        $this->denominacion = $denom;
        $this->direccion = $direc;
        $this->coleccionClientes = $colClient;
        $this->coleccionMotos = $colMotos;
        $this->coleccionVentas = $colVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function getColeccionVentas(){
        return $this->coleccionVentas;
    }

    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setColeccionClientes($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setColeccionVentas($coleccionVentas){
        $this->coleccionVentas = $coleccionVentas;
    }

    /**
     * recorre la colección de motos de la Empresa y
     * retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     */
    public function retornarMoto($codigoMoto){
        $arrayMotos = $this->getColeccionMotos();
        $objMoto= null;
        $i=0;
        while($i<count($arrayMotos) && $objMoto == null){
            if($arrayMotos[$i]->getCodigo() == $codigoMoto){
                $objMoto = $arrayMotos[$i];
            }
            $i++;
        }return $objMoto;
        }      

     /**
      * recibe porparámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
      * se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
      * Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
      * para registrar una venta en un momento determinado.
      * El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
     * venta.
     */
     public function registrarVenta($colCodigosMoto, $objCliente){
            $fecha = ["Día" => 6, "Mes" => 12, "Año" => 2003];
            $objVenta = new Venta(0000, $fecha, $objCliente, 00000, []);
            $i = 0;
            $acum = 0;
            $colMoto = $this->getColeccionMotos();
            $encontrado = false;
            while ($i < count($colMoto) && $encontrado == false){
                $objMoto = $colMoto[$i];
                if (($colCodigosMoto) == ($objMoto->getCodigo())){
                    $coleccionMotos = $objVenta->getColeccionMotos();
                    $objVenta->setColeccionMotos($coleccionMotos);
                    $estado = $objCliente->getEstadoDadoDeBaja();
                    if (($estado) && ($objMoto->getActiva())){
                        $objVenta->incorporarMoto($objMoto);
                        $encontrado = true;
                        $precio = $objMoto->darPrecioVenta();
                        $acum = $acum + $precio;
                    }
                }
                $i++;
            }
            return $acum;
         }
        
    /**
     * recibe por parámetro el tipo y
     * número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
     */
    public function retornarVentasXCliente($tipo, $numDoc){
            $nuevaColeccion = [];
            $j = 0;
            $coleccionVentas = $this->getColeccionVentas();
            for ($i=0; $i < count($coleccionVentas); $i++){
                $objVentas = $coleccionVentas[$i];
                $objCliente = $objVentas->getObjCliente();
                $tipoDocumento = $objCliente->getTipoDocumento();
                $numeroDocumento = $objCliente->getNumeroDocumento();
                if (($tipo == $tipoDocumento) && ($numDoc == $numeroDocumento)){
                    $nuevaColeccion[$j] = $objVentas;
                    $j++;
                }
            }
            return $nuevaColeccion;
         }

     public function __toString(){
            $cartelEmpresa = "------------------------------------------------\n";
            $cartelEmpresa .= "EMPRESA: \n";
            $cartelEmpresa .= "Denominación: ".$this->getDenominacion()."\n";
            $cartelEmpresa .= "Dirección: ".$this->getDireccion()."\n";
            $cartelEmpresa .= "------------------------------------------------\n";

            return $cartelEmpresa;
         }
 }