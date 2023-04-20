<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Http\JsonResponse;

class pdfService extends Controller
{
	// Handle pdf file upload
  	public function fileUploadPost(Request $request): JsonResponse{
        $file = $request->file('file');

        if (is_null($file)) {
            return response()->json(['status' => 'fail', 'message' => 'File field is required.']);
        }
    
        if (!is_array($file) && $file->extension() != 'pdf') {
            return response()->json(['status' => 'fail', 'message' => 'File is not PDF.'], 422);
        }
    
        if (!$this->searchFor('Proposal-Success')) {
            return response()->json(['status' => 'fail', 'message' => 'Keyword not found in PDF.'], 422);
        }
    
        if (is_array($file)) {
            $file = $file[0];
        }

        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        $fileModel = File::firstOrNew(['name' => $fileName, 'size' => $fileSize]);
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->save();
        return response()->json(['status' => 'success','message' => 'File has been uploaded.', 'file' => $fileModel]);
    }

    public function searchFor(string $keyword): bool {
        //pending
        if($keyword == 'Proposal-Success') {
            return true;
        }else {
            return false;
        }
    }
}