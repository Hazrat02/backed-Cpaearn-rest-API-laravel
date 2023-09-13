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
        $vip_id='4';
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
    public function ask_store(Request $request)
    {
       
        $request->validate([
            'ask' => 'required|string|max:255',
            'ans' => 'required|string|max:255',

            
           
        ]);
       
        if (auth()->user()->role === '0') {
           
        $ask = ask::create([
            'ask' => $request->ask,
            'ans' => $request->ans,
            
         
            
        ]);
        

        return response()->json([
            'status' => 'success',
            'ask'=>$ask,
            'message' => 'Ask created successfully',
           
        ]);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Sorry!You are not admin',
               
            ]);
        }
       
    }
    public function all_user()
    {
        $alluser=User::get();
        return response()->json([
            'alluser'=>$alluser,

        ]);
    }
    public function user_delete(Request $request)
    {
        $id=$request->id;
        $res = User::find($id)->delete();
     
        return response()->json([
            'message'=>'Delete done!',
          

        ]);
    }
    public function vip_delete(Request $request)
    {
        $id=$request->id;
        $res = vip::find($id)->delete();
     
        return response()->json([
            'message'=>'Vip delete done!',
          

        ]);
    }
    public function payment_delete(Request $request)
    {
        $id=$request->id;
        $res = payment::find($id)->delete();
     
        return response()->json([
            'message'=>'Payment method delete done!',
          

        ]);
    }
    public function ask_delete(Request $request)
    {
        $id=$request->id;
        $res = ask::find($id)->delete();
     
        return response()->json([
            'message'=>'Ask delete done!',
          

        ]);
    }
    public function work_delete(Request $request)
    {
        $id=$request->id;
        $res = work::find($id)->delete();
     
        return response()->json([
            'message'=>'Work delete done!',
          

        ]);
    }
    
    public function vip_edit(Request $request)
    {
        $id=$request->id;
        
        $vip = vip::find($id);
        // dd($user);
        $vip->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'task' => $request->task,
                'duration' => $request->duration,
               'icon'=>$request->icon,

            ]
        );
     
        return response()->json([
            'message'=>'Vip update done!',
            'vip'=>$vip

        ]);
    }
    public function work_edit(Request $request)
    {
        $id=$request->id;
        
        $work = work::find($id);
        // dd($user);
        $work->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'vip_id' => $vip_id,
                'icon' => $request->icon,
                'earn' => $request->earn,
             

            ]
        );
     
        return response()->json([
            'message'=>'Work update done!',
            'work'=>$work

        ]);
    }
    
    public function ask_edit(Request $request)
    {
        $id=$request->id;
        
        $ask = ask::find($id);
        // dd($user);
        $ask->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'vip_id' => $vip_id,
                'icon' => $request->icon,
                'earn' => $request->earn,
             

            ]
        );
     
        return response()->json([
            'message'=>'Ask update done!',
            'ask'=>$ask

        ]);
    }
    
    public function payment_edit(Request $request)
    {
        $id=$request->id;
        
        $payment = payment::find($id);
        // dd($user);
        $payment->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'vip_id' => $vip_id,
                'icon' => $request->icon,
                'earn' => $request->earn,
             

            ]
        );
     
        return response()->json([
            'message'=>'Payment update done!',
            'payment'=>$payment

        ]);
    }
    public function transaction_edit(Request $request)
    {
        $id=$request->id;
        
        $transaction = transaction::find($id);
        // dd($user);
        $transaction->update(
            [
                'status' =>'pending',
                'user_id' => auth()->user()->id,
                'method' => $request->method,
                'type' => $request->type,
    
                'network' => $request->network,
                'price' => $request->price,
                'trxid' => $request->trxid,
    
                'address' => $request->address,

            ]
        );
     
        return response()->json([
            'message'=>'Transaction update done!',
            'transaction'=>$transaction

        ]);
    }
    
    
}
