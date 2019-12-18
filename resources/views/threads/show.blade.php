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
                    @include('threads.reply')                     
                @endforeach
              </div>
        </div> 
        
        @if(auth()->check())
        <div class="columns">                
            <div class="column is-offset-2 is-8">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                     @csrf 
                    <div class="field">
                        <div class="control">
                            <h2 class="title is-6">Коммент:</h2>
                        </div>
                    </div>
                    <div class="field">                  
                        <div class="control">
                          <textarea name="body" class="textarea is-primary" placeholder="Хэлэх үгээ бичнэ үү?"></textarea>
                        </div>
                        
                    </div>                
                    <div class="field">
                        <button type="submit" class="button is-primary">Нийтлэх</button>
                    </div>
                </form>
              </div>
        </div>
        @else
            <p class="has-text-centered">Та <a href="{{ route('login') }}">нэвтэрч</a> дараа энэхүү ярилцлагад оролцох боломжтой.</p>
        @endif

      </div>
  </section>
  
  @endsection