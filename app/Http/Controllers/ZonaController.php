<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zona;


/**
 * @OA\Get(
 *     path="/api/zonas",
 *     summary="Obtener toda las zonas registradas",
 *     description="Devuelve todas las zonas registradas en la tabla zona de la base de datos, no requiere parámetros",
 *     operationId="obtenerZonas",
 *     tags={"Zona"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Zonas devueltas satisfactoriamente",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="msg", type="string", example="Valores encontrados"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id_zona", type="integer", example=1),
 *                     @OA\Property(property="id_pais", type="integer", example="1"),
 *                     @OA\Property(property="nombre_zona", type="string", example="Zona Occidental")
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=200),
 *                     @OA\Property(property="msg", type="string", example="")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="4")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No se encontraron valores",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="status", type="integer", example=404),
 *             @OA\Property(property="msg", type="string", example="No se han encontrado valores"),
 *             @OA\Property(property="data", type="string", example=""),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=404),
 *                     @OA\Property(property="msg", type="string", example="La base de datos no devolvió registros")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="0")
 *         )
 *     )
 * )
 * 
 * @OA\Get(
 *     path="/api/zona/{idzona}",
 *     summary="Obtener una zona en específico",
 *     description="Devuelve únicamente el registro de una zona en específico, de acuerdo al parámetro que ha sido enviado en la URL",
 *     operationId="obtenerZona",
 *     tags={"Zona"},
 *
 *      @OA\Parameter(
 *          name="idzona",
 *          in="path",
 *          description="Buscar por id de zona",
 *          required=true,
 *          example="1",
 *      ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Zona devuelta satisfactoriamente",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="msg", type="string", example="Valores encontrados"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id_zona", type="integer", example=1),
 *                     @OA\Property(property="id_pais", type="integer", example="1"),
 *                     @OA\Property(property="nombre_zona", type="string", example="Zona Occidental"),
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=200),
 *                     @OA\Property(property="msg", type="string", example="")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="1")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No se encontraron valores",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="status", type="integer", example=404),
 *             @OA\Property(property="msg", type="string", example="No se han encontrado valores"),
 *             @OA\Property(property="data", type="string", example=""),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=404),
 *                     @OA\Property(property="msg", type="string", example="La base de datos no devolvió registros")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="0")
 *         )
 *     )
 *	)
 *
 *
 *
 * @OA\Get(
 *     path="/api/zonaspais/{idpais}",
 *     summary="Obtener todas las zonas de un país",
 *     description="Devuelve todos los registros de zonas que le pertenecen a un país específico, se requiere envío del id de país como parámetro",
 *     operationId="obtenerZonaPais",
 *     tags={"Zona"},
 *
 *     @OA\Parameter(
 *         name="idpais",
 *         in="path",
 *         description="Buscar por id de pais",
 *         required=true,
 *         example="1",
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Zonas devueltas satisfactoriamente",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="msg", type="string", example="Valores encontrados"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id_zona", type="integer", example=1),
 *                     @OA\Property(property="id_pais", type="integer", example="1"),
 *                     @OA\Property(property="nombre_zona", type="string", example="Zona Occidental"),
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=200),
 *                     @OA\Property(property="msg", type="string", example="")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="1")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No se encontraron valores",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="status", type="integer", example=404),
 *             @OA\Property(property="msg", type="string", example="No se han encontrado valores"),
 *             @OA\Property(property="data", type="string", example=""),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=404),
 *                     @OA\Property(property="msg", type="string", example="La base de datos no devolvió registros")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="0")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Parámetro no enviado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="status", type="integer", example=400),
 *             @OA\Property(property="msg", type="string", example="No se ha enviado un parámetro obligatorio"),
 *             @OA\Property(property="data", type="string", example=""),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=400),
 *                     @OA\Property(property="msg", type="string", example="El identificador de país está vacío")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="0")
 *         )
 *     )
 *	)
 *
 *
 * @OA\Post(
 *     path="/api/nuevazona",
 *     summary="Create una nueva zona",
 *     description="Create el registro de una nueva zona específica para un país, de acuerdo a valores enviados.",
 *     operationId="crearZona",
 *     tags={"Zona"},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         description="Creación de una nueva zona geográfica",
 *         @OA\JsonContent(
 *             required={"idpais", "nombrezona"},
 *             @OA\Property(property="idpais", type="integer", example=2),
 *             @OA\Property(property="nombrezona", type="string", example="Zona de prueba")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Se ha creado el registro de zona satisfactoriamente",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="status", type="integer", example=200),
 *             @OA\Property(property="msg", type="string", example="Se guardaron los datos correctamente"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id_zona", type="integer", example=4),
 *                     @OA\Property(property="id_pais", type="integer", example="2"),
 *                     @OA\Property(property="nombre_zona", type="string", example="Zona de prueba"),
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=200),
 *                     @OA\Property(property="msg", type="string", example="")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="1")
 *         )
 *     ),
 *
 *     
 *
 *     
 *     @OA\Response(
 *         response=500,
 *         description="Hubo un problema interno",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="status", type="integer", example=500),
 *             @OA\Property(property="msg", type="string", example="Hubo un problema al guardar los datos"),
 *             @OA\Property(property="data", type="string", example=""),
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="code", type="integer", example=500),
 *                     @OA\Property(property="msg", type="string", example="No se pudo hacer insert a la tabla")
 *                 )
 *             ),
 *             @OA\Property(property="total", type="integer", example="0")
 *         )
 *     )
 * )
 * 
 *
 */

class ZonaController extends Controller
{
    //

    public function obtenerZonas()
    {
        $Zona = new Zona();

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores =[];

        $valores = $Zona::all();
        
        //VERIFICACION DE EXISTENCIA DE DATOS   
        if(!empty($valores))
        {
            //SI SE ENCONTRARON DATOS
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Valores encontrados";
            $errores = 
            [
                "code" => 200,
                "msg" => ""
            ];
        }
        else
        {
            // NO SE ENCONTRARON DATOS
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se han encontrado valores";
            $errores = 
            [
                "code" => 404,
                "msg" => "Datos no encontrados"
            ];
        }

        //SE CREA LA VARIABLE DE SALIDA
        $respuesta = 
        [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "errors" => $errores,
            "total" => sizeof($valores)
        ];

        //SE RETORNA EL MENSAJE AL USUARIO
        return response()->json($respuesta,$estado);
    }



    public function obtenerZona(int $idzona = 0)
    {

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores =[];

        if($idzona > 0)
        {
            //EL PARAMETRO DE $idzona > 0
            $Zona = new Zona();
            $valores = $Zona->where('id_zona', $idzona)->get();

            //VERIFICACION DE EXISTENCIA DE DATOS   
             if(!empty($valores))
            {
             //SI SE ENCONTRARON DATOS
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Valores encontrados";
            $errores = 
            [
              "code" => 200,
               "msg" => ""
            ];
         }
         else
         {
            // NO SE ENCONTRARON DATOS
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se han encontrado valores";
            $errores = 
            [
                "code" => 404,
                "msg" => "Datos no encontrados"
            ];
        } //FIN DEL IF (!EMPTY(VALORES)){

        }
        else
        {
            // NO SE HA ENVIADO UN VALOR PARA EL PARAMETRO $idzona
            $satisfactorio = false;
            $estado = 400;
            $mensaje = "No se ha enviado el parametro obligatorio";
            $errores = 
            [
                "code" => 400,
                "msg" => "El identificador de la zona esta vacio"
            ];
        }//FIN DEL IF($idzona . 0){
        
        //SE CREA LA VARIABLE DE SALIDA
        $respuesta= [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "errors" => $errores,
            "total" => sizeof($valores)
        ];

        //SE MUESTRA EL MENSAJE AL USUARIO
        return response()->json($respuesta,$estado);
    }

    public function obtenerZonaPais(int $idpais = 0)
    {

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores =[];

        if($idpais > 0)
        {
            //EL PARAMETRO DE $idpais > 0
            $Zona = new Zona();
            $valores = $Zona->where('id_pais', $idpais)->get();

            //VERIFICACION DE EXISTENCIA DE DATOS   
             if(!empty($valores))
            {
             //SI SE ENCONTRARON DATOS
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Valores encontrados";
            $errores = 
            [
              "code" => 200,
               "msg" => ""
            ];
         }
         else
         {
            // NO SE ENCONTRARON DATOS
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se han encontrado valores";
            $errores = 
            [
                "code" => 404,
                "msg" => "Datos no encontrados"
            ];
        } //FIN DEL IF (!EMPTY(VALORES)){

        }
        else
        {
            // NO SE HA ENVIADO UN VALOR PARA EL PARAMETRO $idpais
            $satisfactorio = false;
            $estado = 400;
            $mensaje = "No se ha enviado el parametro obligatorio";
            $errores = 
            [
                "code" => 400,
                "msg" => "El identificador de la pais esta vacio"
            ];
        }//FIN DEL IF($idpais > 0){
        
        //SE CREA LA VARIABLE DE SALIDA
        $respuesta= [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "errors" => $errores,
            "total" => sizeof($valores)
        ];

        //SE MUESTRA EL MENSAJE AL USUARIO
        return response()->json($respuesta,$estado);
    }

    public function crearZona(Request $request){

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores =[];

        //  VALIDACION DE DATOS DE ENTRADA EN LOS PARAMETROS    
        $validacion = $request->validate([
            "idpais" => "required|integer|gt:0",
            "nombrezona" => "required|max:50"
        ]);

        $Zona  = new Zona();

        //Se ASIGNAN A CADA ATRIBUTO DE LA TABLA LOS CAMPOS DEL FORMULARIO
        $Zona ->id_pais = $request->idpais;
        //------(campo de BD)------(campo de form)
        $Zona->nombre_zona = $request->nombrezona;
        //------(campo de BD)------(campo de form)

        $insertado = $Zona->save(); //Se hace el insert a la base de datos
        
        if($insertado){
            $ultimoinsertado = $Zona->id_zona;
            $datosinsertados = $this->obtenerZona($ultimoinsertado);

            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Se guardaron los datos correctamente";
            $errores = 
            [
                "code" => 200,
                "msg" => ""
            ];
        }else{
            $satisfactorio = false;
            $estado = 500;
            $mensaje = "Hubo un problema al guardar los datos";
            $errores = 
            [
                "code" => 500,
                "msg" => "No se pudo hacer insert a la tabla Zona"
            ];
        }

        //SE CREA LA VARIABLE DE SALIDA
        $respuesta= [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $datosinsertados->original["data"][0],
            "errors" => $errores,
            "total" => $datosinsertados->original["total"]
            //"total" => sizeof($valores)
        ];

        //SE MUESTRA EL MENSAJE AL USUARIO
        return response()->json($respuesta,$estado);

    }
}
