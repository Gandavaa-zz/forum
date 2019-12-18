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
                                <h1 class="title is-5">Гарчиг</h1>    
                                <div class="control">
                                <input type="text" class="input" name="title" value="{{ old('title')}}">
                                </div>
                            </div>  
                            <div class="field">       
                                <h1 class="title is-5">Гол хэсэг:</h1>              
                                <div class="control">
                                    <textarea name="body" id="body" class="textarea" rows="8">{{ old('body') }} 
                                    </textarea>
                                </div>
                            </div>  
                            <button type="submit" class="button is-primary">Хадгалах</button>
                        </div>
                    </form>
                  </article>                
              </div>
        </div>   

</section>

@endsection
