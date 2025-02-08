<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MisiTambahan;
use Illuminate\Http\Request;


    /**
 * @OA\Schema(
 *     schema="MisiTambahan",
 *     type="object",
 *     title="MisiTambahan",
 *     description="MisiTambahan model",
 *     required={"kode_misi", "nama_misi", "deskripsi", "harga_point"},
 *     @OA\Property(property="id_misi", type="integer", example=1),
 *     @OA\Property(property="kode_misi", type="string", example="MS001"),
 *     @OA\Property(property="nama_misi", type="string", example="Misi A"),
 *     @OA\Property(property="deskripsi", type="string", example="Deskripsi Misi A"),
 *     @OA\Property(property="harga_point", type="integer", example=100),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-13T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-13T12:34:56Z")
 * )
 */
class ApiMisiTambahanController extends Controller
{
 

 /**
 * @OA\Get(
 *      path="/api/misitambahan",
 *      operationId="getAllMisiTambahan",
 *      tags={"Misi Tambahan"},
 *      summary="Get list of misitambahan",
 *      description="Returns list of misitambahan",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/MisiTambahan"))
 *      )
 * )
 */
public function index()
{
    return response()->json(MisiTambahan::all(), 200);
}


    /**
     * @OA\Post(
     *     path="/api/misitambahan",
     *     summary="Create a new Misi Tambahan",
     *     tags={"Misi Tambahan"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="kode_misi", type="string", example="M001"),
     *             @OA\Property(property="nama_misi", type="string", example="Ikuti Workshop"),
     *             @OA\Property(property="deskripsi", type="string", example="Meningkatkan skill mahasiswa"),
     *             @OA\Property(property="harga_point", type="integer", example=50)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Misi created"),
     *     @OA\Response(response=400, description="Bad Request")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_misi' => 'required|string|max:10',
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga_point' => 'required|integer',
        ]);

        $misi = MisiTambahan::create($validated);

        return response()->json(['message' => 'Misi Tambahan created successfully', 'data' => $misi], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/misitambahan/{id}",
     *     summary="Get Misi Tambahan by ID",
     *     tags={"Misi Tambahan"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Misi Tambahan",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show($id)
    {
        $misi = MisiTambahan::find($id);

        if (!$misi) {
            return response()->json(['message' => 'Misi Tambahan not found'], 404);
        }

        return response()->json($misi, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/misitambahan/{id}",
     *     summary="Update Misi Tambahan",
     *     tags={"Misi Tambahan"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Misi Tambahan",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="kode_misi", type="string", example="M001"),
     *             @OA\Property(property="nama_misi", type="string", example="Ikuti Workshop"),
     *             @OA\Property(property="deskripsi", type="string", example="Meningkatkan skill mahasiswa"),
     *             @OA\Property(property="harga_point", type="integer", example=50)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Misi updated"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function update(Request $request, $id)
    {
        $misi = MisiTambahan::find($id);

        if (!$misi) {
            return response()->json(['message' => 'Misi Tambahan not found'], 404);
        }

        $validated = $request->validate([
            'kode_misi' => 'required|string|max:10',
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'harga_point' => 'required|integer',
        ]);

        $misi->update($validated);

        return response()->json(['message' => 'Misi Tambahan updated successfully', 'data' => $misi], 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/misitambahan/{id}",
     *     summary="Delete Misi Tambahan",
     *     tags={"Misi Tambahan"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Misi Tambahan",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Misi deleted"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function destroy($id)
    {
        $misi = MisiTambahan::find($id);

        if (!$misi) {
            return response()->json(['message' => 'Misi Tambahan not found'], 404);
        }

        $misi->delete();

        return response()->json(['message' => 'Misi Tambahan deleted successfully'], 200);
    }
}
