<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Profile;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    protected $profile;
    protected $role;
    public function __construct(User $user,Profile $profile,Role $role)
    {
        $this->user=$user;
        $this->profile=$profile;
        $this->role=$role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $sidebar=[
            'parent'=>'user',
            'child'=>'index'
        ];
        $users=$this->user;
        $users=$users->orderBy('id','desc')->paginate(5);
        $data['sidebar']=$sidebar;
        $data['users']=$users;
        return view('backend.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $sidebar=[
            'parent'=>'user',
            'child'=>'add'
        ];
        $roles=$this->role->pluck('role_name','id')->toArray();
        $data['roles']=$roles;
        $data['sidebar']=$sidebar;
        return view('backend.users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $params=$request->all();
        $this->user->name=$params['name'];
        $checkEmail=User::where('email',$params['email'])->first();
        if(!empty($checkEmail)){
            return redirect()->back()->with('fail','Email is exists');
        }
        $this->user->email=$params['email'];
        $this->user->password=$params['password'];
        $checkUser=$this->user->save();
       //save for profile
        $this->profile->birthday=$params['birthday'];
        $this->profile->gender=$params['gender'];
        $this->profile->address=$params['address'];
        if($request->hasFile('avatar')){
            $ext=$request->file('avatar')->getClientOriginalExtension();
            $this->profile->avatar=$request->file('avatar')->storeAs('/public/user_images',time().'.'.$ext);
        }
        $checkProfile=$this->user->profile()->save($this->profile);
        $checkRoleUser=$this->user->role()->sync($params['role_id']);
        if($checkUser && $checkProfile && $checkRoleUser){
            return redirect()->route('admin-user-index')->with('success','Insert User Successfully');
        }
        return redirect()->route('admin-user-index')->with('fail','Insert User Fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //delete role_user,profile,user
        $user=$this->user::find($id);
        $user->role()->detach();
        $user->profile()->delete();
        $userDeletee=$user->delete();
        if($userDeletee){
            return redirect()->route('admin-user-index')->with('success','Delete User Successfully');
        }
        return redirect()->route('admin-user-index')->with('fail','Fail Delete User Successfully');
    }
}
