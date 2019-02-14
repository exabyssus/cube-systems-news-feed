@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach($feeds as $channel)
                    <div class="row">
                        <div class="col-xl-4 col-xs-2 col-md-4 p-1">
                            @include('pages.feed.channel', ['channel' => $channel])
                        </div>
                        @foreach($channel->getItems($limit) as $item)
                            @include('pages.feed.item', ['item' => $item])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

