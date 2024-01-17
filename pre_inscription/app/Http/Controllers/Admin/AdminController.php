<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();

        return view('admin.forms.addUser',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->image = "NoImage.jpg";
        $user->type = $request->input('type');
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->password = Hash::make("passer@123");

        $user->save();
        return to_route('admin.liste')->with('success','Personnel ajouter avec succées');

    }

    public function liste(){
        $users = User::where('type', '1')->orWhere('type', '2')->get();
        //dd($users);
        return view('admin.pages.personnels',['users' => $users]);
    }



}
