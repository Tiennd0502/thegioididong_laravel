<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    private $pathViewController = 'backend.';
    private $current_page = 'dashboard';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        // if(isset($_SESSION['admin'])){
        //     return redirect()->route('page.index');
        // }else{
        //     return view('backend.login');
        // }
        return view($this->pathViewController.'login');
    }

    public function postLogin(Request $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $remember = false;
        if($request->remember == 'on'){
            $remember = true;
        }
        if(Auth::attempt($data, $remember)){
            return redirect()->route('page.index');
        }else{
            return back()->withInput()->with('message', __('Tài khoản hoặc mật khẩu chưa đúng. Xin thử lại!'));
        }
    }
    public function logout(){
        Auth::logout();
        return view($this->pathViewController.'logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view($this->pathViewController.'dashboards.index',[
            'current_page'=> $this->current_page,
        ]);
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
        //
    }
}
