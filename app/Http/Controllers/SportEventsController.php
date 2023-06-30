<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class SportEventsController extends Controller
{
    //
    public function index()
    {

        $members = Members::latest()->filter(request(['search']))->paginate(4);
        
        return view('events.index', ['members' => $members]);
    }
}
