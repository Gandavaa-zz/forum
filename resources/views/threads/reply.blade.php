<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="box">
        <a href="{{ route('profile', $reply->owner ) }} ">{{$reply->owner->name}} </a> хэлжээ   {{ $reply->created_at->diffForHumans() }} ...
    
        @if (Auth::check())
        <div class="is-pulled-right">
            
            <favorite :reply="{{ $reply }}"></favorite>

        </div>
        @endif
         
        <hr>
        <div v-if="editing">
            <div class="field">
                <textarea class="textarea" v-model="body" rows="4">{{ $reply->body }}</textarea>
            </div>
           
            <div class="control">
                <button class="button is-small is-info" @click="update">Шинэчлэх</button>
                <button class="button is-small" @click="editing=false">Цуцлах</button>
            </div>
        </div>

        <div v-else v-text="body"></div>
    
        @can('update', $reply)

            <div class="buttons" style="border-top:1px solid #f5f5f5; margin-top:10px; padding-top:15px;">
                
                <button class="button is-small is-light" @click="editing = true">Засах</button>
                <button class="button is-small is-danger" @click="destroy">Устгах</button>
             
            </div>
        @endcan        
    </div>                    

</reply>

