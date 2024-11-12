<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class BaseModel extends Model
{
    use HasFactory;

    use HasFactory;
    const TABLE_NAME = 'default_table_name';
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    public static function listar($buscar, $column, $with)
    {
        $data = self::with($with)->buscar($buscar, $column)->activo()->orden()
            ->paginate($buscar['size']);
        if (!$data)
            return ['data' => false, 'message' => 'no exite registro'];
        return ['data' => $data, 'message' => 'Listado con exito!'];
    }
    public static function actualizar($request, $id)
    {
        $data = $request;
        $result = self::activo()
            ->where('id', $id)
            ->update($data);
        if (!$result)
            return ['data' => false, 'message' => 'no exite registro'];
        return ['data' => $result, 'message' => 'Actualizado con exito!'];
    }
    public static function grabar($request)
    {
        $data = array_merge($request, [
            'status' => self::STATUS_ENABLED,
        ]);
        $result = self::create($data);
        if (!$result)
            return ['data' => false, 'message' => 'no exite registro'];
        return ['data' => $result, 'message' => 'Registro con exito!'];
    }

    public static function editar($request, $id, $with = [])
    {
        $result = self::with($with)->id($id)->activo()->first();
        if (!$result)
            return ['data' => false, 'message' => 'no exite registro'];
        return ['data' => $result, 'message' => 'Editado con exito!'];
    }
    public static function eliminar($request, $id)
    {
        $result = self::activo()
            ->where('id', $id)
            ->update([
                'status' => self::STATUS_DISABLED,
                'users_id' => $request->user()->id
            ]);
        if (!$result)
            return ['data' => false, 'message' => 'no exite registro'];
        return ['data' => true, 'message' => 'eliminado con exito!'];
    }


    public function scopeInactivo(Builder $query): void
    {
        $query->where('status', $this::STATUS_DISABLED);
    }

    public function scopeActivo(Builder $query): void
    {
        $query->where('status', $this::STATUS_ENABLED);
    }
    public function scopeId(Builder $query, string $id): void
    {
        $query->where('id', $id);
    }

    public function scopeOrden(Builder $query): void
    {
        $query->orderBy('id', 'desc');
    }
    public function scopeBuscar(Builder $query, $buscar, $columna): void
    {
        $array = $buscar['search'];
        if ($array) {
            foreach ($array as $search) {
                $searchTerm = trim($search['valor']);
                $searchTerm = strtoupper($searchTerm);
                $query->where(function ($query) use ($columna, $searchTerm) {
                    foreach ($columna as $value) {
                        if (is_numeric($value)) {
                            $query->orWhere($value, '=', $searchTerm);
                        } else {
                            $query->orWhere(DB::raw('UPPER(' . $value . ')'), 'like', '%' . $searchTerm . '%');
                        }
                    }
                });
            }
        }
    }
}
