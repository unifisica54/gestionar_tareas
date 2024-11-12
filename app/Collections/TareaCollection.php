<?php

namespace App\Collections;

use Illuminate\Support\Collection;
class TareaCollection extends Collection
{
    public static function filtro($request)
    {
        
        return array_merge([
            'dni' => $request['dni'],
            'titulo' => $request['descripcion'],
            'descripcion' => $request['descripcion'],
            'fecha_vencimiento' => $request['fecha_vencimiento'],
            'estado_id' => $request['estado_id'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}