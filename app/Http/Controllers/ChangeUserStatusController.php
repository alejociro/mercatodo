<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChangeUserStatusController extends Controller
{

    public function update($id)
    {
        $user = User::find($id);
        if($user->disabled_at == null){
            $user->disabled_at = Carbon::now();
        }else{
            $user->disabled_at = null;
        }

        $user->save();
        return redirect()->route('users.index');
    }
}
