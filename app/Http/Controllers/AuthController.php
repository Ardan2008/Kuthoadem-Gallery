<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * GET api/auth
     * Menampilkan semua data user.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * POST api/login
     * Fungsi khusus untuk Verifikasi Login dari Frontend.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Auth::attempt ini yang WAJIB ada agar session tercipta
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return response()->json(['status' => 'success', 'message' => 'Login Successful'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'Username or Password is incorrect'], 401);
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
        ]);

        try {
            $user = Auth::user();

            // Cek apakah user benar-benar terautentikasi
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Please login again.'
                ], 401);
            }

            // Update password menggunakan instance user yang sedang login
            User::where('id', $user->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There is an error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * POST api/auth
     * Fungsi untuk Registrasi / Menambah User Baru ke Database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'User registered successfully!', 'user' => $user], 201);
    }

    /**
     * PUT api/auth/{id}
     * Update data user.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user->username = $request->username;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * DELETE api/auth/{id}
     * Menghapus user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}