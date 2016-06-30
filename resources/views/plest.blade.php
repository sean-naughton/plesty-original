<div class="plest-card col-sm-6 col-md-3">
    <div class="thumbnail">
        @if($plest->thumbnail)
            <img src="{{ $plest->thumbnail->full_size_path }}" alt="{{ $plest->name }}">
        @else
            <img src="" alt="{{ $plest->name }}">
        @endif
        <div class="caption">
            <h3 title="{{ $plest->name }}">{{ $plest->name }}</h3>
            <p>Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah Blah dee blah blah </p>
        </div>
        <div class="option-buttons">
            <a href="#" class="btn btn-play" role="button" title="Play"><span class="glyphicon glyphicon-play"></span></a>
            <a href="#" class="btn btn-create" role="button" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
            <a href="#" class="btn btn-favorite" role="button" title="Favorite"><span class="glyphicon glyphicon-star"></span></a>
        </div>
    </div>
</div>