<aside class="sidenav">
    <a id="close-sidebar" class="btn btn-link"><span class="float-right"><i class="fa fa-close"></i></span></a>
    <div class="container-fluid">
        <h2>Now Playing</h2>
        <p id="now_playing"></p>
        <hr>
        <form>
            <input type="hidden" id="audio_id">
            <div class="form-group">
                <label for="audiofile"></label>
                <input type="file" class="form-control-file" name="eaudiofile" id="eaudiofile" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="ecategory" id="ecategory" required>
                    @foreach(\App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tagname">Tag name</label>
                <input type="text" class="form-control" name="etagname" id="etagname" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="audio-content">Content</label>
                <textarea class="form-control" name="eaudio_content" id="eaudio_content" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <button type="button" id="edit_audio" class="btn btn-primary form-control">Edit</button>
            </div>
        </form>
    </div>
</aside>