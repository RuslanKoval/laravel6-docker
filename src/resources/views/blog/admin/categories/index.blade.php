@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{route('blog.admin.categories.create')}}" class="btn btn-primary">Создать</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Категория</td>
                                <td>Родитель</td>
                                <td>Редактировать</td>
                            </tr>
                        </thead>
                        @foreach($paginator as $item)
                            @php /** @var \App\Models\Blog\BlogCategory $item */ @endphp
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->parentTitle}}</td>
                                <td><a href="{{route('blog.admin.categories.edit', $item->id)}}">Редактировать</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <div class="row justify-content-center mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
