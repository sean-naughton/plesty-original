<div class="col-md-3">
    <h4>Answer {{ $number }}</h4>
    <input type="text" name="answers[]" class="form-control">
    <div class="row text-center">
        <div class="row" v-show="!image{{ $number }}">
            <label class="btn btn-default btn-file text-center">
                Thumbnail
                <input type="file"
                       name="answers-images[]"
                       plest-question-image-id="{{ $number }}"
                       style="display: none;"
                       @change="onFileChange"
                >
            </label>
        </div>
        <div class="row" v-show="image{{ $number }}">
            <img :src="image{{ $number }}" height="100"/>
            <br /><br />
            <button @click="removeImage">Remove Thumbnail</button>
        </div>
    </div>
</div>