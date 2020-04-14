@extends('userprofile.layouts.default')

@section('title', 'Show Work')

@section('content')
    <section class="pb-0">
        <div class="container">
            @if($work->user->id == Auth::id())
                <h2 class="pt-2"><a href="{{route("userprofile")}}">Мой профиль</a>/Просмотр работы</h2>
            @else
                <h2 class="pt-2"><a href= "{{route("userprofile.show", $work->user->id)}}">@ {{$work->user->name}}</a>/Просмотр работы</h2>
            @endif
            <div class="text-center pt-5">
                <h2>{{$work->name}}</h2>
                <p class="lead text-muted mt-2">{{$work->description}}</p>
            </div>
            <div class="portfolio mt-5">
                <div class="row d-flex justify-content-center">
                    @forelse($work->images as $image)
                        <div class="col-lg-4 p-0"><a href="/storage/{{$image->patch}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="/storage/{{$image->patch_cover}}" alt="image" class="img-fluid"></a></div>
                    @empty
                        <div class="col-lg-4 p-0"><a href="{{asset('/img/noimage1.jpg')}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="{{asset('/img/noimage1.jpg')}}" alt="image" class="img-fluid"></a></div>
                        <div class="col-lg-4 p-0"><a href="{{asset('/img/noimage1.jpg')}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="{{asset('/img/noimage1.jpg')}}" alt="image" class="img-fluid"></a></div>
                        <div class="col-lg-4 p-0"><a href="{{asset('/img/noimage1.jpg')}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="{{asset('/img/noimage1.jpg')}}" alt="image" class="img-fluid"></a></div>
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
        </div>
    </section>
    <section class="pt-4">
        <div class="container">
            <div>
                <h4 class="pb-4">Коментарии:</h4>
                @include('userprofile.works.commentsShow', ['comments' => $work->comments, 'work_id' => $work->id])
                @auth
                <h4 class="pt-4">Добавить коментарий:</h4>
                <form method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <div >
                        <textarea name="text" class="commentBox"></textarea>
                        <input type="hidden" name="work_id" value="{{ $work->id }}" />
                    </div>
                    <div >
                        <input type="submit" class="commented"  value="Добавить коментарий" />
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </section>
@endsection