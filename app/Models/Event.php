<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Event extends Model
{
    protected $connection = 'mysql';
    protected $table = 'events';

    protected $fillable = [
        'userID',
        'startDate',
        'endDate',
        'price',
        'paidPrice',
        'description',
        'hourCount',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function equipment(){
        return $this->belongsToMany(Equipment::class);
    }

    use HasFactory;
}
