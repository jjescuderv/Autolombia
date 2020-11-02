<?php
//Jhonatan Acevedo Castrillón
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function order() 
    {
        return $this->hasMany(Order::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}
