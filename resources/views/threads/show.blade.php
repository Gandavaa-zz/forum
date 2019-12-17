@extends('layouts.app')
@section('content')
    
<section class="hero is-fullheight">
      <div class="container">
          <div class="columns">                
              <div class="column is-offset-2 is-8">
                    <div class="box" style="margin-top:30px">
                        <h2 class="title is-5">
                            <a href="#">{{ $thread->creator->name }}</a> нийтлэв:
                              {{ $thread->title }} </h2>    
                        <hr>
                        <div class="thread-body ">
                            <article>
                                {{ $thread->body }}
                            </article>    
                        </div>
                    </div>                
                </div>
          </div>   
          
          <div class="columns">                
            <div class="column is-offset-2 is-8">
                @foreach ($thread->replies as $reply)
                    
                    <div class="box">
                        <a href="">{{$reply->owner->name}} </a> хэлжээ {{ $reply->created_at->diffForHumans() }} ...
                        <hr>
                        {{ $reply->body }}                        
                    </div>                    
                @endforeach
              </div>
        </div>   
      </div>
  </section>
  
  @endsection