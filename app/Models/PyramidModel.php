<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PyramidModel extends Model
{
    use HasFactory;

    protected $table = "pyramids";
    protected $appends = array('area');
    protected $fillable = array('name', 'width', 'length', 'height');

    public function getAreaAttribute()
    {
        $width = $this->attributes['width'];
        $length = $this->attributes['length'];
        $height = $this->attributes['height'];

        // Calculate the area of the base
        $baseArea = $length * $width;

        // Calculate the slant heights
        $slantHeight1 = sqrt(pow($height, 2) + pow($length / 2, 2));
        $slantHeight2 = sqrt(pow($height, 2) + pow($width / 2, 2));

        // Calculate the areas of the triangular sides
        $triangleArea1 = ($length * $slantHeight2) / 2;
        $triangleArea2 = ($width * $slantHeight1) / 2;

        // Since there are two pairs of identical triangles, multiply by 2
        $totalTriangleArea = 2 * ($triangleArea1 + $triangleArea2);

        // Calculate the total surface area
       return $baseArea + $totalTriangleArea;

    }
}
