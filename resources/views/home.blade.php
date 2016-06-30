@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>

    @include('my-games/subnav')

    <div class="container" id="my-games-dashboard">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-12">
                <div class="row plest-search">
                    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search your Plests...">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button">Search</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-sm-4 col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Subject <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Math</a></li>
                                <li><a href="#">ELA</a></li>
                                <li><a href="#">Science</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/mario-thumbnail.png);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/minecraft-thumbnail.jpeg);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/flappy-bird-thumbnail.png);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/minecraft-thumbnail.jpeg);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/minecraft-thumbnail.jpeg);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div class="image" style="background-image: url(img/minecraft-thumbnail.jpeg);"></div>
                            <div class="caption">
                                <h3>My First Plest</h3>
                                <p>Discover what Plest is all about by playing this one!</p>
                                <p class="plest-option-buttons">
                                    <a href="#" class="btn btn-play" role="button"><span class="glyphicon glyphicon-play"></span>Play</a>
                                    <a href="#" class="btn btn-create" role="button"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                    <a href="#" class="btn btn-favorite" role="button"><span class="glyphicon glyphicon-star"></span>Favorite</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
