<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // relationships

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    public function canTake(Incident $incident)
    {
        return ProjectUser::where('user_id', $this->id)
                        ->where('level_id', $incident->level_id)
                        ->first();
    }

    // accessors

    





    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getListOfProjectsAttribute()
    {
        if ($this->role == 1)
            return $this->projects;

        return Project::all();
    }

    public function getIsAdminAttribute(){
        return $this->role==0;
    }

    public function getIsSupportAttribute(){
        return $this->role==1;
    }

    public function getIsClientAttribute(){
        return $this->role==2;
    }

}
