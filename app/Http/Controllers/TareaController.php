<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\TareaCollection;
use App\Http\Requests\TareaRequest;
use App\Models\Tarea;
class TareaController extends Controller
{
    public function index(Request $request)
    {
        $data = Tarea::listar($request->input(),['dni','titulo','descripcion'],['estado']);
        return response()->json($data);
    }

    public function store(TareaRequest $request)
    {
        $data = Tarea::grabar(TareaCollection::filtro($request->validated()));
        return response()->json($data);
    }

    public function edit(Request $request,string $id)
    {
        $result = Tarea::editar($request,$id);
        return response()->json($result);
    }
    
    public function update(TareaRequest $request, string $id)
    {
        $data = Tarea::actualizar(TareaCollection::filtro($request->validated()),$id);
        return response()->json($data);
    }

    public function delete(Request $request, string $id)
    {
        $data=Tarea::eliminar($request,$id);
        return response()->json($data);
    }

}
