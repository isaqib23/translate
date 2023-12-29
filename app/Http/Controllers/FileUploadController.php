<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\UserPayment;
use App\Models\UserRequests;
use Illuminate\Support\Str;
use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Mail;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $validate = $this->validateData($request);
        if(!isset($validate["success"])){
            return response()->json($validate, 400);
        }

        $userRequest = new UserRequests;
        $userRequest->user_uuid = (string) Str::uuid();
        $userRequest->translate_type = ($request->input('category_type') == 1) ? $request->input('translate_type') : null;
        $userRequest->from = ($request->input('category_type') == 1) ? $request->input('from') : null;
        $userRequest->to = ($request->input('category_type') == 1) ? $request->input('to') : null;
        $userRequest->urgent = ($request->has('urgent')) ? $request->input('urgent') : 0;
        $userRequest->category_type = $request->input('category_type');
        $userRequest->category = ($request->input('category_type') == 2) ? json_encode($request->input('draft')) : json_encode($request->input('notary'));
        $userRequest->email = $request->input('email');
        $userRequest->mobile = $request->input('mobile');
        $userRequest->save();


        if ($request->has('files')) {
            foreach ($request->input('files') as $file) {
                $fileData = json_decode($file);

                $userFile = new FileUpload;
                $userFile->user_uuid = $userRequest->user_uuid;
                $userFile->file_name = $fileData->file_name;
                $userFile->file_path = $fileData->file_path;
                $userFile->file_type = $fileData->file_type;
                $userFile->save();
            }

            $userPayment = new UserPayment;
            $userPayment->user_uuid = $userRequest->user_uuid;
            $userPayment->status = "pending";
            $userPayment->save();
        }

        $checkInput = identifyAndFormat($request->input('mobile'));
        //if($checkInput["type"] == "email"){
            $subject = "New Order - ".$userRequest->user_uuid;
            $message = "New Order - ".$userRequest->user_uuid." is placed";
            //Mail::to("info@scrumsoftwares.com")->send(new SendEmailNotification($subject, $message, ucwords($request->input('email'))));
            Mail::to("gm@translingu.com")->send(new SendEmailNotification($subject, $message, ucwords($request->input('email'))));
        //}

        return response()->json([
            'success' => true,
            'data' => $userRequest->user_uuid,
            'message' => 'Files have been uploaded. An agent should contact you shortly!'
        ]);
    }

    public function upload_files(Request $request){
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        return response()->json([
            "file_name" => $fileName,
            "file_path" => $filePath,
            "file_type" => $file->getClientMimeType(),
        ], 200);
    }

    public function validateData(Request $request) {
        if (!$request->has('category_type') || $request->input('category_type') == "") {
            return ["message" => "Category Type is required"];
        } elseif ($request->input('category_type') == 1) {
            if (!$request->has('from') || $request->input('from') == "") {
                return ["message" => "From Country is required"];
            } elseif (!$request->has('to') || $request->input('to') == "") {
                return ["message" => "To Country is required"];
            } elseif (!$request->has('translate_type') || $request->input('translate_type') == "") {
                return ["message" => "Translation Type is required"];
            }
        } elseif ($request->input('category_type') == 2) {
            if (!$request->has('draft')) {
                return ["message" => "Drafting Options is required"];
            } elseif (!$request->has('id_check') || $request->input('id_check') == "") {
                return ["message" => "ID or Passport check is required"];
            }
        } elseif ($request->input('category_type') == 3) {
            if (!$request->has('notary')) {
                return ["message" => "Notary Options is required"];
            } elseif (!$request->has('id_check') || $request->input('id_check') == "") {
                return ["message" => "ID or Passport check is required"];
            }
        }

        if (!$request->has('email') || $request->input('email') == "") {
            return ["message" => "Name is required"];
        }
        if (!$request->has('mobile') || $request->input('mobile') == "") {
            return ["message" => "Mobile is required"];
        }
        if (!$request->has('files')) {
            return ["message" => "Upload files is required"];
        }

        return ["success" => true];
    }

    public function sendNotification(Request $request){
        $checkInput = identifyAndFormat($request->input('mobile'));
        //if($checkInput["type"] == "email"){
            $subject = ucwords($request->input('email'))." - ".$request->input('mobile');
            $message = "New order in preparation";
            //Mail::to("info@scrumsoftwares.com")->send(new SendEmailNotification($subject, $message, ucwords($request->input('email'))));
            Mail::to("gm@translingu.com")->send(new SendEmailNotification($subject, $message, ucwords($request->input('email'))));
        //}

        return $checkInput;
    }
}
