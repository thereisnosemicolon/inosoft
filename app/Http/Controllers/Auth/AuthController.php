<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'login']]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'messages' => $validator->errors()], 409);
        }

        if ($token = auth('api')->attempt($validator->validated())) {
            return $this->respondWithToken($token);
        } else {
            return response()->json(['success' => false ,'messages' => "Invalid Credentials"], 400);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register() {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false, 'messages' => $validator->errors()], 409);
        }

        $user = new User;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json(['success' => true, 'data' => $user], 201);
    }


    public function logout()
    {
        Auth::guard()->logout();

        return response()->json(['success' => true, 'messages' => 'Successfully logged out'], 200);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'messages' => "Success to generate your token",
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ], 201);
    }

}
?>
