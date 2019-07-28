<?php

namespace App\Models\Customer;
use App\Notifications\Customer\CustomerResetPassword;
use App\Notifications\Customer\CustomerVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    //
    protected $fillable = [
        'name','phone','email','gender','status','address','type'
    ];
    protected $appends = [
        'name' => 'text',
    ];
    public function getTextAttribute(){
        return $this->attributes['name'];
    }
    public function scopeFind_By($query, $search)
    {
        return $query
            ->where( 'name', 'like', "{$search}")
            ->orWhere('phone','=', "{$search}")
            ->orWhere('email','=', "{$search}");
    }

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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomerVerifyEmail);
    }
}
