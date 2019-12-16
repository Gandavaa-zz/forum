@extends('layouts.app')

@section('content')
    
<section class="hero is-fullheight">
      <div class="container">
           <div class="columns">                
              <div class="column is-offset-2 is-8">
                    <div class="box" style="margin-top:30px">
                        <h2 class="title is-3">
                        Form threads
                        </h2>    
                        <hr>
                        <div class="thread-body">
                            @foreach ($threads as $thread)
                            <article>
                                <h3 class="title is-4">
                                    <a href="/threads/{{$thread->id}}">{{ $thread->title}}</a>
                                </h4>
                                <div class="is-4">{{ $thread->body}}   </div>
                                
                            </article>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
           </div>
      </div>
  </section>

  @endsection