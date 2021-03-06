@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    @include('_navbar_search')

    <div class="flex-1 lg:my-10 my-5">
        <h3 class="lg:text-3xl text-xl mb-1">
            Senior Backend Engineer - Craft & Web Prototyping
        </h3>
        <div class="flex justify-between">
            <p class="lg:text-lg text-xs inline">Started by: Author @ Time</p>
            <create-chattr></create-chattr>
        </div>
    </div>

    @foreach($chattrs as $chattr)
        <chattr-component chattr="{{ $chattr->chattr }}" likes="{{ $chattr->likes }}" dislikes="{{ $chattr->dislike }}" image-link="{{ $chattr->torre_details_id }}"></chattr-component>
    @endforeach

</div>
@endsection
