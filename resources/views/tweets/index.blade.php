@extends('layouts.app')

@section('content')
    <a href={{ route('timeline.index') }}> タイムライン一覧 </a>
    <a href={{ route('tweets.create') }}> 新規作成 </a>
    <a href={{ route('favorites.index') }}> いいね一覧 </a>
    <a href={{ route('users.index') }}> ユーザー一覧 </a>
    <a href={{ route('followers.index', ['pattern' => 'following']) }}> フォロー一覧 </a>
    <a href={{ route('followers.index', ['pattern' => 'followed']) }}> フォロワー一覧 </a>
    
    <div class="text-center">
        <table border="1">
            <tr>
                <td>USER_ID</td>
                <td>内容</td>
                <td>登録日時</td>
                <td>更新日時</td>
                <td>編集</td>
                <td>削除</td>
                <td>いいね</td>
                <td>リツイート</td>
            </tr>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->user_id}}</td>
                    <td>{{$tweet->text}}</td>
                    <td>{{$tweet->created_at}}</td>
                    <td>{{$tweet->updated_at}}</td>
                    <td><a href="{{route('tweets.edit', $tweet['id'])}}">編集</a></td>
                    <td>
                        <form action="/tweets/{{ $tweet->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <!--<input type="hidden" name="_method" value="DELETE">-->
                            @method('DELETE')
                            <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                            @csrf
                            <button type="submit" class="btn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('favorites.store') }}" method="POST" >
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            @csrf
                            <button type="submit" class="btn">いいね * {{ $tweet->favorites()->count() }}</button>
                        </form>
                    </td>
                     <td>
                        <form action="{{ route('retweet.create') }}" method="GET" >
                            {{method_field('GET')}} 
                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                            @csrf
                            <button type="submit" class="btn {{ $tweet->retweet_flg == 1 ? "btn-success" : "btn-light"}}">リツイート* {{ $tweet->retweet_count($tweet['parent_tweet_id']) }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </table>
    </div>
@endsection