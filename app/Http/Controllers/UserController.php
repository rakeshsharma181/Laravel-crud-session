<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function index(Request $req){
        $users = $req->session()->get('users');
        return view('list',['users'=>$users]);
    }
    public function create(){
        return view('form');
    }
    public function store(Request $req){
        $data = [];
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = $req->password;
        $data['mobile'] = $req->mobile;
        $data['role'] = $req->role;
        $data['date'] = $req->date;
        // Upload image here
        if ($req->image) {
            $ext = $req->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $req->image->move(public_path().'/uploads/users/',$newFileName); // This will save file in a folder
            $data['image'] = $newFileName;
        }
        if($req->session()->has('users')){
          $req->session()->push('users', $data);

        }
        else{
            $req->session()->put('users', []);
            $req->session()->push('users', $data);
        }
        return redirect()->route('user.list')->with('success','User created successfully.');   
    }
    public function edit($id){
        $user = session()->get('users')[$id];
        return view('edit',['users'=>$user,'id'=>$id]);
    }
    public function update(Request $req,$id){
        $data = session()->get('users')[$id];
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = $req->password;
        $data['mobile'] = $req->mobile;
        $data['role'] = $req->role;
        $data['date'] = $req->date;
        // Upload image here
        if ($req->image) {
            $oldImage =  $data['image'];
            $ext = $req->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $req->image->move(public_path().'/uploads/users/',$newFileName); // This will save file in a folder
            $data['image'] = $newFileName;
            File::delete(public_path().'/uploads/users/'.$oldImage);
        }
        $req->session()->put('users.'.$id, $data);
        return redirect()->route('user.list')->with('success','User updated successfully.'); 
    }
    public function delete($id){
        session()->forget('users.'.$id);
        return redirect()->route('user.list')->with('success','User deleted successfully.');
    }
    public function submit(){
        $data = session()->get('users');
        if($user = User::insert($data)){
            session()->forget('users');
            return redirect()->route('user.list')->with('success','Data Submitted  successfully.');
        }
        return back()->with('error_message','Unexpected error occurred while trying to process your request.'); 
    }
    public function dynamicColumn(){
        return view('dynamic');
    }
}

