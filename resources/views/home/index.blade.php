@extends('home.layouts.default')

@section('title', 'Home')

@section('content')
    <section class="latest-posts pb-5">
        <div class="container">
            <header>
                <h2>Новые работы</h2>
                <p class="text-big">Проекты, которые были не давно добавлены</p>
            </header>
            <div class="row">
                @forelse($data['new_woks'] as $work)
                <div class="post col-md-4 position-relative">
                    <div class="post-thumbnail">
                        <a href="{{route("work.show", $work->id)}}">
                            <img  src="/storage/{{$work->images[0]->patch_cover}}" alt="..." class="img-fluid">
                        <p class="h6 position-absolute m-3 p-4 justify-content-center work_name text-white ">{{$work->name}}</p></a>
                    </div>
                    <div class="post-details pb-2">
                        <div class="post-meta d-flex justify-content-between">
                            @if($work->user_id == Auth::id())
                                <div class="author col-lg-4 no-pading"><a href="{{route("userprofile")}}">{{$work->user->name}}</a></div>
                            @else
                                <div class="author col-lg-4 no-pading"><a href="{{route("userprofile.show",$work->user->id)}}">{{$work->user->name}}</a></div>
                            @endif
                            <div class="col-lg-2 view">
                                <i class="fa fa-eye"></i>
                                <span>{{ $work->views->count('id') }}</span>
                            </div>
                            <div class="col-lg-2 dislike">
                                <i class="fa fa-thumbs-down"></i>
                                <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                            </div>
                            <div class="col-lg-2 like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                            </div>
                            <div class="col-lg-2 comment">
                                <i class="fa fa-comment "></i>
                                <span>{{ $work->commentsCount->count('id') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="latest-posts pb-5 pt-0">
        <div class="container">
            <header>
                <h2>Популярные работы</h2>
                <p class="text-big">Проекты, у которых больше всего просмотров</p>
            </header>
            <div class="row">
                @forelse($data['views_works'] as $work)
                    <div class="post col-md-4 position-relative">
                        <div class="post-thumbnail">
                            <a href="{{route("work.show", $work->id)}}">
                                <img  src="/storage/{{$work->images[0]->patch_cover}}" alt="..." class="img-fluid">
                                <p class="h6 position-absolute m-3 p-4 justify-content-center work_name text-white ">{{$work->name}}</p></a>
                        </div>
                        <div class="post-details pb-2">
                            <div class="post-meta d-flex justify-content-between">
                                @if($work->user_id == Auth::id())
                                    <div class="author col-lg-4 no-pading"><a href="{{route("userprofile")}}">{{$work->user->name}}</a></div>
                                @else
                                    <div class="author col-lg-4 no-pading"><a href="{{route("userprofile.show",$work->user->id)}}">{{$work->user->name}}</a></div>
                                @endif
                                <div class="col-lg-2 view">
                                    <i class="fa fa-eye"></i>
                                    <span>{{ $work->views->count('id') }}</span>
                                </div>
                                <div class="col-lg-2 dislike">
                                    <i class="fa fa-thumbs-down"></i>
                                    <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                </div>
                                <div class="col-lg-2 like">
                                    <i class="fa fa-thumbs-up"></i>
                                    <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                </div>
                                <div class="col-lg-2 comment">
                                    <i class="fa fa-comment "></i>
                                    <span>{{ $work->commentsCount->count('id') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section class="latest-posts pb-5 pt-0">
        <div class="container">
            <header>
                <h2>Коментируемые работы</h2>
                <p class="text-big">Проекты, которые набрали больше всего коментариев</p>
            </header>
            <div class="row">
                @forelse($data['comented_works'] as $work)
                    <div class="post col-md-4 position-relative">
                        <div class="post-thumbnail">
                            <a href="{{route("work.show", $work->id)}}">
                                <img  src="/storage/{{$work->images[0]->patch_cover}}" alt="..." class="img-fluid">
                                <p class="h6 position-absolute m-3 p-4 justify-content-center work_name text-white ">{{$work->name}}</p></a>
                        </div>
                        <div class="post-details pb-2">
                            <div class="post-meta d-flex justify-content-between">
                                @if($work->user_id == Auth::id())
                                    <div class="author col-lg-4 no-pading"><a href="{{route("userprofile")}}">{{$work->user->name}}</a></div>
                                @else
                                    <div class="author col-lg-4 no-pading"><a href="{{route("userprofile.show",$work->user->id)}}">{{$work->user->name}}</a></div>
                                @endif
                                <div class="col-lg-2 view">
                                    <i class="fa fa-eye"></i>
                                    <span>{{ $work->views->count('id') }}</span>
                                </div>
                                <div class="col-lg-2 dislike">
                                    <i class="fa fa-thumbs-down"></i>
                                    <span>{{$work->assessments->where("assessment","=","0")->count('id')}}</span>
                                </div>
                                <div class="col-lg-2 like">
                                    <i class="fa fa-thumbs-up"></i>
                                    <span>{{$work->assessments->where("assessment","=","1")->count('id')}}</span>
                                </div>
                                <div class="col-lg-2 comment">
                                    <i class="fa fa-comment "></i>
                                    <span>{{ $work->commentsCount->count('id') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection