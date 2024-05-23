<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class PyramidBaseDTO
{
    /**
     * @OA\Property(
     *     default="",
     * )
     *
     * @var string
     */
    public string $name;
    /**
     * @OA\Property(
     *     default=0,
     * )
     *
     * @var int
     */
    public int $width;

    /**
     * @OA\Property(
     *     default=0,
     * )
     *
     * @var int
     */
    public int $height;



    /**
     * @OA\Property(
     *     default=0,
     * )
     *
     * @var int
     */
    public int $length;
}
