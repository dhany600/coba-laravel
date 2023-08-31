<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                // function($row), $row adalah alias dari $data
                ->addColumn('action', function($row) {
                    return view('dashboard.users.action', ['data'=> $row])->render();
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'new user has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('dashboard.users.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        // Fetch the user by ID and pass it to the view
        $user = User::where('username', $username)->firstOrFail();
        return view('dashboard.users.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $rules = [
            'name' => 'required|max:255',
        ];

        if($request->username != $user->username){
            $rules['username'] = ['required', 'min:3', 'max:255', 'unique:users'];
        };

        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        };

        $validatedData = $request->validate($rules);
        
        User::where('username', $username)
        ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'new post has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     $user = User::where('id',$request->id)->delete();
    //     return Response()->json($user);
    // }

    public function destroy(Request $request, User $user)
    {
        if (request()->ajax()) {
            $company = User::where('username',$request->username)->delete();
            return Response()->json($company);
        }
        else{
            User::destroy($user->id);
            return redirect('/dashboard/users')->with('success', 'post has been deleted');
        }
    }
}
