<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Xử lý đăng ký
    public function register(Request $request)
    {
        try {
            // Xác thực yêu cầu
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Tạo người dùng mới
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'user' => $user
            ], 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        try {
            // Xác thực yêu cầu
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return response()->json(['message' => 'Đăng nhập thành công', 'user' => $request->user()]);
            }

            return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Lỗi khi đăng nhập: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();

            return response()->json(['message' => 'Đăng xuất thành công.']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

    public function profile(Request $request)
    {
        try {
            // Kiểm tra xem người dùng có đang đăng nhập không
            if (!Auth::check()) {
                return response()->json(['message' => 'Bạn cần phải đăng nhập để xem thông tin.'], 401);
            }

            // Trả về thông tin người dùng nếu đã đăng nhập
            return response()->json(['message' => 'Lấy thông tin thành công.', 'user' => $request->user()]);

        } catch (\Exception $e) {
            // Xử lý lỗi khác
            \Log::error('Lỗi khi lấy thông tin người dùng: ' . $e->getMessage());
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }

}
