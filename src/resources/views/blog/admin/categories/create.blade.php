@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Blog\BlogCategory $item */ @endphp

    <form method="POST" action="{{route('blog.admin.categories.store')}}">
        @method('POST')
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
