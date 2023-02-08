<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\UserContract;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userContract;

    public function __construct(UserContract $userContract) 
    {
        $this->userContract = $userContract;
    }

    public function index()
    {
        // $this->userContract->index();
        return User::all();
    }

    public function edit($id) {
        // $this->userContract->edit($id);
        return User::find($id);

    }

    public function store (Request $request) {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $this->userContract->store($data);

        return response()->json([
            'status'    => 'sukses ditambah',
        ]);

    }

    public function update (Request $request, $id) {

        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $this->userContract->update($data, $id);

        // return redirect()->route('index')->with('message', 'Berhasil ubah data');
        return response()->json([
            'status'    => 'sukses diubah',
        ]);

    }

    public function destroy ($id) {
        $this->userContract->destroy($id);
        return response()->json([
            'status'    => 'sukses dihapus',
        ]);
    }

}
