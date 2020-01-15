@extends('layouts.app')

@section('content')

<thread-view :initial-replies-count="{{$thread->replies_count }}" inline-template>
    
<section class="hero is-fullheight">
      <div class="container">
          <div class="columns">                
                <div class="column is-8">
                    <div class="box" style="margin-top:30px; ">
                        <div class="level">
                            <div class="level-left">
                                <h5 class="title is-6">
                                        <a href=" {{ route('profile', $thread->creator )  }}">{{ $thread->creator->name }}</a> нийтлэв:
                                          {{ Str::limit($thread->title, 80) }} </h5>    
                                
                            </div>

                            @can('update', $thread)
                            <div class="level-right">
                                <form action="{{ $thread->path() }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button">Устга</button>
                                </form>
                            </div>
                            @endcan

                        </div>
                        <hr>
                        <div class="thread-body ">
                            <article>
                                {{ $thread->body }}
                            </article>    
                        </div>
                    </div>   
                    
                    <replies :data ="{{ $thread->replies }}" @removed="repliesCount--"></replies>
                 
                    {{-- {{ $replies->links() }} - --}}
                    <br>
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
                            has <span v-text="repliesCount"></span> {{ str_plural('comment', $thread->replies_count) }}.

                        </p>                    
                    </div>

                </div>

          </div>   
          
      </div>

  </section>

</thread-view>

@endsection
