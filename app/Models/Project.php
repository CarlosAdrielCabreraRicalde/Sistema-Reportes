<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;
    public static $rules = [
        'name' => 'required',
        // 'description' => '',
        'start' => 'date'
    ];

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el proyecto.',
        'start.date' => 'La fecha no tiene un formato adecuado.'
    ];

    protected $fillable = [
        'name', 'description', 'start'
    ];

    // relationships
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Models\Level');
    }

    // accessors
    public function getFirstLevelIdAttribute()
    {
        return $this->levels->first()->id;
    }
}
