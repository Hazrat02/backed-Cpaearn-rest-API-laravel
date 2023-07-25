<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\payment;
use PhpParser\Node\Stmt\Return_;

class FrontendController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }
    public function payment_method()
    {
        $payment=payment::get()->all();
        // return response()->json(['user' => $user]);
        return response()->json([
            'status' => 'success',
            'payment' => $payment,

        ]);

}
    }

  
    

