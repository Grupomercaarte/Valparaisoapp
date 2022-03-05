<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use App\Models\Client;
use App\Models\Product;
use App\Models\UserHasCashRegister;
use App\Models\UserHasCashRegisterHasCostPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-vender|crear-vender|editar-vender|borrar-vender',['only'=>['index']]);
        $this->middleware('permission:crear-vender',['only'=>['create','store']]);
        $this->middleware('permission:editar-vender',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-vender',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!empty($user->getRoleNames())) {
            $cajas = CashRegister::where('office_id','=',$user->office_id)->pluck('number','id');
        }
        else {
            $cajas = CashRegister::pluck('number','id');
        }

        $usercajas = UserHasCashRegister::where('user_id','=',$user->id)->where('status','=',true)->first();
        if (sizeof($usercajas) > 0) {
            return redirect()->route('vender.show',$usercajas->id);
        }
        else {
            return view('vender.index',compact('cajas','user'));
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usercajas = UserHasCashRegister::find($id);
        $carrito = UserHasCashRegisterHasCostPrice::where('user_cash','=',$usercajas->id)->get();
        if ($this->roln()) {
            $user = $this->getuser();
            $productos = Product::join('vendor_has_products','vendor_has_products.product_id','=','products.id')
            ->join('vendors','vendors.id','=','vendor_has_products.vendor_id')->select('products.*')->where('vendors.office_id','=',$user->office_id)->get();
            $clientes = Client::where('office_id','=',$user->office_id)->select(DB::raw("CONCAT(clients.name,' ',clients.last_name,' ',clients.second_last_name)As name"),'clients.id')->pluck('name','id');
        }
        else {
            $productos = Product::all();
            $clientes = Client::pluck('name','id');
        }

        return view('vender.vender',compact('usercajas','carrito','productos','user','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getuser()
    {
        $user = Auth::user();
        return $user;
    }

    public function roln()
    {
        $user = $this->getuser();
        if (!empty($user->getRoleNames())) {
            return true;
        }
        else {
            return false;
        }
    }
}
