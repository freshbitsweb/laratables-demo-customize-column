<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Indicates if the model should be timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
    ];

    /**
     * Display currency symbol with format in salary column value.
     *
     * @param \Illuminate\Support\Collection
     * @return \Illuminate\Support\Collection
     */
    public static function laratablesModifyCollection($users)
    {
        return $users->map(function ($user) {
            $user->salary = "$". number_format($user->salary); // $ for currency
            return $user;
        });
    }

    /**
     * Adds the condition for searching the salary if custom/modify for display.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string search term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesSearchSalary($query, $searchValue)
    {
        if ($searchSalary = filter_var($searchValue, FILTER_SANITIZE_NUMBER_INT)) {
            return $query->orWhere('salary', 'like', '%'. $searchSalary. '%');
        }
    }

    /**
     * Returns the name column value for datatables.
     *
     * @param \App\User
     * @return string
     */
    public static function laratablesCustomName($user)
    {
        return $user->first_name . ' ' . $user->last_name;
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['first_name', 'last_name'];
    }

    /**
     * first_name column should be used for sorting when name column is selected in Datatables.
     *
     * @return string
     */
    public static function laratablesOrderName()
    {
        return 'first_name';
    }

     /**
     * Additional searchable columns(data merge) to be used for datatables .
     *
     * @return array
     */
    public static function laratablesSearchableColumns()
    {
        return ['first_name', 'last_name'];
    }
}
