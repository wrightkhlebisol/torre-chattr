@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    @include('_navbar_search')

    <div class="flex-1 my-10">
        <h3 class="text-3xl mb-1">
            Senior Backend Engineer - Craft & Web Prototyping
        </h3>
        <p class="text-lg">Started by: Author @ Time</p>
    </div>

    <div class="flex-1">
        <button>Create Chattr</button>
    </div>
    @include('_comment_section')
    @include('_comment_section')
    @include('_comment_section')
    @include('_comment_section')
    @include('_comment_section')
    @include('_comment_section')

</div>
@endsection
