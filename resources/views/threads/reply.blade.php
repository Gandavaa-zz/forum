<div class="box">
    <a href="">{{$reply->owner->name}} </a> хэлжээ
     {{ $reply->created_at->diffForHumans() }} ...
    <hr>
    {{ $reply->body }}                        
</div>                    