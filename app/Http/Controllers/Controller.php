<?php

namespace App\Http\Controllers;



/**
 * @OA\OpenApi(
 * @OA\Info(
 *      version="1.0.0",
 *      title="Documentacion de API de victor andre mejia castellanos",
 *      description="API desarrollada por victor andre mejia, para la Universidad Francisco Gavidia",
 *      @OA\Contact(
 *          email="ia.andycastellanos@ufg.edu.sv"      
 *      ),
 *      @OA\License(
 *      name="Apache 2.0",
 *      url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * )
 * 
 * @OA\Server(
 *      url="http://localhost:8000",
 *      description="Servidor local de desarrollo"
 * )
 * 
 * @OA\Server(
 *      url="http://testing.ejemplo.com/",
 *      description="Servidor para pruebas"
 * )
 * 
 * @OA\Server(
 *      url="http://klrm.ejemplo.com",
 *      description="Servidor de produccion"
 * )
 * 
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      name="Authorization",
 *      in="header"
 * )
 * 
 * @OA\Tag(
 *   name="Zonas",
 *   description="Proyecto de desarrollo para mantenimiento de tabla de bd Catalogos, especificamente para la tabla Zona"
 * )
 */
abstract class Controller
{
    
   
}
