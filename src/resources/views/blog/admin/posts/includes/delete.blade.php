@php /** @var \App\Models\Blog\BlogPost$item */ @endphp

@if($item->exists)
    <form method="POST" action="{{route('blog.admin.posts.destroy', $item->id)}}" class="mr-1 ml-1">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-outline-danger">Удалить</button>
    </form>
@endif
