@extends('layouts.app')
@section('content')
    
<section class="hero is-fullheight">
      <div class="container">
          <div class="columns">                
              <div class="column is-offset-2 is-8">
                    <div class="box" style="margin-top:30px">
                        <h2 class="title is-8">  {{ $thread->path() }} </h2>    
                        <hr>
                        <div class="thread-body ">
                            <article class="is-6">
                                {{ $thread->body }}
                            </article>    
                        </div>
                    </div>                
                </div>
          </div>        
      </div>
  </section>
  
  @endsection