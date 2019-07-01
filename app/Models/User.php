<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\{File, Role, Sale};
use App\Traits\Roles\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'subaccount_name', 'subaccount_code',
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

    public function saleValueThisMonth()
    {
        $now = Carbon::now();

        return $this->sales()->whereBetween('created_at', [
            $now->startOfMonth(),
            
            $now->copy()->endOfMonth(),

        ])->get()->sum('sale_price');

    }   

    public function saleValueOverLifeTime()
    {
        return $this->sales->sum('sale_price');
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isTheSameAs(User $user)
    {
        return $this->id === $user->id;
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
}
