<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function execute(array $data, User $user)
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->document = $data['document'];
        $user->phone = $data['phone'];
        ;
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->save();
    }
}
