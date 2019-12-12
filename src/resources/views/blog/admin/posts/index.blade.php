@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary">Создать</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">User</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created</th>
                                <th scope="col">Is published</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\Blog\BlogPost $item */ @endphp
                                <tr @if(!$item->is_published) class="table-danger" @endif>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->category->title}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d.m.Y H:i:s')}}</td>
                                    <td>@if($item->is_published) Да @else Нет @endif</td>
                                    <td><a href="{{route('blog.admin.posts.edit', $item->id)}}">Редактировать</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
