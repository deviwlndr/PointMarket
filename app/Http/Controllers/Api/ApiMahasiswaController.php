<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


  /**
     * @OA\Schema(
     *     schema="Mahasiswa",
     *     type="object",
     *     title="Mahasiswa",
     *     description="Mahasiswa model",
     *     required={"npm", "nama_mahasiswa", "jumlah_point"},
     *     @OA\Property(property="id", type="integer", format="int64", example=1),
     *     @OA\Property(property="npm", type="string", example="714220054"),
     *     @OA\Property(property="nama_mahasiswa", type="string", example="Devi Wulandari"),
     *     @OA\Property(property="jumlah_point", type="integer", example=820),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-13T12:34:56Z"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-13T12:34:56Z")
     * )
     */


class ApiMahasiswaController extends Controller
{
  


/**
 * @OA\Get(
 *      path="/api/mahasiswa",
 *      operationId="getAllMahasiswa",
 *      tags={"Mahasiswa"},
 *      summary="Get list of mahasiswa",
 *      description="Returns list of mahasiswa",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Mahasiswa"))
 *      )
 * )
 */

    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json($mahasiswa, 200);
    }


    /**
     * @OA\Get(
     *      path="/api/mahasiswa/{id}",
     *      operationId="getMahasiswaById",
     *      tags={"Mahasiswa"},
     *      summary="Get mahasiswa information",
     *      description="Returns mahasiswa data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Mahasiswa ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *      ),
     *      @OA\Response(response=404, description="Mahasiswa not found")
     * )
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        return response()->json($mahasiswa, 200);
    }

    /**
     * @OA\Post(
     *      path="/api/mahasiswa",
     *      operationId="storeMahasiswa",
     *      tags={"Mahasiswa"},
     *      summary="Store new mahasiswa",
     *      description="Returns mahasiswa data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created successfully",
     *          @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *      ),
     *      @OA\Response(response=400, description="Bad Request")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'jumlah_point' => 'required|integer|min:0',
        ]);
        
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    /**
     * @OA\Put(
     *      path="/api/mahasiswa/{id}",
     *      operationId="updateMahasiswa",
     *      tags={"Mahasiswa"},
     *      summary="Update existing mahasiswa",
     *      description="Returns updated mahasiswa data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Mahasiswa ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Updated successfully",
     *          @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *      ),
     *      @OA\Response(response=404, description="Mahasiswa not found")
     * )
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->update($request->all());
        return response()->json($mahasiswa, 200);
    }

    /**
     * @OA\Delete(
     *      path="/api/mahasiswa/{id}",
     *      operationId="deleteMahasiswa",
     *      tags={"Mahasiswa"},
     *      summary="Delete existing mahasiswa",
     *      description="Deletes a mahasiswa",
     *      @OA\Parameter(
     *          name="id",
     *          description="Mahasiswa ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Deleted successfully"
     *      ),
     *      @OA\Response(response=404, description="Mahasiswa not found")
     * )
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->delete();
        return response()->json(null, 204);
    }
}