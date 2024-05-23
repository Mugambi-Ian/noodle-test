<?php


namespace App\Http\Repositories;

use App\DTOs\PyramidBaseDTO;
use App\DTOs\PyramidCreateDTO;
use App\DTOs\PyramidEditDTO;
use App\DTOs\PyramidSearchParamsDTO;
use App\Models\Pyramid;
use App\Models\PyramidModel;
use Exception;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

interface PyramidRepositoryInterface
{

    public  static function delete(int $id);
    public  static function findById(int $id);

    public  static function create(PyramidCreateDTO $dto);
    public  static function update(int $id, PyramidEditDTO $dto);
    public  static function findBySearchParams(PyramidSearchParamsDTO $id);
}
