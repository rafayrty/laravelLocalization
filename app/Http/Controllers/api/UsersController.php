<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Config;
class UsersController extends Controller
{
    public function index(){
        return \App\User::all();
    }
    //
}
