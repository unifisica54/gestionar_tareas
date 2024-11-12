<?php

namespace App\Collections;

use Illuminate\Support\Collection;
class EstadoCollection extends Collection
{
    public static function filtro($request)
    {
        return array_merge([
            'descripcion' => $request['descripcion'],
            'users_id'=> auth()->user()->id,
        ]);
    }
}