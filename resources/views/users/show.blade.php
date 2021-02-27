@extends('layouts.app')

@section('content')
<a href={{ route('timeline.index') }}>タイムライン一覧</a>
<a href={{ route('tweets.index') }}>ツイート一覧</a>

    <div class="text-center container">
        <table border="1">
            <tr>
                <td>USER_ID</td>
                <td>USER</td>
                <td>フォローする</td>
            </tr>
        
            <tr>
                <td>{{$user->tweet->user_id}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @if( $user->id != Auth::id() )
                    <form action="{{ route('followers.store') }}" method="POST" >
                        <input type="hidden" name="followed_user_id" value="{{ $user->id }}">
                        @csrf
                        <button type="submit" class="btn {{ $user->followers->where('following_user_id', Auth::id())->first() ? "btn-primary" : "btn-light"}}">フォロー</button>
                    </form>
                    @endif
                </td>
            </tr>
            
            <div>
                <table border="1">
                <tr>
                    <td>内容</td>
                </tr>
                 @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->text}}</td>
                </tr>
                @endforeach
            </div>
        </table>
    </div>
    
@endsection