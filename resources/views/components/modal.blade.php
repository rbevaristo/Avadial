<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Audio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('audio.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="audiofile"></label>
              <input type="file" class="form-control-file" name="audiofile" id="audiofile" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                  <select class="form-control" name="category" id="category" required>
                    @foreach(\App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="tagname">Tag name</label>
                <input type="text" class="form-control" name="tagname" id="tagname" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="audio-content">Content</label>
                <textarea class="form-control" name="audio_content" id="audio_content" rows="3" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
</div>