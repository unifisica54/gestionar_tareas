<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
class Estado extends BaseModel
{
    use HasFactory;
    protected $table = 'estados';

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
        'id',
        'descripcion',
        'users_id',
        'status',
    ];
    protected $hidden = ['created_at','updated_at','users_id','status'];
}
