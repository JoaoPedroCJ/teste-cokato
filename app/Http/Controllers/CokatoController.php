<?php

namespace App\Http\Controllers;

use App\Cokato;
use Illuminate\Http\Request;

class CokatoController extends Controller
{
    public function index(){
        
        return Cokato::all();

    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|max:255',
            'phone'=>'required|max:11',
            'active'=>'required'
        ]);

        $cokato = Cokato::create([
            'name'=>$request->input('name'),
            'role'=>$request->input('role'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'active'=>$request->input('active')
        ]);

        return $request;
    }

    public function show(Cokato $cokato){
        return $cokato;
    }

    public function update(Request $request, Cokato $cokato){
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|max:255',
            'phone'=>'required|max:11',
            'active'=>'required'
        ]);
        $cokato->name = $request->input('name');
        $cokato->role = $request->input('role');
        $cokato->email = $request->input('email');
        $cokato->phone = $request->input('phone');
        $cokato->active = $request->input('active');
        $cokato->save();
        return $cokato;
    }

    public function destroy(Cokato $cokato){
        $cokato->delete();

        return response()->json(['Success'=>true]);
    }
}
