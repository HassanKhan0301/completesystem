<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function image()
    {
        return $this->hasOne(UserImage::class,'user_id','id');
    }

    public function images()
    {
        return $this->hasMany(UserImage::class,'user_id','id')
        ->where('project_id',NULL)->select('user_id','image');
    }

  //  public function role()
    //{
      //  return $this->belongsTo(Role::class,'role_id','id');
    //}

    public function roleName()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'user_id','id');
    }

    public function startup()
    {
        return $this->hasOne(Startup::class,'user_id','id');
    }

    public function university()
    {
        return $this->hasOne(University::class,'user_id','id');
    }

    public function industry()
    {
        return $this->hasOne(Industry::class,'user_id','id');
    }

    public function investor()
    {
        return $this->hasOne(Investor::class,'user_id','id');
    }

    public function getName()
    {
        return $this->name ? $this->name : NULL;
    }
}
