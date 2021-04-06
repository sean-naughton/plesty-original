<plest-gallery :user="user" plests="{{ $plests }}" inline-template>
    <div class="container" id="my-games-dashboard">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-12">
                <div class="row plest-search">
                    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search your Plests...">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" disabled>Search</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-sm-4 col-md-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
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
                <div class="row" class="plests">
                    <plesty-plest-card v-for="plest in plests" :plest="plest"></plesty-plest-card>
                </div>
            </div>
        </div>
    </div>
</plest-gallery>