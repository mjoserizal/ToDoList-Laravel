<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Store a newly created user and their tasks in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'tasks' => 'required|array',
            'tasks.*.description' => 'required|string',
            'tasks.*.category_id' => 'required|integer|exists:categories,id',
        ]);

        // Cek apakah user dengan nama, username, dan email sudah ada
        $existingUser = User::where('name', $validated['name'])
            ->where('username', $validated['username'])
            ->where('email', $validated['email'])
            ->first();

        if ($existingUser) {
            return response()->json([
                'error' => 'User with the same name, username, and email already exists.'
            ], 409); // 409 Conflict
        }

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Buat pengguna baru tanpa password
            $user = User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                // Tidak memasukkan field password
            ]);

            // Tambahkan tugas untuk pengguna
            foreach ($validated['tasks'] as $taskData) {
                $user->tasks()->create($taskData);
            }

            // Commit transaksi jika semua berhasil
            DB::commit();

            return response()->json($user->load('tasks'), 201);
        } catch (\Exception $e) {
            // Rollback jika ada kesalahan
            DB::rollback();
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }
}
