@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Sample Posts that use slugs</h1>
        <hr>
        @if(Schema::hasTable('posts'))
            @forelse(\App\Post::all() as $post)
                <h3>{!! link_to('/'.$post->slug,$post->title) !!} by <span>{{ $post->user->name }}</span></h3>


            @empty
                <p>It seems you do not have any posts. Run the following command to add posts:
                <pre>php artisan db:seed</pre></p>
            @endforelse

        @else
            <p>It seems you have not run the following command yet!
            <pre>php artisan migrate --seed</pre></p>

        @endif

    </div>
@endsection