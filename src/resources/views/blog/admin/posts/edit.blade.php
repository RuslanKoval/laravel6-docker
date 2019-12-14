@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Blog\BlogPost $item */ @endphp
    <div class="container">
        <form method="POST" action="{{route('blog.admin.posts.update', $item->id)}}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-2">
                        <div class="card-body">
                            @if($item->is_published)
                                <div class="alert alert-success mb-0" role="alert">
                                    Опубликовано
                                </div>
                            @else
                                <div class="alert alert-warning mb-0" role="alert">
                                   Не опубликовано
                                </div>
                            @endif
                        </div>
                    </div>
                    @include('blog.admin.posts.includes.item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </form>
        <div class="card mt-2">
            <div class="card-body">
                @include('blog.admin.posts.includes.delete')
            </div>
        </div>
    </div>

@endsection
