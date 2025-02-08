<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JenisTransaksi;
use Illuminate\Http\Request;

class ApiJenisTransaksiController extends Controller
{
   /**
     * @OA\Get(
     *     path="/api/jenistransaksi",
     *     operationId="getAllJenisTransaksi",
     *     tags={"Jenis Transaksi"},
     *     summary="Get all Jenis Transaksi",
     *     description="Retrieve a list of all Jenis Transaksi",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="nama_transaksi", type="string", example="Pembayaran"),
     *                 @OA\Property(property="deskripsi", type="string", example="Transaksi pembayaran barang")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $jenistransaksis = JenisTransaksi::all();
        return response()->json($jenistransaksis, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/jenistransaksi",
     *     operationId="storeJenisTransaksi",
     *     tags={"Jenis Transaksi"},
     *     summary="Store a new Jenis Transaksi",
     *     description="Store a new Jenis Transaksi to the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="kode_transaksi", type="string", example="TRX001"),
     *             @OA\Property(property="nama_transaksi", type="string", example="Pembayaran"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Transaksi"),
     *             @OA\Property(property="point", type="integer", example=100)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Jenis Transaksi created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="kode_transaksi", type="string", example="TRX001"),
     *             @OA\Property(property="nama_transaksi", type="string", example="Pembayaran"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Transaksi"),
     *             @OA\Property(property="point", type="integer", example=100)
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_transaksi' => 'required|string',
            'nama_transaksi' => 'required|string',
            'deskripsi' => 'required|string',
            'point' => 'required|integer|min:0',
        ]);

        $jenisTransaksi = JenisTransaksi::create($validatedData);

        return response()->json($jenisTransaksi, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/jenistransaksi/{id}",
     *     operationId="updateJenisTransaksi",
     *     tags={"Jenis Transaksi"},
     *     summary="Update an existing Jenis Transaksi",
     *     description="Update the details of a Jenis Transaksi",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Jenis Transaksi",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nama_transaksi", type="string", example="Pembayaran"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Transaksi Diperbarui"),
     *             @OA\Property(property="point", type="integer", example=150)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Jenis Transaksi updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="nama_transaksi", type="string", example="Pembayaran"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Transaksi Diperbarui"),
     *             @OA\Property(property="point", type="integer", example=150)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Jenis Transaksi not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $jenistransaksi = JenisTransaksi::where('id_jenis_transaksi', $id)->firstOrFail();

        $jenistransaksi->update([
            'nama_transaksi' => $request->nama_transaksi,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
        ]);

        return response()->json($jenistransaksi, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/jenistransaksi/{id}",
     *     operationId="deleteJenisTransaksi",
     *     tags={"Jenis Transaksi"},
     *     summary="Delete a Jenis Transaksi",
     *     description="Delete a specific Jenis Transaksi by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Jenis Transaksi",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Jenis Transaksi deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Data Jenis Transaksi Berhasil Dihapus.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Jenis Transaksi not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Jenis Transaksi not found.")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $jenistransaksi = JenisTransaksi::find($id);

        if (!$jenistransaksi) {
            return response()->json(['message' => 'Jenis Transaksi not found.'], 404);
        }
        $jenistransaksi->delete();

        return response()->json(['message' => 'Data Jenis Transaksi Berhasil Dihapus.'], 200);
    }

 
}
