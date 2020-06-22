<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gigs extends Model
{
    protected $fillable = [
        'role',
        'company',
        'location',
        'country',
        'state',
        'address',
        'tags',
        'min_salary',
        'max_salary'

    ];

    protected $table = 'gigs';
    protected $dates = [];
    public static $rules = [];
}