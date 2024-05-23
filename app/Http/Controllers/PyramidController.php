<?php

namespace App\Http\Controllers;

use App\DTOs\PyramidCreateDTO;
use App\DTOs\PyramidEditDTO;
use App\DTOs\PyramidSearchParamsDTO;
use App\Helpers\ApiResponse;
use App\Http\Repositories\PyramidRepository;
use Illuminate\Http\Request;


class PyramidController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"pyramid-controller"},
     *     path="/v1/pyramid/{pyramidID}",
     *     @OA\Parameter(
     *         name="pyramidID",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(response="200", description="Get Pyramid By Id")
     * )
     */
    public function getById(Request $request, int $pyramidID)
    {
        return ApiResponse::success(PyramidRepository::findById($pyramidID));
    }


    /**
     * @OA\Get(
     *     path="/v1/pyramid",
     *     tags={"pyramid-controller"},
     *     @OA\Parameter(
     *         in="query",
     *         name="page",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="pageSize",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="keyword",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *    @OA\Parameter(
     *         in="query",
     *         name="widthMin",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="widthMax",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="heightMin",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="heightMax",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(response="200", description="Get Pyramids By SearchParams")
     * )
     */
    public function getBySearchParams(Request $request)
    {
        $params = new PyramidSearchParamsDTO($request);
        return ApiResponse::success(PyramidRepository::findBySearchParams($params));
    }


    /**
     * @OA\Post(
     *     path="/v1/pyramid",
     *     tags={"pyramid-controller"},
     *     @OA\Response(
     *         response=200,
     *         description="Created a new pyramid record",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PyramidCreateDTO")
     *     )
     * )
     */
    public function post(Request $request)
    {
        $form = new PyramidCreateDTO($request);
        return ApiResponse::success(PyramidRepository::create($form));
    }


    /**
     * @OA\Put(
     *     path="/v1/pyramid/{pyramidID}",
     *     tags={"pyramid-controller"},
     *     @OA\Parameter(
     *         name="pyramidID",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Created a new pyramid record",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PyramidEditDTO")
     *     )
     * )
     */
    public function put(Request $request, int $id)
    {

        $form = new PyramidEditDTO($request);
        return ApiResponse::success(PyramidRepository::update($id, $form));
    }


    /**
     * @OA\Delete(
     *     tags={"pyramid-controller"},
     *     @OA\Parameter(
     *         name="pyramidID",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             minimum=1
     *         )
     *     ),
     *     path="/v1/pyramid/{pyramidID}",
     *     @OA\Response(response="200", description="Disable/Delete a Pyramid By ID")
     * )
     */
    public function delete(int $id)
    {

        return ApiResponse::success(PyramidRepository::delete($id));
    }
}
