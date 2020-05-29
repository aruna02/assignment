<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\User\Http\Requests\LoginFormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Modules\User\Entities\User;

use App\Modules\User\Repositories\UserInterface;


class LoginController extends Controller
{
    protected $user;
    
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }
    
    public function login(){
         if (Auth::check()) {
            return redirect()->intended(route('dashboard'));
         } else {
            return view('user::login.login');
        }
    }
    
    public function authenticate(Request $request){
       
        $data = $request->all('username','password');
      
        if (auth()->attempt(['username' => $data['username'], 'password' => $data['password'], 'active' => 1])) {

            return redirect()->intended(route('dashboard'));

        } 

        else if(empty($data['username']) || empty($data['password']) ) {
              Flash('Username or Password Empty')->warning();

            return redirect(route('login'));
        } 
        else {
            Flash('Invalid Access')->warning();

            return redirect(route('login'));
        }
        
    }
    
    public function changePassword(){
        return view('user::login.change-password');
    }

    public function updatePassword(Request $request){

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');


        $id = Auth::user()->id;
        $users = Auth::user()->find($id);

        if (!(Hash::check($oldPassword, $users->password))) {
            Flash("Old Password Do Not Match !")->error();
            return redirect(route('change-password'));
        } else {
            $data['password'] = Hash::make($newPassword);

            $this->user->update($id, $data);

            Flash("Password Successfully Updated. Please Login Again!")->success();

        }

        Auth::logout();
        return redirect(route('login'));
    }
    
     public function permissionDenied()
        {
            return view('user::authPermission.permission-denied');
        }
    
    
    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
