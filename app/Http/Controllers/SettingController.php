<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
    //
    public function getIndex()
    {
        return view('setting.index');
    }

    public function getProfile()
    {
        return 'Profile';
    }
}
