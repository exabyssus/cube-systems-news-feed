<?php

namespace App\Models;

use App\Components\Abstracts\User\AbstractBreakdown;
use App\Components\Classes\User\Breakdown;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // Leave name untouched
        'email',
        'password',
        'breakdown'
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
     * The attributes that should be modified to specific type or format.
     *
     * @var array
     */
    protected $casts = [
        'breakdown' => 'array'
    ];

    /** @var AbstractBreakdown|null $breakdownData */
    protected $breakdownData = null;

    public static function boot()
    {
        parent::boot();
        self::creating(function (User $user) {
            $user->name = $user->name ?? str_slug($user->breakdown['first_name']);
        });
    }

    /**
     * Get breakdown data
     *
     * Description: create breakdown for first name, last name, phone, address, country, city, state, zip etc.
     *
     * @return AbstractBreakdown
     */
    public function getBreakdownData(): AbstractBreakdown
    {
        if (is_null($this->breakdownData)) {
            $this->breakdownData = new Breakdown($this->breakdown ?? []);
        }

        return $this->breakdownData;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->getBreakdownData()
            ->getFullName();
    }

    /**
     * @return string
     */
    public function getFirstNameAttribute(): string
    {
        return $this->getBreakdownData()
            ->getFirstName();
    }

    /**
     * @return string
     */
    public function getLastNameAttribute(): string
    {
        return $this->getBreakdownData()
            ->getLastName();
    }
}
