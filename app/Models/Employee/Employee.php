<?php

namespace App\Models\Employee;
use App\Notifications\Employee\EmployeeResetPassword;
use App\Notifications\Employee\EmployeeVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Employee extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password','phone','status','username','telephone','status','picture',
        'age','is_married','gender','birthday','is_citizen','number_id','id_expiration_date','join_date','nationality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $changes = [

    ];
    protected $appends = [
        'full_name' => 'text',
    ];
    public function getTextAttribute(){
        return $this->attributes['full_name'];
    }
    public function rule(){
        return  $this->belongsToMany('App\Models\Employee\Rule','employee_rules','employee_id','rule_id');
    }
    public function location(){
        return  $this->belongsTo('App\Models\Project\Location','location_id','id');
    }
    public function documents(){
        return  $this->belongsToMany('App\Models\Employee\Document','employee_documents','employee_id','document_id');
    }
    public function salary(){
        return  $this->hasOne('App\Models\Employee\Salary','employee_id','id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmployeeVerifyEmail);
    }
}
