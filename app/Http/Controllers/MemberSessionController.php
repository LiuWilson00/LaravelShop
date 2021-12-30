<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Libraries\MemberAuth;


class MemberSessionController extends Controller
{
    //
    public function create()
    {


        return view('members.login');
    }

    public function store(Request $request)
    {

        $member = MemberAuth::login(
            $request->email,
            $request->password
        );
        if (empty($member)) {
            return redirect()->route('members.session.create');
        } else {
            return redirect('/');
        }
    }

    public function delete(Request $request)
    {
        MemberAuth::logout();
        return redirect('/');
    }
}
