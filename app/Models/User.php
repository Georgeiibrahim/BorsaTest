<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\EmailVerificationNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification());
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name','last_name','role', 'email', 'password', 'address', 'city', 'postal_code', 'first_phone_number', 'country', 'provider_id', 'email_verified_at', 'verification_code'
       ,'middle_name'
       ,'mother_first_name'
       ,'nationality'
       ,'id_passport_number'
       , 'birth_date',
       'age',
       'gender',
       'military_status',
       'religion',
       'martial_status',
       'number_of_dependencies',
       'type_of_residence',
       'number_of_apartment',
       'number_of_level',
       'number_of_building',
       'nearest_landmark',
       'first_phone_number',
       'second_phone_number',
       'acadmic_degree',
       'awarding_year',
       'faculty',
       'university',
       'job_type',
       'job_title',
       'emplyoment_year'];

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
    ];
}
