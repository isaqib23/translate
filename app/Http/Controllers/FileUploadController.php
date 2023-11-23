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
        $request->validate([
            'files.*' => 'required|file',
            'fromLanguage' => 'required',
            'toLanguage' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        $userRequest = new UserRequests;
        $userRequest->user_uuid = (string) Str::uuid();
        $userRequest->from = $request->input('fromLanguage');
        $userRequest->to = $request->input('toLanguage');
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

            return response()->json([
                'success' => true,
                'data' => $userRequest->user_uuid,
                'message' => 'Files have been uploaded. An agent should contact you shortly!'
            ]);
        } else {
            return response()->json(['error' => 'No files uploaded'], 400);
        }
    }
}
