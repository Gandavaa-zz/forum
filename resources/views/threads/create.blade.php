@extends('layouts.app')

@section('content')

<section class="hero">
        <div class="columns is-mobile">                
            <div class="column is-offset-2 is-8">
                  <article class="box" style="margin-top:30px">
                    <form method="POST" action="/threads" >
                        {{ csrf_field() }}
                      <h2 class="title is-5 ">Сэдэв үүсгэх</h2>                          
                      <hr>
                        <div class="thread-body">
                            <div class="field">       
                                <h1 class="title is-5">Сувгаас сонгоно уу...</h1>    
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="channel_id" id="channel_id" required>
                                            <option value="">Choose one....</option>
                                            @foreach ($channels as $channel)
                                                <option value="{{$channel->id}}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                                    {{ $channel->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="field">       
                                <h1 class="title is-5">Гарчиг</h1>    
                                <div class="control">
                                   <input type="text" class="input" name="title" value="{{ old('title')}}" required>
                                </div>
                            </div>  
                            <div class="field">       
                                <h1 class="title is-5">Гол хэсэг:</h1>              
                                <div class="control">
                                    <textarea name="body" id="body" class="textarea" rows="8" required>{{ old('body') }} 
                                    </textarea>
                                </div>
                            </div>  
                            <div class="field">
                                <button type="submit" class="button is-primary">Хадгалах</button>
                            </div>

                            @if(count($errors))
                                <article class="message is-danger">
                                    <div class="message-body">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        
                                        <li> {{ $error }} </li>

                                        @endforeach
                                        </ul>
                                    </div>
                                </article>
                            @endif
                        </div>

                        
                    </form>
                  </article>                
              </div>
        </div>   

</section>

@endsection
