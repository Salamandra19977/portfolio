@foreach($comments as $comment)
    <div  @if($comment->parent_id != null) style="margin-left:40px;" @endif class="p-3">
        <strong>{{ '@ '.$comment->user->name }} #{{$comment->created_at->format("m/d/Y")}} </strong>
        <p class="mb-0">{{ $comment->text }}</p>

        <form class="commentForm" method="POST" action="{{ route('comment.store') }}">
            @csrf
            <div>
                <input class="replybox" type="text" name="text"/>
                <input type="hidden" name="work_id" value="{{ $work_id}}"/>
                <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
            </div>
            <div>
                <input type="submit" class="commented"  value="Ответить"/>
            </div>
        </form>

        <form class="commentEdit" method="POST" action="{{ route('comment.edit', $comment->id) }}">
            @csrf
            <div>
                <input class="replybox" type="text" name="text" value="{{$comment->text}}"/>
                <input type="hidden" name="work_id" value="{{ $work_id}}"/>
                <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}"/>
            </div>
            <div>
                <input type="submit" class="commented"  value="Сохранить"/>
            </div>
        </form>

        <div>
            @auth
                @if($comment->user_id != Auth::id())
                    <a href="" id="reply" class="">Ответить</a>
                @endif
                @if($comment->user_id == Auth::id())
                    <a href="" id="editBtnCom">Изменить</a>
                    <a href="{{route("comment.remove",$comment->id)}}" class="">Удалить</a>
                @endif
                <a href="" class="cancel">Отменить</a>
            @endauth
        </div>
        @include('userprofile.works.commentsShow', ['comments' => $comment->replies])
    </div>
@endforeach