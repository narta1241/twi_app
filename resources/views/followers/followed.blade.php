@extends('layouts.app')

@section('content')
        <table border="1">
            <tr>
                <td>USER＿ID</td>
                <td>USER</td>
                <!--<td>フォローする</td>-->
            </tr>
            @foreach($followers as $follower)
            
                <tr>
                    <td>{{$follower->following_user_id}}</td>
                    <td>{{$follower->user_following['name']}}</td>
                    <!--<td>-->
                    <!--    <form action="{{ route('followers.store') }}" method="POST" >-->
                    <!--        <input type="hidden" name="followed_user_id" value="{{ $follower->followed_user_id }}">-->
                    <!--        @csrf-->
                    <!--        <button type="submit" class="btn {{ empty($follower->followed_user_id) ? "btn-primary" : "btn-light"}}">フォロー</button>-->
                    <!--    </form>-->
                    <!--</td>-->
                </tr>
            @endforeach
        </table>
    <a href={{ route('tweets.index') }}>ツイート一覧</a>
    
    
@endsection