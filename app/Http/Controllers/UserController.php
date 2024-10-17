<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('pages.management-access.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('pages.management-access.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'jabatan' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'roles' => 'required',
            // 'roles' => 'required|array',
        ],[
            'name.required' => 'Nama diperlukan.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Username diperlukan.',
            'email.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Username sudah terdaftar.',
            'password.required' => 'Password diperlukan.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 20 karakter.',
            'jabatan.required' => 'Jabatan diperlukan.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif.',
            'roles.required' => 'Role diperlukan.',
        ]);

        $newImage = '';

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $newImage = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_user', $newImage); // Menyimpan foto ke dalam folder storage/app/public/foto_user
        } else {
            $newImage = '';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'foto' => $newImage,

        ]);

        $user->syncRoles($request->roles);

        // if ($request->has('roles')) {
        //     $user->syncRoles($request->roles);
        // }

        return redirect()->route('users.index')->with('success','User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::pluck('name','name')->all();
        $user = User::find($id);
        $userRoles = $user->roles()->pluck('name')->all(); // Menggunakan 'roles()' untuk mendapatkan koleksi peran
        return view('pages.management-access.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'jabatan' => 'required|string|max:255',           
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'roles' => 'required',
            // 'roles' => 'required|array',
        ],[
            'name.required' => 'Nama diperlukan.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email diperlukan.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password diperlukan.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 20 karakter.',
            'jabatan.required' => 'Jabatan diperlukan.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif.',
            'roles.required' => 'Role diperlukan.',
        ]);

        $newImage = '';

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $newImage = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_user', $newImage); // Menyimpan foto ke dalam folder storage/app/public/foto_user
        
    
            // Hapus dokumen yang sudah ada sebelumnya jika ada
            if ($user->foto) {
                Storage::delete('foto_user/' . $user->foto);
            }
    
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'jabatan' => $request->jabatan,
                'foto' => $newImage,
            ];
    
            if (!empty($request->password)) {
                $data += [
                    'password' => Hash::make($request->password),
                ];
            }
        } else {

            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
    
            if (!empty($request->password)) {
                $data += [
                    'password' => Hash::make($request->password),
                ];
            }
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user  = User::find($id);
        
        if ($user->foto) {
           Storage::delete('foto_user/' . $user->foto);
       }

       $user ->delete();
       return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
