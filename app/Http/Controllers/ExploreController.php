<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class ExploreController extends Controller
{
    public function index()
    {	
    	$users = User::paginate(12);

    	return view('explore', compact('users'));
    }
}
