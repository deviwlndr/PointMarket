<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Barangproject;
use Illuminate\Http\Request;

class ApiBarangProjectController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/barangproject",
     *     operationId="getAllBarangProjects",
     *     tags={"Barang Project"},
     *     summary="Get all Barang Projects",
     *     description="Retrieve a list of all Barang Projects",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function project()
    {
        $barangproject = Barangproject::all();
        return response()->json($barangproject, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/barangproject/{id}",
     *     operationId="showBarangProject",
     *     tags={"Barang Project"},
     *     summary="Show a Barang Project",
     *     description="Retrieve details of a specific Barang Project",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Barang Project",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="kode_barang", type="string", example="BRG001"),
     *             @OA\Property(property="nama_barang", type="string", example="Laptop"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Barang"),
     *             @OA\Property(property="harga_point", type="integer", example=1000)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Barang Project not found"
     *     )
     * )
     */
    public function show($id)
    {
        $barangProject = Barangproject::find($id);

        if (!$barangProject) {
            return response()->json(['message' => 'Barang Project not found'], 404);
        }

        return response()->json($barangProject, 200);
    }


    /**
     * @OA\Post(
     *     path="/barangproject",
     *     operationId="storeBarangProject",
     *     tags={"Barang Project"},
     *     summary="Store a new Barang Project",
     *     description="Store a new Barang Project to the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="kode_barang", type="string", example="BRG001"),
     *             @OA\Property(property="nama_barang", type="string", example="Laptop"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Barang"),
     *             @OA\Property(property="harga_point", type="integer", example=1000)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Barang Project created successfully"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'dosen' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga_point' => 'required|numeric|min:0',
        ]);

        $barangProject = Barangproject::create($request->all());
        return response()->json($barangProject, 201);
    }


    /**
     * @OA\Put(
     *     path="/barangproject/{id}",
     *     operationId="updateBarangProject",
     *     tags={"Barang Project"},
     *     summary="Update an existing Barang Project",
     *     description="Update the details of a Barang Project",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Barang Project",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="kode_barang", type="string", example="BRG002"),
     *             @OA\Property(property="nama_barang", type="string", example="Monitor"),
     *             @OA\Property(property="deskripsi", type="string", example="Deskripsi Barang Update"),
     *             @OA\Property(property="harga_point", type="integer", example=2000)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Barang Project updated successfully"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $barangProject = Barangproject::findOrFail($id);
        $barangProject->update($request->all());
        return response()->json($barangProject, 200);
    }

    /**
     * @OA\Delete(
     *     path="/barangproject/{id}",
     *     operationId="deleteBarangProject",
     *     tags={"Barang Project"},
     *     summary="Delete a Barang Project",
     *     description="Delete a Barang Project by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Barang Project",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Barang Project deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $barangProject = Barangproject::findOrFail($id);
        $barangProject->delete();
        return response()->json(null, 204);
    }


}
