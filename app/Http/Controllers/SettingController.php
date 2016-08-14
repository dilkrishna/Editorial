<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

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

    public function upload()
    {
        return 'upload';
    }
}
