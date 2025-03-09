<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API untuk mengelola pengguna"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Ambil daftar pengguna",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Daftar pengguna berhasil diambil",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index() {
        return response()->json(User::all(), 200);
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Tambah pengguna baru",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(response=201, description="Pengguna berhasil dibuat")
     * )
     */
    public function store(Request $request) {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     summary="Ambil data pengguna berdasarkan ID",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID pengguna",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detail pengguna",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(response=404, description="Pengguna tidak ditemukan")
     * )
     */
    public function show($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     summary="Perbarui data pengguna",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID pengguna",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(response=200, description="Pengguna berhasil diperbarui"),
     *     @OA\Response(response=404, description="Pengguna tidak ditemukan")
     * )
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Hapus pengguna",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID pengguna",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Pengguna berhasil dihapus"),
     *     @OA\Response(response=404, description="Pengguna tidak ditemukan")
     * )
     */
    public function destroy($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
