@extends('spark::layouts.app')

@section('content')
    <new-plest inline-template>
        <div class="container" id="new-plest">
            <!-- Application Dashboard -->
            <div class="row">
                <h1>Every Plest starts with a great name</h1>
                <h5>(But of course, you can always change your mind later)</h5>
            </div>
            <div class="row">
                {{--@include('spark:shared.errors')--}}

                <form method="POST" action="/plests" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <div class="col-md-6 col-md-offset-3">
                        <div class="row">
                            <div class="form-group">
                                <label for="engine">Choose an engine:</label>
                                <select class="form-control" name="engine">
                                    <option value="" disabled selected>Select one</option>
                                    @foreach(App\Engine::all() as $engine)
                                        <option value="{{ $engine->id }}">{{ $engine->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <input name="name" type="text" class="form-control" placeholder="Name your Plest">
                        </div>

                        <div class="row">
                            <textarea name="description" class="form-control" placeholder="Describe your Plest"></textarea>
                        </div>

                        <div class="row text-center">
                            <div class="row" v-show="!image">
                                <label class="btn btn-default btn-file text-center">
                                    Thumbnail
                                    <input type="file"
                                           name="thumbnail"
                                           style="display: none;"
                                           @change="onFileChange"
                                    >
                                </label>
                            </div>
                            <div class="row" v-show="image">
                                <img :src="image" height="100"/>
                                <br /><br />
                                <button @click="removeImage">Remove Thumbnail</button>
                            </div>
                        </div>

                        <div class="row text-center">
                            <button type="submit" class="btn btn-default btn-lg">
                                Go!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </new-plest>
@endsection
