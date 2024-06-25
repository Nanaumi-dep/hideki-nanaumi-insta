<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User; // This represents the users table

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * 
     */
    public function show($id){
        $user = $this->user->findOrFail($id);
        return view('users.profile.show')->with('user', $user);
    }

    public function edit(){
        $user = $this->user->findOrFail(Auth::user()->id);
        return view('users.profile.edit')->with('user', $user);
    }

    public function update(Request $request){
        $request->validate([
            'name'   => 'required|min:1|max:50',
            'email'  => 'required|email|max:50|unique:users,email,'. Auth::user()->id,
            'avatar' => 'mimes:jpg,jpeg,gif,png|max:1048',
            'introduction' => 'max:100'
        ]);

        $user = $this->user->findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        // Check if there is an avatar uploaded
        if($request->avatar){
            $user->avatar = 'data:image/'. $request->avatar->extension(). ';base64,'. base64_encode(file_get_contents($request->avatar));
        }

        # Save to database
        $user->save();

        # Redirect
        return redirect()->route('profile.show', Auth::user()->id);
    }

    /**
     * Method to display the lists of followers of the AUTH user
     */
    public function followers($id){
        $user = $this->user->findOrFail($id);
        //Same as: SELCT * FROM users WHERE id = $id;

        return view('users.profile.followers')->with('user', $user);

    }

    /**
     * Method to display the lists of users the AUTH user is following
     */
    public function following($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.following')->with('user', $user);
    }

}
