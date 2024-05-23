<?php

namespace App\DTOs;

use Illuminate\Http\Request;


/**
 * @OA\Schema(
 *     title="PyramidCreateDTO",
 * )
 */
class PyramidCreateDTO extends PyramidBaseDTO
{


    public function __construct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'width' => 'required|numeric|gt:0',
            'length' => 'required|numeric|gt:0',
            'height' => 'required|numeric|gt:0',
        ]);
        $this->name =  $validated['name'];
        $this->width =  $validated['width'];
        $this->height =  $validated['height'];
        $this->length =  $validated['length'];
    }
}
