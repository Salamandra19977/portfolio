@extends('userprofile.layouts.default')

@section('title', 'Show Work')

@section('content')
    <section>
        <div class="container">
            <div class="text-center pt-5">
                <h2>{{$work->name}}</h2>
                <p class="lead text-muted mt-2">{{$work->description}}</p>
            </div>
            <div class="portfolio mt-5">
                <div class="row d-flex justify-content-center">
                    @forelse($work->images as $image)
                        <div class="col-lg-4 p-0"><a href="http://portfolio/storage/{{$image->patch}}" data-lightbox="image-1" data-title="{{$work->name}}" class="portfolio-item"><img src="http://portfolio/storage/{{$image->patch}}" alt="image" class="img-fluid"></a></div>
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
                        <div class="col-lg-1 comment">
                            <i class="fa fa-comment "></i>
                            <span>{{ $work->comments->count('id') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection