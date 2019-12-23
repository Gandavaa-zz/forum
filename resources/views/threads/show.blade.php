@extends('layouts.app')

@section('content')
    
<section class="hero is-fullheight">
      <div class="container">
          <div class="columns">                
                <div class="column is-8">
                    <div class="box" style="margin-top:30px">
                        <h2 class="title is-5">
                            <a href=" {{ route('profile', $thread->creator )  }}">{{ $thread->creator->name }}</a> нийтлэв:
                              {{ $thread->title }} </h2>    
                        <hr>
                        <div class="thread-body ">
                            <article>
                                {{ $thread->body }}
                            </article>    
                        </div>
                    </div>      
                    
                    @foreach ($thread->replies as $reply)
                        @include('threads.reply')                     
                    @endforeach

                    {{-- {{ $replies->links() }} --}}

                    @if(auth()->check())
        
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
                
                    @else
                        <p class="has-text-centered">Та <a href="{{ route('login') }}">нэвтэрч</a> дараа энэхүү ярилцлагад оролцох боломжтой.</p>
                    @endif
                
                </div>
                <div class="column is-4">
                    <div class="box" style="margin-top:30px">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a>, and currently
                            has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.

                        </p>                    
                    </div>

                </div>

          </div>   
          
      </div>

  </section>
  
  @endsection