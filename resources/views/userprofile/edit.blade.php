@extends('userprofile.layouts.default')

@section('title', 'Edit Profile')

@section('content')
    <div class="container auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактирование профиля') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Город') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Пол') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('sex') is-invalid @enderror p-1" id="sex" class="form-control" value="{{ $user->sex }}" name="sex" required autocomplete="sex" autofocus>
                                        @if($user->sex == "мужской")
                                        <option class="form-control" selected value="1">Мужской</option>
                                        <option class="form-control" value="2">Женский</option>
                                        @endif
                                        @if($user->sex == "женский")
                                            <option class="form-control" value="1">Мужской</option>
                                            <option class="form-control" selected value="2">Женский</option>
                                        @endif
                                    </select>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
