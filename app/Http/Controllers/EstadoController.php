<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\EstadoCollection;
use App\Http\Requests\EstadoRequest;
use App\Models\Estado;
class EstadoController extends Controller
{
    public function index(Request $request)
    {
        $data = Estado::listar($request->input(),['descripcion'],[]);
        return response()->json($data);
    }

    public function store(EstadoRequest $request)
    {
        $data = Estado::grabar(EstadoCollection::filtro($request->validated()));
        return response()->json($data);
    }

    public function edit(Request $request,string $id)
    {
        $result = Estado::editar($request,$id);
        return response()->json($result);
    }
    
    public function update(EstadoRequest $request, string $id)
    {
        $data = Estado::actualizar(EstadoCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Estado::eliminar($request,$id);
        return response()->json($data);
    }
}
