<?php

namespace App\Http\Controllers\Api;

use App\Account;
//use App\Http\Requests\AccountRequest; // only for web views
use App\Http\Resources\AccountsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $account = $request->isMethod('put')
            ? Account::findOrFail($request->account_id)
            : new Account;

        // call validate request
        $errorsAccount = $this->_accountValidate($request);
        if ($errorsAccount) {
            return new AccountsResource(['errors' => $errorsAccount]);
        }

        // create new or update
        $account->lastName = $request->input('lastName');
        $account->firstName = $request->input('firstName');
        $account->email = $request->input('email');
        $account->phone = $request->input('phone');
        $account->age = $request->input('age');
        $account->address = $request->input('address');
        $account->lastLogin = time();
        $account->password = Hash::make($request->input('password'));

        try {
            if ($account->save()) {
                return new AccountsResource($account);
            }
        } catch (\Exception $exception) {
            return new AccountsResource(['error_msg' => $exception->getMessage()]);
        }

    }

    private function _accountValidate($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:accounts|max:100',
            'firstName' => 'required',
            'lastName' => 'required',
        ],[
            'email.unique' => 'A email unique',
            'email.required' => 'A email xx',
            'firstName.required'  => 'A firstName is required',
        ]);
        if ($validator->fails()) {
            return $validator->errors();

        }
        return true;
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
