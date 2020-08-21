<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class pdfService extends Controller
{
	// Handle pdf file upload
  	public function fileUploadPost(Request $request){

        if($request->file()) {

	        if($request->file->extension() != 'pdf') {
	            return response("File is not PDF.", 422);
	        }

	        if(!$this->searchFor('Proposal-Success')) {
	            return response("Keyword not found in PDF.", 422);
	        }

            $fileName = $request->file->getClientOriginalName();
			$fileSize = $request->file->getSize();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        	$fileModel = File::firstOrNew(array('name' => $fileName, 'size' => $fileSize));
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return response()->json(['status' => 'success','message' => 'File has been uploaded.', 'file' => $fileModel]);
        }else{
        	return response()->json(['status' => 'fail','message' => 'File field is required.']);
        }
    }

    public function searchFor($keyword) {
        //pending

        if($keyword == 'Proposal-Success') {
            return true;
        }
        else {
            return false;
        }
    }
}