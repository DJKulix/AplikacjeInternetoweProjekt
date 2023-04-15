<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsEquipment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'eventequipment';

    protected $fillable = [
        'eventID',
        'equipmentID',
        'quantity',

    ];

    public function equpiment(){
        return $this->hasMany(Equipment::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }
    public $timestamps = true;
    use HasFactory;
}
