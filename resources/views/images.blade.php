@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Image Manipulation</h1>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <h3>Manipulation using Code</h3>
                <p>
                    This image has been manipulated using code. Refer <code>routes/web.php</code> for the code.
                </p>
                <img src="{{ url("/imageResize") }}" alt="Resized Image">
                <hr>
               <p> The Original image can be accessed by using "original" template in: <code>/imgcache/<b>original</b>/charminar.jpg</code></p>
                <p>
                    The image can be dowloaded using "download" in the url:  <code>/imgcache/<b>download</b>/charminar.jpg</code><br>
                    <a href="/imgcache/download/charminar.jpg" class="btn btn-large btn-info">Download</a>
                </p>
            </div>
            <div class="col-lg-6">
                <h3>Manipulation by URL</h3>
                <p>The following images manipulations are done directly via url (and are cached)</p>
                <p>
                    <code>/imgcache/<b>small</b>/charminar.jpg</code><br>
                    <img src="{{ url("/imgcache/small/charminar.jpg") }}" alt="Resized Image">
                </p>
                <p>
                    <code>/imgcache/<b>medium</b>/charminar.jpg</code><br>
                    <img src="{{ url("/imgcache/medium/charminar.jpg") }}" alt="Resized Image">
                </p>
                <p>
                    <code>/imgcache/<b>large</b>/charminar.jpg</code><br>
                    <img src="{{ url("/imgcache/large/charminar.jpg") }}" alt="Resized Image">
                </p>
                <p>
                    With custom filter "disabled" <code>/imgcache/<b>disabled</b>/charminar.jpg</code><br>
                    <img src="{{ url("/imgcache/disabled/charminar.jpg") }}" alt="Resized Image">
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            The Original image can be accessed by using "original" template in: <code>/imgcache/<b>original</b>/charminar.jpg</code>
            <img src="{{ url("/imgcache/original/charminar.jpg") }}" class="img-responsive" alt="Resized Image">
        </div>

    </div>
@endsection