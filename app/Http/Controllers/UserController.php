<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('isAdmin'); //if the authorized user is admin show users
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
       ]);

       return User::create([
           'name' => $request['name'],
           'email' => $request['email'],
           'type' => $request['type'] ?? 'user',
           'bio' => $request['bio'],
           'photo' => $request['photo'] ?? 'profile.png',
           'password' => Hash::make($request['password']),
       ]);
    }


    public function profile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();


        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id, // escape any email with same id,
            'password' => 'sometimes|required|min:6',
       ]);


        $currentPhoto = $user->photo;

        if($request->photo != $currentPhoto){ // if there is different image

            $extension = explode('/', mime_content_type($request->photo))[1];
            $name = time().rand().'.'.$extension;

            // image intervention package
            // instead of import Image we use \
            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/'.$currentPhoto); //Replace the old photo with the new
            if(file_exists($userPhoto)){
                @unlink($userPhoto); //unlink delete the photo
            }
        }

        if(!empty($request->password)){
            $pass = Hash::make($request['password']);
            $request->merge(['password' => $pass]);
        }

        $user->update($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id, // escape any email with same id,
            'password' => 'sometimes|min:6',
       ]);

       if(!empty($request->password)){
            $pass = Hash::make($request['password']);
            $request->merge(['password' => $pass]); // change the passwrod to hash before save request to database
        }
       $user->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user  = User::findOrFail($id);
        $user->delete();
    }
}
