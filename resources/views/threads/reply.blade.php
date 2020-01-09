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
</div>                    