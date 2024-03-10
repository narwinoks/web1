<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Responses\ServerResponse;
use App\Traits\Valet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Valet;
    public function account(Request $request)
    {
        return view('features.public.user.account');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $data = $request->only('name', 'email', 'password', 'phone');
        $data['password'] = Hash::make($request->password);
        DB::beginTransaction();
        try {
            $user = User::updateOrCreate(['email' => $request->email], $data);
            $user['redirect'] = route('account.index');
            $result = [
                'message' => 'Welcome' . '   ' . $user->name,
                'data' => $user,
                'code' => 200,
                'errors' => []
            ];
            $attempt = [
                'email' => $request->email,
                'password' => $request->password
            ];
            Auth::attempt($attempt);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $result = [
                'message' => $e->getMessage(),
                'data' => [],
                'code' => $e->getCode() ?? 500,
                'errors' => [
                    'line' => $e->getLine(),
                    'message' => $e->getMessage()
                ]
            ];
        }

        return $this->respond($result, $result['code']);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $user['redirect'] = route('account.index');
            $data = [
                'rc' => 200,
                'data' => $user,
                'message' => 'Welcome' . ' ' . Auth::user()->name
            ];
        } else {
            $data = [
                'rc' => 404,
                'message' => 'Data Tidak Ditemukan !',
                'data' => []
            ];
        }
        return $this->respond($data, $data['rc']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function data(Request $request)
    {
        if ($request->key == "loadPassword") {
            return view('features.public.user.password');
        } else if ($request->key == "loadProfile") {
            $user = Auth::user();
            return view('features.public.user.profile', compact('user'));
        }
    }
    public function update(Request $request)
    {
        if ($request->key == "password") {
            $validation = [
                'password' => 'required',
                'confirmationPassword' => 'required'
            ];
            $request->merge(['password' => Hash::make($request->password)]);
        } else if ($request->key == "profile") {
            $validation = [
                'name' => 'required',
                'profile' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480'
            ];
        }
        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            $error = [
                'errors' => $validator->errors()
            ];
            return $this->error(ServerResponse::BAD_REQUEST, 400, $error);
        }
        if ($request->file('image')) {
            $file      = 'image' . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img'), $file);
            $request->merge(['profile' => $file]);
        }
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $result = $user->update($request->all());
            $result = [
                'message' => 'Profile Berhasil Diubah' . '   ' . $user->name,
                'data' => $user,
                'code' => 200,
                'errors' => []
            ];
        } catch (Exception $e) {
            $result = [
                'message' => $e->getMessage(),
                'data' => [],
                'code' => 500,
                'errors' => [
                    'line' => $e->getLine(),
                    'message' => $e->getMessage()
                ]
            ];
        }
        return $this->respond($result, $result['code']);
    }
}
