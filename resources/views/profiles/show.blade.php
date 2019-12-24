@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
          <div class="column is-offset-2 is-8">
                <h1 class="title">
                    {{ $profileUser->name }}  
                    <small> {{ $profileUser->created_at->diffForHumans() }} </small>
                </h1>
                <hr>
                <div class="box" style="margin-top:30px">
                    @foreach ($threads as $thread)
                        
                            <div class="level">
                                <div class="level-left">
                                    <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }} </a> &nbsp; posted: 
                                    <a href="{{ $thread->path() }}">{{$thread->title}}</a>
                                </div>
                                <div class="level-right">
                                    <span>{{ $thread->created_at->diffForHumans() }} </span>
                                </div>

                            </div>
                            <div>
                                {{ $thread->body }}
                            </div>
                        
                    
                    @endforeach
                </div>

                {{ $threads->links() }}
            </div>
            
        </div>
    </div>
    </div>
  </section>


@endsection