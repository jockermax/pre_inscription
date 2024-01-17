<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('admin.forms.addUser',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,$id)
    {

        $user = User::findOrFail($id);
        //dd($request);
        if ($user->image != 'NoImage.jpg' && $request->image != '') {
            Storage::delete('public/users_image/' . $user->image);
        }

        if ($request->image) {
            $user->image = $this->image($request);
        }
        //dd($user);
        $request->merge(['user' => $user]);
        $user->update($request->validated());
        return redirect()->back()->with('info', 'Information modifiée avec succès');
    }

    private function image($image)
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Contracts\View\View
         */

        if ($image->hasFile('image')) {
            $fileNamaExt = $image->file('image')->getClientOriginalName();
            $fileNAme = pathinfo($fileNamaExt, PATHINFO_FILENAME);
            $extension = $image->file('image')->getClientOriginalExtension();
            $fileNameStore = $fileNAme . '_' . time() . '.' . $extension;
            $path = $image->file('image')->storeAs('public/users_image', $fileNameStore);
        } else {
            $fileNameStore = 'NoImage.jpg';
        }
        return $fileNameStore;
    }
    public function activer($id){
        $user = user::findOrFail($id);
        $user->status = 1;
        $user->update();
        $users = User::get();
        return redirect()->back()->with('success', $user->nom . ' activer avec success', ['users' => $users]);
    }

    public function desactiver($id){
        $user = user::findOrFail($id);
        $user->status = 0;
        $user->update();
        $users =  User::get();
        return redirect()->back()->with('success',$user->nom . ' desactiver avec success', ['users' => $users]);
    }


    public function updatePass(Request $request, $id)
    {
        // Validation des données de la requête
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        // Récupération de l'utilisateur par son ID
        $user = User::findOrFail($id);
        //dd($user);

        // Vérification de l'ancien mot de passe
        if (Hash::check($request->input('old_password'), $user->password)) {
            // Mise à jour du mot de passe
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Redirection avec un message de succès
            return redirect()->back()->with('success', 'Mot de passe modifié avec succès.');
        } else {
            // Redirection avec un message d'erreur si l'ancien mot de passe ne correspond pas
            return redirect()->back()->with('error', 'L\'ancien mot de passe saisi est incorrect.');
        }
    }
}
