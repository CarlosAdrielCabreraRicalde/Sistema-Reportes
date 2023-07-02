<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use SoftDeletes;

    protected $fillable=['name','project_id'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');// Definir la relación de pertenencia a un proyecto
    }

}
