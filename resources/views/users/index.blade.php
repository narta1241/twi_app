@extends('layouts.app')

@section('content')

        <div class ="mb-4">
            <table border="1">
                <tr>
                    <td>USER_ID</td>
                    <td>USER</td>
                    <td>フォローする</td>
                </tr>
            </table>
        </div>
            
        <table border="1">
            @foreach($users as $user)
                <tr>
                    <td><a href={{ route('users.show',$user->id) }} class="btn stretched-link" >{{$user->id}}</a></td>
                    <td>{{$user->name}}</td>
                @if( $user->id != Auth::id() )
                    <td>
                        <form action="{{ route('followers.store') }}" method="POST" >
                            <input type="hidden" name="followed_user_id" value="{{ $user->id }}">
                            @csrf
                            <button type="submit" class="btn {{ $user->followers->where('following_user_id', Auth::id())->first() ? "btn-primary" : "btn-light"}}">フォロー</button>
                        </form>
                    </td>
                @else
                <td>            </td>
                @endif
                </tr>
            @endforeach
        </table>
    <a href={{ route('tweets.index') }}>ツイート一覧</a>
@endsection