<?php

namespace App\Http\Controllers;
use Hash;
use Config;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $users = \App\User::all();
        return view('users',compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Config::get('app.locale');
        return view('add',compact('locale'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = new \App\User; // This is an Eloquent model
        $user->password = $request->password;
        $user->name = $request->name;
        $user->email = $request->email;
         $user->save();

return redirect()->route('users.index');
        //
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
public function edit($id){

$user = \App\User::findOrFail($id);

// dd($user->name);
return view('edit',compact('user'));
}
  public function update($id){
    //   dd(request()->all());
     

      if(empty(request()->password)){
        $user = \App\User::findOrFail($id);

        $user->name = request()->name;
        $user->email = request()->email;
      }else{
          
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = request()->pass;
      }
      $user->save();
   return   redirect()->route('users.index');
  }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);

        $user->delete();
        return  redirect()->route('users.index');

        //
    }
}
