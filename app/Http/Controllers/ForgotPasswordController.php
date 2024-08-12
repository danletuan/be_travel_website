<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ForgotPassword;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForgotPasswordController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new BaseService(new ForgotPassword());
    }

    public function index()
    {
        try {
            $posts = $this->service->getAll();
            return response()->json($posts);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = $this->service->getById($id);
            return response()->json($post);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $post = $this->service->create($request->all());
            return response()->json($post, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = $this->service->update($request->all(), $id);
            return response()->json($post);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'Email không tồn tại trong hệ thống'], 404);
            }

            ForgotPassword::where('email', $request->email)->delete();

            $token = Str::random(64);
            ForgotPassword::create([
                'email' => $request->email,
                'token' => $token,
                'expired_at' => Carbon::now()->addMinutes(10)
            ]);

            $resetLink = url('/reset-password?token=' . $token);
            Mail::send('auth.passwordReset', ['resetLink' => $resetLink], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
            });

            return response()->json(['message' => 'Đã gửi đường link xác nhận tới email', 'token' => $token], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function checkToken(Request $request)
    {
        try {
            $request->validate(['token' => 'required']);
            $token = $request->token;

            $forgotPassword = ForgotPassword::where('token', $token)->where('expired_at', '>', now())->first();

            if (!$forgotPassword) {
                return response()->json(['message' => 'Token không hợp lệ hoặc đã hết hạn'], 404);
            }

            return response()->json(['message' => 'Đã xác thực token'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required',
                'password' => 'required|min:6|confirmed'
            ]);

            $passwordReset = ForgotPassword::where('token', $request->token)->first();
            if (!$passwordReset) {
                return response()->json(['message' => 'Token không hợp lệ hoặc đã hết hạn'], 404);
            }

            $user = User::where('email', $passwordReset->email)->first();
            if (!$user) {
                return response()->json(['message' => 'Người dùng không tồn tại'], 404);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            $passwordReset->delete();

            return response()->json(['message' => 'Mật khẩu đã được cập nhật thành công'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }
}
