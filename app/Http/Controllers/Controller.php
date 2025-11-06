<?php

namespace App\Http\Controllers;



 /**
     * @OA\Info(
     *  version="1.0.0",
     * titte=documtacion de API de  jaimejeovanny Cortez Flores",
     * description="API desarolladapor victor andy mejia castellanos para la universidad francisco gavidia"
     * @OA\Contact(
     *   email="ia.andycastellanos@ufg.edu.sv"
     * )
     * 
     * )
     * 
     * @OA\Licence(
     * name="Apache 2.0",
     * url="http://www.apache.org/licenses/LICENSE-2.0.html"
     * )
     * 
     * @OA\server(
     *     url="http://localhost:8000/",
     *     description="Servidor local de desarrollado"
     *)
     * 
     * @OA\server(
     *     url="http://testing.ejemplo.com/",
     *     description="Servidor para pruebas"
     *)
     * 
     * @OA\Securitycheme(
     *     seguritySchema="bearerAuth",
     *     type="http"
     *     scheme="Authorization"
     *     in="header"
     *) 
     *@OA\server(
     *     url="http://jjct.ejemplo.com/",
     *     description="Servidor para pruebas"
     *) 
     * 
     * @OA\tag(
     *   name="Zonas",
     *   description="proyecto de desarrollo de API pr mantenimientod tblade bd Catalogos,especificmente para la tabla Zona"
     *   
     * )
     * 
     * 
     */
abstract class Controller
{
    
   
}
