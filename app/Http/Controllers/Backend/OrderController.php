<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\UserRequests;
use App\Models\UserPayment;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('order.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $users = UserRequests::orderBy('user_requests.id', 'desc')->paginate(10);
        return view('backend.pages.requests.index', ['users' => $users]);
    }

    public function view_files(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('order.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $files = FileUpload::where("user_uuid",$request->segment(3))->paginate(10);
        $user = UserRequests::where('user_uuid', $request->segment(3))->first();
        return view('backend.pages.requests.files', ['files' => $files, 'user' => $user]);
    }

    public function setAmount(Request $request){
        if (is_null($this->user) || !$this->user->can('order.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $request->validate([
            'amount' => 'required',
            'uuid' => 'required'
        ]);

        UserPayment::where("user_uuid",$request->input("uuid"))->update(["status" => "updated", "amount" => $request->input("amount")]);
        return response()->json(["message" => "Amount is updated"], 200);
    }
}