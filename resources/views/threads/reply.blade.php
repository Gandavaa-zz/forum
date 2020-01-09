<div id="reply-{{ $reply->id }}" class="box">
    <a href="{{ route('profile', $reply->owner ) }} ">{{$reply->owner->name}} </a> хэлжээ   {{ $reply->created_at->diffForHumans() }} ...

    <div class="is-pulled-right">

        <form action="/replies/{{ $reply->id }}/favorites" method="POST" class="">
            @csrf 
                <button type="submit" class=" button is-primary" {{ $reply->isFavorited() ? 'disabled' : '' }} >
                    {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                </button>
        </form>
    </div>
     
    <hr>

    {{ $reply->body }}                
    

    @can('update', $reply)
        
    <div class="buttons" style="border-top:1px solid #f5f5f5; margin-top:10px; padding-top:15px;">
        <form method="POST" action="/replies/{{ $reply->id }}">
            @csrf

            @method('DELETE')  

            <button type="submit" class="button is-small is-danger">Устга</button>
        </form>
    </div>
    @endcan
    
</div>                    