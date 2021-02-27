@extends('layouts.app')

@section('content')
<div class="text-center">
ID: {{ $retweet->id }}<br />
ツイート内容: {{ $retweet->text }}
</div>

<div class="text-center">
 @foreach($retweet->comments()->get() as $comment)
    ID: {{ $comment->id }}, ユーザーID: {{ $comment->user_id }} コメント: {{ $comment->text }}<br />
 @endforeach
 </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('リツイート') }}</div>

           
           
                <div class="card-body">
                    <form method="POST" action="{{ route('retweet.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                        <input type="hidden" name="tweet_id" value="{{ $retweet->id }}" />
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Tweet') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" class="form-control @error('name') is-invalid @enderror" name="text">{{ old('name') }}</textarea>
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ReTweet') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection