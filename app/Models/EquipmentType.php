<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    protected $connection = 'mysql';
    protected $table = 'types';

    protected $fillable = ['name'];
    public $timestamps = false;

    use HasFactory;

    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
}
