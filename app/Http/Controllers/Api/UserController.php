<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\UpdateUserRequest;

class UserController extends Controller
{
    public function get_profile($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            return $this->successData(new UserResource($user), 200);
        } else {
            return $this->unauthenticatedReturn();
        }
    }

    public function update_Profile(UpdateUserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {

            $data = $request->except('image');
            // if ($request->file('image')) {
            //     $filename = $this->uploadImg($request->file('image'), 'upload/users_images');
            //     if($old_img !=  User::$DEFAULT_IMG)
            //     @unlink(public_path($old_img));
            // } else {
            //     $filename = $old_img;
            // }
            $user->update($data);
            $token = $user->createToken('tokens')->plainTextToken;
            $data = [
                'user' => new UserResource($user),
                'token' => $token
            ];

            return $this->successData($data, 200);
        }
    }

    public function delete_profile($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->delete();
            return $this->deletedata();
        } else {
            return $this->unauthenticatedReturn();
        }

    }
}
