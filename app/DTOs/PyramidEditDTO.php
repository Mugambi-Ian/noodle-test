<?php

namespace App\DTOs;

use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     title="PyramidEditDTO",
 * )
 */
class PyramidEditDTO extends PyramidBaseDTO
{

    public function __construct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'width' => 'sometimes|numeric|gt:0',
            'length' => 'sometimes|numeric|gt:0',
            'height' => 'sometimes|numeric|gt:0',
        ]);
        if (array_key_exists('name', $validated)) {
            $this->name =  $validated['name'];
        }
        if (array_key_exists('width', $validated)) {
            $this->width =  $validated['width'];
        }
        if (array_key_exists('height', $validated)) {
            $this->height =  $validated['height'];
        }
        if (array_key_exists('length', $validated)) {
            $this->length =  $validated['length'];
        }
    }
}
