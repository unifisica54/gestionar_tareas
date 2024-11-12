<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Estado;
class Tarea extends BaseModel
{
    
    use HasFactory;
    protected $table = 'tarea';

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
        'id',
        'dni',
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'estado_id',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
