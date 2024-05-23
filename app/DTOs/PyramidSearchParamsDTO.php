<?php

namespace App\DTOs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PyramidSearchParamsDTO
{

    public int $pageSize;
    public ?string $keyword;
    public ?int $widthMin;
    public ?int $heightMin;
    public ?int $widthMax;
    public ?int $heightMax;

    public function __construct(Request $request){
        $this->keyword = $request->query('keyword');
        $this->widthMin = $request->query('widthMin');
        $this->widthMax = $request->query('widthMax');
        $this->heightMin = $request->query('heightMin');
        $this->heightMax = $request->query('heightMax');
        $this->pageSize = (int) $request->query('pageSize');
    }

}
