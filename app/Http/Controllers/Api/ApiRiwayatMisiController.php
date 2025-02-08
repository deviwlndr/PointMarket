<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RiwayatMisi;
use Illuminate\Http\Request;

class ApiRiwayatMisiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/riwayat_misi",
     *     operationId="getAllRiwayatMisi",
     *     tags={"Riwayat Misi"},
     *     summary="Get all Riwayat Misi",
     *     description="Retrieve a list of all Riwayat Misi",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id_misi", type="integer", example=1),
     *                 @OA\Property(property="npm", type="string", example="12345678"),
     *                 @OA\Property(property="nama_misi", type="string", example="Seminar AI"),
     *                 @OA\Property(property="deskripsi", type="string", example="Mengikuti seminar tentang AI"),
     *                 @OA\Property(property="point", type="integer", example=100),
     *                 @OA\Property(property="tanggal_transaksi", type="string", format="date", example="2025-01-22"),
     *                 @OA\Property(property="file_bukti", type="string", example="bukti_seminar.pdf"),
     *                 @OA\Property(property="status", type="string", example="pending")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $riwayatTransaksi = RiwayatMisi::all();
        return response()->json($riwayatTransaksi, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/riwayat_misi",
     *     operationId="createRiwayatMisi",
     *     tags={"Riwayat Misi"},
     *     summary="Create a new Riwayat Misi",
     *     description="Store a new Riwayat Misi to the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="npm", type="string", example="12345678"),
     *             @OA\Property(property="nama_misi", type="string", example="Seminar AI"),
     *             @OA\Property(property="deskripsi", type="string", example="Mengikuti seminar tentang AI"),
     *             @OA\Property(property="point", type="integer", example=100),
     *             @OA\Property(property="file_bukti", type="string", format="binary", example="file.pdf")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Riwayat Misi created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Misi berhasil diajukan!"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id_misi", type="integer", example=1),
     *                 @OA\Property(property="npm", type="string", example="12345678"),
     *                 @OA\Property(property="nama_misi", type="string", example="Seminar AI"),
     *                 @OA\Property(property="deskripsi", type="string", example="Mengikuti seminar tentang AI"),
     *                 @OA\Property(property="point", type="integer", example=100),
     *                 @OA\Property(property="tanggal_transaksi", type="string", format="date", example="2025-01-22"),
     *                 @OA\Property(property="file_bukti", type="string", example="uploads/file.pdf"),
     *                 @OA\Property(property="status", type="string", example="pending")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Validation failed.")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_misi' => 'required|integer',
            'npm' => 'required|string',
            'nama_misi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'point' => 'required|integer',
            'file_bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
    
        // Simpan file bukti ke folder "uploads" di storage/public
        $filePath = $request->file('file_bukti')->store('uploads', 'public');
    
        // Simpan data ke database
        $riwayatMisi = RiwayatMisi::create([
            'id_misi' => $request->id_misi,
            'npm' => $request->npm,
            'nama_misi' => $request->nama_misi,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
            'tanggal_transaksi' => now(), // Gunakan now() untuk tanggal saat ini
            'file_bukti' => $filePath, // Simpan path file di database
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Misi berhasil diajukan!',
            'data' => $riwayatMisi
        ], 201);
    }
}
