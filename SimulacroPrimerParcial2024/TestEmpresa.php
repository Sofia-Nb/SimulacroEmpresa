<?php
include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Moto.php';
include_once 'Venta.php';
/**
 * Una importante empresa de la región que vende motos, desea implementar una aplicación que le permita
 * gestionar la información de sus clientes, de las motos y de las ventas realizadas. Para ello se almacena
 * información de todos sus clientes, de cada unas de las motos disponibles en el local y de todas las ventas
 * realizadas.
 * Implementar las siguientes clases: Empresa, Venta, Cliente y Moto
 */

 $objCliente1 = new Cliente("Maria", "Flores", true, "DNI", 3243145435654);
 $objCliente2 = new Cliente ("Juan", "Gomez", false, "Pasaporte", 2343545332);
 $objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
 $objMoto2 = new Moto (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
 $objMoto3 = new Moto (13, 999900, 2023, "Zanella Patagonian Eagle 250 55", 55, false);
 $objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2 ], [$objMoto1, $objMoto2, $objMoto3], []);


 //CLIENTES:
 echo $objCliente1;
 echo $objCliente2;

 //MOTOS:
 echo $objMoto1;
 echo $objMoto2;
 echo $objMoto3;

 //EMPRESA: 
echo $objEmpresa;

// PUNTO (5)
$registrarVenta = $objEmpresa->registrarVenta([11, 12, 13], $objCliente1);
echo $registrarVenta;

//PUNTO (6)

$registrarVenta1 = $objEmpresa->registrarVenta([0], $objCliente2);
echo $registrarVenta1;

// PUNTO (7)

$registrarVenta2 = $objEmpresa->registrarVenta([2], $objCliente2);
echo $registrarVenta2;

// PUNTO (8)

$tipo = $objCliente1->getTipoDocumento();
$numero = $objCliente1->getNumeroDocumento();
$retornarVenta1 = $objEmpresa->retornarVentasXCliente($tipo, $numero);
echo $retornarVenta1;

// PUNTO (9)

$tipo = $objCliente2->getTipoDocumento();
$numero = $objCliente2->getNumeroDocumento();
$retornarVenta2 = $objEmpresa->retornarVentasXCliente($tipo, $numero);
echo $retornarVenta2;

// PUNTO (10)

echo $objEmpresa;