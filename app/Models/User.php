<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Select;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa'); //relacio  uno a uno

    }
    public function adminlte_image()
    {
        $empresa = Empresa::where('user_id', Auth()->user()->id)->get()[0]; //id de la empresa
        /* if ($empresa->image!=null)
        {

            return $empresa->image['url'];
        }
        else {

            return null;
        }   */
         return 'https://picsum.photos/300/300';
    }
    public function adminlte_desc()
    {
        return date('d-m-Y');
    }
}
