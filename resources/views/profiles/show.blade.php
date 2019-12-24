@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-body">
      <div class="container">
          <div class="column is-offset-2 is-8">
                <h1 class="title">
                    {{ $profileUser->name }}  
                    <small> {{ $profileUser->created_at->diffForHumans() }} </small>
                </h1>
                <hr>
                @foreach ($activities as $date => $activity)
                    <h2 class="title is-5"> {{ $date }} </h2>
                    @foreach ($activity as $record)
                        @include("profiles.activities.{$record->type}", ['activity' => $record ])                        
                    @endforeach
                @endforeach

                {{-- {{ $threads->links() }} --}}
            </div>
            
        </div>
    </div>
    </div>
  </section>


@endsection