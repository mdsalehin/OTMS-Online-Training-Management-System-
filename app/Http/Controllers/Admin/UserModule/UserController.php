<?php
namespace App\Http\Controllers\Admin\UserModule;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user, $users = [];
    public function index()
    {
        $this->users = User::latest()->get();
        return view('admin.user-management.user.index',[
            'users' => $this->users
        ]);
    }

    public function create()
    {
        return view('admin.user-management.user.form');
    }

    public function store(Request $request)
    {

        User::createOrUpdateUser($request);
        return back()->with('success','User Created Successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.user-management.user.form', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        User::createOrUpdateUser($request, $id);
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
    }

    public function destroy(string $id)
    {
        User::deleteUser($id);
        return back()->with('success', 'User Deleted Successfully');
    }
}
