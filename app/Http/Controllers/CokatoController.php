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

        $fileName = 'default.jpg';
        $isValid = 0;
        if($request->has('active')){
            $isValid = 1;
        }
        $phone = str_pad(preg_replace('/[^0-9]/', '', $request->input('phone')),10,"0",STR_PAD_LEFT);

        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $fileName=time().$file->getClientOriginalName();
            $file->move(public_path().'/dist/img/users/', $fileName);
        }

        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|max:255',
            'phone'=>'required'
        ]);

        $cokato = Cokato::create([
            'name'=>$request->input('name'),
            'role'=>$request->input('role'),
            'email'=>$request->input('email'),
            'phone'=>$phone,
            'photo'=>$fileName,
            'active'=>$isValid
        ]);

        return redirect('/')->with('success','Information has been added');
    }

    public function show(Cokato $cokato){
        return redirect()->route('edit', ['id' => $cokato]);
    }

    public function update(Request $request, Cokato $cokato){
        $isValid = 0;
        if($request->has('active')){
            $isValid = 1;
        }

        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|max:255',
            'phone'=>'required|max:11'
        ]);
        $cokato->name = $request->input('name');
        $cokato->role = $request->input('role');
        $cokato->email = $request->input('email');
        $cokato->phone = $request->input('phone');
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $fileName=time().$file->getClientOriginalName();
            $file->move(public_path().'/dist/img/users/', $fileName);
            $cokato->photo = $fileName;
        }
        $cokato->active = $isValid;
        $cokato->save();
        return redirect('/')->with('success','Information has been updated');
    }

    public function destroy(Cokato $cokato){
        $cokato->delete();

        return redirect('/')->with('success','Information has been deleted');
    }
}
