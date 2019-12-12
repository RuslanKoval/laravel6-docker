@php /** @var \App\Models\Blog\BlogCategory $item */ @endphp
@php /** @var \Illuminate\Support\Collection $categoryList */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-data" class="nav-link active" data-togle="tab" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="main-data" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{old('title', $item->title)}}" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Идентификатор</label>
                            <input type="text" name="slug" value="{{old('slug', $item->slug)}}" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Родительская категория</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == old('parent_id', $item->parent_id)) selected @endif
                                    >{{$categoryOption->title}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Описание</label>
                            <textarea name="description" id="description" class="form-control">{{old('description', $item->description)}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
