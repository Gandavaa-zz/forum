@component('profiles.activities.activity')
    @slot('heading')
    {{-- activity->subject is model of your connected --}}
        <a href="{{ $activity->subject->favorited->path() }}">
            
            {{ $profileUser->name }} favorited a reply
        </a>
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot
@endcomponent
                  
