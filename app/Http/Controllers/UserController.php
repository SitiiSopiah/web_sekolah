<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan semua user
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Menyimpan user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:Admin,Operator',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail user
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Form edit user
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Memperbarui user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')
                    ->ignore($user->id_user, 'id_user'),
            ],

            'password' => 'nullable|string|min:6|confirmed',

            'role' => 'required|in:Admin,Operator',
        ]);

        $user->username = $request->username;
        $user->role = $request->role;

        // Password hanya diubah kalau diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Menghapus user
     */
    public function destroy(User $user)
    {
        // Jangan sampai user yang sedang login menghapus dirinya sendiri
        if (auth()->id() == $user->id_user) {
            return redirect()
                ->route('users.index')
                ->with('error', 'User yang sedang login tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}