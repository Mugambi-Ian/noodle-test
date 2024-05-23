<?php


namespace App\Http\Repositories;

use App\Helpers\ApiResponse;
use App\DTOs\PyramidCreateDTO;
use App\DTOs\PyramidEditDTO;
use App\DTOs\PyramidSearchParamsDTO;
use App\Models\PyramidModel;
use Exception;
use Illuminate\Support\Facades\Log;


class PyramidRepository implements PyramidRepositoryInterface
{
    /**
     *
     * @param int $id
     */
    public  static function delete(int $id)
    {
        try {
            PyramidModel::where("id", $id)->deleteOrFail();
            return ["success"=>true];
        } catch (\Throwable $th) {
            Log::error($th);
            throw new Exception("Failed to Delete",500);
        }
    }



    /**
     *
     * @param int $id
     */
    public  static function findById(int $id)
    {
        try {
           return PyramidModel::where("id", $id)->firstOrFail();
        } catch (\Throwable $th) {
            Log::error($th);
            throw new Exception("Failed to Locate",500);
        }
    }

    /**
     *
     * @param PyramidSearchParamsDTO $id
     */
    public  static function findBySearchParams(PyramidSearchParamsDTO $search)
    {

        try {
            $pyramids = PyramidModel::query();
            if ($search->heightMin != null) {
                $pyramids->where('height', ">=", $search->heightMin);
            }
            if ($search->heightMax != null) {
                $pyramids->where('height', "<=", $search->heightMax);
            }
            if ($search->widthMin != null) {
                $pyramids->where('width', "?>=", $search->widthMin);
            }
            if ($search->widthMax != null) {
                $pyramids->where('width', "<=", $search->widthMax);
            }
            if ($search->keyword != null) {
                $pyramids->where("name", "LIKE", "%" . $search->keyword . "%");
            }
          return  $pyramids->paginate($search->pageSize);
        } catch (\Throwable $th) {
            Log::error($th);
            throw new Exception("Failed to Search",500);
        }
    }


    /**
     *
     * @param PyramidCreateDTO $dto
     */
    public  static function create(PyramidCreateDTO $dto)
    {
        try {
            return PyramidModel::create((array)$dto);
        } catch (\Throwable $th) {
            Log::error($th);
            throw new Exception("Failed to Create",500);
        }
    }

    /**
     *
     * @param int $id
     * @param PyramidEditDTO $dto
     */
    public  static function update(int $id, PyramidEditDTO $dto)
    {
        try {
            PyramidModel::where("id", $id)->first()->updateOrFail((array)$dto);
            return PyramidRepository::findById($id);
        } catch (\Throwable $th) {
            Log::error($th);
            throw new Exception("Failed to update",500);
        }
    }
}
