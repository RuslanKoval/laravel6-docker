@php /** @var \App\Models\Blog\BlogPost$item */ @endphp
@php /** @var \Illuminate\Support\Collection $categoryList */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Дополнительные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{old('title', $item->title)}}" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Описание</label>
                            <textarea name="content_raw" id="description" rows="10" class="form-control">{{old('content_raw', $item->content_raw)}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group">
                            <label for="title">Идентификатор</label>
                            <input type="text" name="slug" value="{{old('slug', $item->slug)}}" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Категория</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == old('category_id', $item->category_id)) selected @endif
                                    >{{$categoryOption->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Выдержка</label>
                            <textarea name="excerpt" id="excerpt" rows="10" class="form-control">{{old('excerpt', $item->excerpt)}}</textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published" @if(old('is_published', $item->is_published)) checked @endif>
                            <label class="form-check-label" for="is_published">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
