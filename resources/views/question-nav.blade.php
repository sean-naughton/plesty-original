<div class="col-md-3 plest-questions-list">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Questions</h3>
        </div>
        <div class="panel-body">
            @if($plest->countQuestions > 0)
                <ol>
                @foreach($plest->questions as $question)
                        <li><a href="/questions/{{$question->id}}/edit">{{ $question->title }}</a></li>
                @endforeach
                </ol>
            @else
                <p>No questions have been added yet.</p>
            @endif
        </div>
    </div>
</div>