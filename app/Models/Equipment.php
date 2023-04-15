<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $connection = 'mysql';
    protected $table = 'equipments';

    protected $fillable = [
        'type',
        'name',
        'price',
        'quantity',
        'imagePath',
        'imagePath2',
        'videoPath',
        'description',
        'info1',
        'info2',
        'info3',
        'info4',
        'info5',
        'feature1',
        'feature2',
        'feature3',

    ];

    public $timestamps = false;
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }

    public function authorize(): bool
    {
        return true;
    }

    protected $attributes = [
        'imagePath' => null,
        'imagePath2' => null,
        'videoPath' => null,
    ];

}
