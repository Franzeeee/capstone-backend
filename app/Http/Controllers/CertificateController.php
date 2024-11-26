<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function issueCertificate(Request $request)
    {
        $request->validate([
            'issue_date' => 'required|date',
            'issued_to' => 'required|string',
            'teacher_name' => 'required|string',
            'class_name' => 'required|string',
            'class_id' => 'required|exists:course_classes,id',
        ]);

        $certificate = Certificate::create($request->all());

        return response()->json($certificate, 201);
    }

    public function checkStatus($class_id)
    {
        $certificate = Certificate::where('class_id', $class_id)->first();

        if (!$certificate) {
            return response()->json(['status' => false], 200);
        }

        return response()->json(['status' => true, 'data' => $certificate], 200);
    }
}
