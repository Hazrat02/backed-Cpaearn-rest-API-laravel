<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\payment;
use App\Models\transaction;
use App\Models\ask;
use App\Models\vip;
use App\Models\work;
use PhpParser\Node\Stmt\Return_;

class workController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','ask','work']]);
    }
    public function work(Request $request)
    {
        // $user=User::where('id',auth()->user()->id)->get()->first();
       $work = work::get();
    // $data = [
    //     'name' => 'Read News',
    //     'vip_id' => [
    //         ['id' => 1],
    //         ['id' => 2],
    //         ['id' => 3],
    //     ],
    //     'dicribtion' => 'You need connect vpn us/uk server without your account will ban',
    //     'earn' => 0.04,
    //     'icon' => 'bi-newspaper',
    //     'component' => 'news',
    // ];

  


    // $work=work::create($data);
    

       
        return response()->json([
            
            'work' => $work,
            
        ]);

    }

    
 
}
