<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\UserRequests;
use App\Models\UserPayment;

class UserRequestController extends Controller
{
    public function index()
    {
        $users = UserRequests::paginate(10);
        return view('requests.index', ['users' => $users]);
    }

    public function view_files(Request $request)
    {
        $files = FileUpload::where("user_uuid",$request->segment(2))->paginate(10);
        return view('requests.files', ['files' => $files]);
    }

    public function setAmount(Request $request){
        $request->validate([
            'amount' => 'required',
            'uuid' => 'required'
        ]);

        UserPayment::where("user_uuid",$request->input("uuid"))->update(["status" => "updated", "amount" => $request->input("amount")]);
        return response()->json(["message" => "Amount is updated"], 200);
    }
}
