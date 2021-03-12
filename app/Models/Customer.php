<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = "customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'street',
        'city',
        'state',
        'zip_code',
        'created_at',
        'updated_at'
    ];

    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

}
