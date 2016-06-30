@extends('spark::layouts.app')

@section('content')

    @include('question-nav')

    <new-question :plest="plest" inline-template id="new-question">
        <div class="col-md-9">
            <h3>Plest: {{ $plest->name }}</h3>
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/plests/{{ $plest->id }}/questions">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h4>Question {{ $plest->countQuestions + 1 }}</h4>
                        <input type="text" name="title" class="form-control input-lg" placeholder="Ask your question here">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        @foreach(range(1,4) as $answerNumber)
                            @include('question-answer', ['number' => $answerNumber])
                        @endforeach
                    </div>
                </div>

                <div class="row text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Save Question</button>
                </div>
            </form>
        </div>
    </new-question>
@endsection
