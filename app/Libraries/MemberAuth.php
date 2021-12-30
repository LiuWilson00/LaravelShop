<?php

namespace App\Libraries;

use App\Models\Member;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Hash;

class MemberAuth
{

    private static $member = null;

    public static function member()
    {
        if (empty(self::$member) && session()->exists('memberId')) {
            self::$member = Member::find(session('memberId'));
        }

        return self::$member;
    }

    public static function isLiggedIn()
    {
        return !empty(self::member());
    }

    public static function login($email, $password)
    {
        $_member =  Member::where([
            'email' => $email
        ])->first();

        if (
            !empty($_member)
            && Hash::check($password, $_member->password)
        ) {

            self::$member = $_member;
            session(['memberId' => $_member->id]);
            if (Hash::needsRehash($_member->password)) {
                self::$member->password = Hash::make($password);
                self::$member->save();
            }

            return $_member;
        } else {
            return null;
        }
    }

    public static function signUp($email, $password, $confirm_password)
    {

        if ($password === $confirm_password) {
            try {
                Member::create([
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
            } catch (QueryExecuted $e) {

                return 'Email or password invalid.';
            }
            return null;
        }

        return 'Password and password confirmation are not compared.';
    }

    public static function logout()
    {
        session()->forget('memberId');
        self::$member = null;
    }
}
