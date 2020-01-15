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
                                <div class="level">
                                    <h3 class="title is-5 flex">
                                        <a href="{{$thread->path()}}">{{ $thread->title}}</a>
                                    </h4>
    
                                    <strong class="replies"> {{ $thread->replies_count }} {{ str_plural('сэтгэгдэл', $thread->replies_count) }} </strong>

                                </div>

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