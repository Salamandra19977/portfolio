@extends('userprofile.layouts.default')

@section('title', 'User Profile')

@section('content')
    <section>
        <div class="container">
            @if(Route::currentRouteName() == "userprofile")
                <div class="pt-5 pb-4 d-flex ml-2 flex-wrap font-weight-light">
                    <a href="{{route('work.create')}}" class=" mr-2 mt-2 commented">
                        <i class="fa fa-plus"></i>
                        Добавить работу
                    </a>
                    <a href="{{route('user.edit')}}" class="mr-2 mt-2 commented ">
                        <i class="fa fa-edit"></i>
                        Редактировать профиль
                    </a>
                    <div class="d-flex mr-2 mt-2 align-content-end">
                        <input id="linkBox" type="text" class="to-copy replybox" placeholder="Type something..." aria-label="Type something" value="{{Request::url().'/id'.Auth::id()}}">
                        <button onclick="copyLink()" class="commented"><i class="fa fa-copy"></i> Скопировать ссылку на профиль</button>
                    </div>
                </div>
            @endif
            @if(Route::currentRouteName() == "userprofile.show")
                <div class="profile">
                    <div class="card-profile">
                        <h2 class="pt-2">Профиль пользователя: {{$works[0]->user->name}}</h2>
                    </div>
                </div>
            @endif
            @forelse($works as $work)
                <div class="text-center pt-5">
                    <a href="{{route('work.show',$work->id)}}">
                        <h2>{{$work->name}}</h2>
                        <p class="lead text-muted mt-2">{{$work->description}}</p>
                    </a>
                </div>
                @if($work->user_id == Auth::id())
                <div class="d-flex justify-content-end">
                    <a href="{{route('work.edit', $work->id)}}" class="btn btn-primary mr-2">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('work.remove', $work->id)}}" onclick="return confirm('Вы действительно хотите удалить?');" class="btn btn-primary">
                        <i class="fa fa-remove"></i>
                    </a>
                </div>
                @endif
                <div class="portfolio mt-5">
                    <div class="row d-flex justify-content-center">
                        @forelse($work->images as $image)
                            <div class="col-lg-4 p-0"><a href="/storage/{{$image->patch}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="/storage/{{$image->patch_cover}}" alt="image" class="img-fluid"></a></div>
                        @empty
                            <div class="text-center pt-5">
                                <p class="lead text-muted mt-2"></p>
                            </div>
                        @endforelse
                    </div>
                    <div class="post-details pb-2 h5 pt-4">
                        <div class="post-meta d-flex justify-content-end">
                            <div class="col-lg-1 view">
                                <i class="fa fa-eye"></i>
                                <span>{{ $work->views->count('id') }}</span>
                            </div>
                            @auth
                            <div class="col-lg-1 dislikeBox" data-workid="{{ $work->id }}">
                                @if(Auth::user()->assessments->where('work_id', $work->id)->first())
                                    @if(Auth::user()->assessments->where('work_id', $work->id)->first()->assessment == 0)
                                        <button class="dislike assessment">
                                            <i class="fa fa-thumbs-down"></i>
                                            <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                        </button>
                                    @else
                                        <button class="dislike">
                                            <i class="fa fa-thumbs-down"></i>
                                            <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                        </button>
                                    @endif
                                @else
                                    <button class="dislike">
                                        <i class="fa fa-thumbs-down"></i>
                                        <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                    </button>
                                @endif
                            </div>
                            <div class="col-lg-1 likeBox" data-workid="{{ $work->id }}">
                                @if(Auth::user()->assessments->where('work_id', $work->id)->first())
                                    @if(Auth::user()->assessments->where('work_id', $work->id)->first()->assessment == 1)
                                        <button class="like assessment">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                        </button>
                                    @else
                                        <button class="like">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                        </button>
                                    @endif
                                @else
                                    <button class="like">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                    </button>
                                @endif
                            </div>
                            @endauth
                            @guest
                                <div class="col-lg-1 dislikeBox" data-workid="{{ $work->id }}">
                                    <button class="dislike-out" onclick="return alert('Вы не можете оценивать так как не авторизовались');">
                                        <i class="fa fa-thumbs-down"></i>
                                        <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                    </button>
                                </div>
                                <div class="col-lg-1 likeBox" data-workid="{{ $work->id }}">
                                    <button class="like-out" onclick="return alert('Вы не можете оценивать так как не авторизовались');">
                                        <i class="fa fa-thumbs-up"></i>
                                        <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                    </button>
                                </div>
                            @endguest
                            <div class="col-lg-1 comment">
                                <i class="fa fa-comment "></i>
                                <span>{{ $work->commentsCount->count('id') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center pt-5">
                    <p class="lead text-muted mt-2">У вас нет загруженных работ</p>
                </div>
            @endforelse
            <div class="navblock d-flex justify-content-center">
                {{ $works->links() }}
            </div>
        </div>
    </section>
@endsection