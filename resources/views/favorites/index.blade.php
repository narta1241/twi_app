@extends('layouts.app')

@section('content')
        <table border="1">
            <tr>
                <td>TWEET_ID</td>
                <td>内容</td>
                <td>いいね</td>
            </tr>
            
            @foreach($favorites as $favorite)
                <tr>
                    <td>{{$favorite->tweet_id}}</td>
                    <td>{{$favorite->tweet->text}}</td>
                    <td>
                        いいね * {{ $favorite->tweet->favorites()->count() }}
                    </td>
                </tr>
            @endforeach
            
        </table>
        <a href={{ route('tweets.index') }}>ツイート一覧</a>
@endsection