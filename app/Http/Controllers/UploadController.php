<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Product;
use App\ProductsPhoto;
use App\Upload;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('upload_form');
    }

    public function uploadSubmit(UploadRequest $request)
    {

        $product = Product::create($request->all());
        foreach ($request->photos as $photo) {
            //Get File Name
            list($fName, $fPathName) = Upload::storeFile($photo);

            ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $fName
            ]);
        }

        flash()->success('Files Uploaded Succesfull!');

        return view('upload_form');
    }

    /**
     * @param $photo
     * @return mixed
     */

}
