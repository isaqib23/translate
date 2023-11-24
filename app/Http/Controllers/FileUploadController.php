<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\UserPayment;
use App\Models\UserRequests;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $userRequest = new UserRequests;
        $userRequest->user_uuid = (string) Str::uuid();
        $userRequest->from = ($request->input('category_type') == 1) ? $request->input('from') : null;
        $userRequest->to = ($request->input('category_type') == 1) ? $request->input('to') : null;
        $userRequest->category_type = $request->input('category_type');
        $userRequest->category = ($request->input('category_type') == 2) ? json_encode($request->input('draft')) : json_encode($request->input('notary'));
        $userRequest->email = $request->input('email');
        $userRequest->mobile = $request->input('mobile');
        $userRequest->save();


        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $userFile = new FileUpload;
                $userFile->user_uuid = $userRequest->user_uuid;
                $userFile->file_name = $fileName;
                $userFile->file_path = $filePath;
                $userFile->file_type = $file->getClientMimeType();
                $userFile->save();
            }

            $userPayment = new UserPayment;
            $userPayment->user_uuid = $userRequest->user_uuid;
            $userPayment->status = "pending";
            $userPayment->save();
        }
        return redirect('/success/'.$userRequest->user_uuid);
    }
}
