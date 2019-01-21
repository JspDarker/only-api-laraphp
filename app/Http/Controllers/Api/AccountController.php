<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(AccountRequest $request)
    {
        //return new AccountsResource(['status'=> 200, 'd' => $request->post()]);
        $account = $request->isMethod('put')
            ? Account::findOrFail($request->account_id)
            : new Account;

        // need validate requests
        $validated = $request->validated();
        return new AccountsResource(['msg' => $validated]);
        $account->lastName = $request->input('lastName');
        $account->firstName = $request->input('firstName');
        $account->email = $request->input('email');
        $account->phone = $request->input('phone');
        $account->age = $request->input('age');
        $account->address = $request->input('address');
        $account->lastLogin = time();
        $account->password = Hash::make($request->input('password'));



//        try {
//            if ($account->save()) {
//                return new AccountsResource($account);
//            }
//        } catch (\Exception $exception) {
//            return new AccountsResource(['error_msg' => $exception->getMessage()]);
//        }

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
