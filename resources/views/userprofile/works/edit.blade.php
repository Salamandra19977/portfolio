@extends('userprofile.layouts.default')

@section('title', 'Update Work')

@section('content')
    <section>
        <div class="container flex-center position-ref full-height pt-4 add">
            <form id="fileupload" action="{{route('work.update', $work->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Название работы</label>

                    <div class="col-md-6">
                        <input id="name" value="{{$work->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Описание работы</label>

                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('name') }}" required autocomplete="name" autofocus>{{$work->description}}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Добавить изображения</label>

                    <div class="col-md-6">

                        <input type="file" name="images[]" multiple accept="image/*,image/jpeg"  class="form-control @if($errors->has('images.*'))) is-invalid @endif">

                        @if($errors->has('images.*'))
                            <span class="invalid-feedback d-flex" role="alert">
                                <strong>Разрешен формат файлов только jpg,jpeg,png</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center d-flex">
                    @forelse($work->images as $image)
                        <div class="col-lg-2">
                            <img src="/storage/{{$image->patch_cover}}" alt="image" class="img-fluid">
                            <a class="pt-2 btn btn-primary mt-2 mb-4"  href="{{route('image.remove', $image->id)}}" onclick="return confirm('Вы действительно хотите удалить?');">Удалить</a>
                        </div>
                    @empty
                    @endforelse
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection