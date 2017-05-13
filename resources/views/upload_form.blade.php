@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Upload some Images for a New Product</h1>

        <hr>
        <div class="col-lg-6">
            <p>You can upload multiple files and store them across various file storage systems, including the local machine.</p>
        <p>Refer code as in the following files:
            <ul>
                <li><code>App\Http\Controllers\UploadControlller.php</code></li>
                <li><code>App\Http\Requests\UploadRequest.php</code></li>
                <li><code>App\Upload.php</code></li>
                <li><code>Config\filesystems.php</code></li>
                <li><code>resources\views\upload_form.blade.php</code></li>
            </ul>
        </p>
            <p>The Code renames the file, and stores it in storage/uploads. 'uploads' table keeps track of the real names.<br>
                With Intervention image package, you can refer images in <code>"storage/uploads"</code> from <i> /imgcache/{template}/{imageFileName} </i> easily, as configured in <code>config/imagecache.php</code>.</p>

        </div>

        <div class="col-lg-6">
        {{Form::open(['url'=>'/upload','files'=>true])}}

        <!-- name Input field -->
            <div class="form-group form-group-default required">
                {!! Form::label('name','Product name') !!}
                {!! Form::text('name',null,['class'=>'form-control','required'=>'required']) !!}
            </div>

            <!-- photos Input field -->
            <div class="form-group form-group-default required">
                {!! Form::label('photos','Product Photos') !!}
                <span class="help">(You can upload more than one):</span>
                {!! Form::file('photos[]',['required'=>'required','multiple']) !!}
            </div>

            {{Form::submit('Submit >',['class'=>'btn btn-success'])}}
            {{Form::close()}}
        </div>


    </div>
@endsection