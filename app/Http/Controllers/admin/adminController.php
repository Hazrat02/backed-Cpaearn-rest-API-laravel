<?php

namespace App\Http\Controllers\admin;

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


class adminController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','ask','vip']]);
    }
    public function payment_method_create(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'method' => 'required|string|max:255',
            'network' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            
           
        ]);
        // $file = $request->$file['image'];
        
        
        // $name =rand(0000000,999999) .$file->getClientOriginalName();
        // $file->move(public_path('payment'), $name);
       $name='sfsdfsfsdf';
    
        if (auth()->user()->role === '0') {
             
            $payment = payment::create([
                'name' => $request->name,
                'method' => $request->method,
                'network' => $request->network,
                'address' => $request->method,
                'image' => $name,
               
                
            ]);
            
    
            return response()->json([
                'status' => 'success',
                'message' => 'Method created successfully',
               
            ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'error' => 'Sorry!You are not admin',
                   
                ]);
            }
    }
    public function vip_store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'task' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            
           
        ]);
        if (auth()->user()->role === '0') {
           
        $payment = vip::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'task' => $request->task,
            'duration' => $request->duration,
           'icon'=>$request->icon,
            
        ]);
        

        return response()->json([
            'status' => 'success',
            'message' => 'Vip plan created successfully',
           
        ]);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Sorry!You are not admin',
               
            ]);
        }
       
    }
    public function work_store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'vip_id' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'earn' => 'required|string|max:255',
            
           
        ]);
        $vip_id='';
        if (auth()->user()->role === '0') {
           
        $payment = work::create([
            'name' => $request->name,
            'description' => $request->description,
            'vip_id' => $vip_id,
            'icon' => $request->icon,
            'earn' => $request->earn,
         
            
        ]);
        

        return response()->json([
            'status' => 'success',
            'message' => 'Work created successfully',
           
        ]);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Sorry!You are not admin',
               
            ]);
        }
       
    }
    public function deposit(Request $request)
    {
        $request->validate([
       
            'price' => 'required',
           
        ]);

        $method=payment::where('id',$request->method)->get()->first();
        $deposit = transaction::create([
            'status' =>'pending',
            'user_id' => auth()->user()->id,
            'method' => $request->method,
            'type' => $request->type,

            'network' => $request->network,
            'price' => $request->price,
            'trxid' => $request->trxid,

            'address' => $request->address,


        ]);
        return response()->json([
            'message'=>'Your deposit request done.Wait few moment adding balence',
            'status' => $request->status,
            'user_id' => auth()->user()->id,
            'method' => $method,
            'type' => $request->type,

            'network' => $request->network,
            'price' => $request->price,
            'trxid' => $request->trxid,

            'address' => $request->address,
            'created_at' => now(),

        ]);
    }
    public function transaction(Request $request)
    {
        $allTransaction=transaction::orderBy('id', 'desc')->get();
        $authTransaction = transaction::where('user_id',auth()->user()->id)->with('method')->orderBy('id', 'desc')->get();
        return response()->json([
            'allTransaction'=>$allTransaction,
            'authTransaction'=>$authTransaction

        ]);
    }
    
    public function vip(Request $request)
    {
        $vip=vip::with('vipunlock')->get();
       
        return response()->json([
            'vip'=>$vip,

        ]);
    }

    

    public function ask()
    {
        $ask=ask::orderBy('id', 'desc')->get();
       
        return response()->json([
            'ask'=>$ask,

        ]);
    }
}
