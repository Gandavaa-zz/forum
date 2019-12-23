@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
            {{ $profileUser->name }}  
            <small> {{ $profileUser->created_at->diffForHumans() }} </small>
        </h1>
        <hr>

        @foreach ($threads as $thread)
            <div class="box" style="margin-top:30px">
                <div class="level">
                    <div class="level-left">
                        <a href="#">{{ $thread->creator->name }} </a>  
                        &nbsp; posted: {{$thread->title}}
                    </div>
                    <div class="level-right">
                        <span>{{ $thread->created_at->diffForHumans() }} </span>
                    </div>

                </div>
                <div>

                    {{ $thread->body }}


                </div>

            </div>
            
        @endforeach

        {{ $threads->links() }}
        
    </div>
    </div>
  </section>


@endsection