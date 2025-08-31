<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{


     public function index()
    {
        $profile = Profile::included() 
        ->filter()
        ->getOrPaginate();;

        return response()->json([
            'status' => 'ok',
            'message' => 'Listado de productos',
            'data' => $profile,
        ]);
    }



    public function edit(Profile $profile)
{
    return view('profiles.edit', compact('profile'));
}

public function update(Request $request, Profile $profile)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'birthdate' => 'nullable|date',
        'other_info' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $profile->username = $request->username;
    $profile->birthdate = $request->birthdate;
    $profile->other_info = $request->other_info;

    if ($request->hasFile('image')) {
        // Borrar imagen anterior si existe
        if ($profile->image && Storage::exists('public/' . $profile->image)) {
            Storage::delete('public/' . $profile->image);
        }

        // Guardar nueva imagen
        $path = $request->file('image')->store('profiles', 'public');
        $profile->image = $path;
    }

    $profile->save();

    return redirect()->route('profiles.show', $profile->id)->with('success', 'Perfil actualizado correctamente.');
}

}


