<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'credentials'=>auth()->user()->credential()->get()
        ];
        return view('vault.manage',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vault.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'website_name'=>'min:3',
            'website_url'=>'url:http,https',
            'username'=>'required',
            'password'=>'required'
        ]);

        $credential['user_id'] = auth()->user()->id;
        //dd($credential);
        Credential::create($credential);

        return redirect('/manage')->with('message','Credential Added Successfully !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function edit($credential)
    {
        $data = [
            'credential'=>Credential::find($credential)
        ];
        return view('vault.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$credential)
    {
        $request->validate([
            'website_name'=>'min:3',
            'website_url'=>'url:http,https',
            'username'=>'required',
            'password'=>'required'
        ]);

        $data = Credential::find($credential);

        $data->website_name = $request->input('website_name');
        $data->website_url = $request->input('website_url');
        $data->username = $request->input('username');
        $data->password = $request->input('password');

        $data->update();

        return redirect('/manage')->with('message','Credential Edited Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credential $credential)
    {
        $credential->delete();
        return redirect('/manage')->with('message','Credential Deleted Successfully');
    }
}
