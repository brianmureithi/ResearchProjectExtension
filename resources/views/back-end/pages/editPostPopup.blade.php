<div class="modal fade" id="edit-post-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Post: <strong class="text-success">( {{$post->title}}) </strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('update-post-route',$post->id) }}" enctype="multipart/form-data" autocomplete="off">
                @method('PUT')
                @csrf
            
                <label for="title">Title</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="title" name="title" value="{{ $post->title }}"class="form-control" placeholder="Enter post title">
                    </div>
                </div>
                <label for="slug">Slug</label>
                
                <div>
                <label for="post">Post's content</label>

                    <div class="form-line">
                        <textarea id="ckeditor" name="post">
                            {!! $post->post !!}
                        </textarea>
                    </div>

                </div>

               
            
                <br>
                <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Edit Post</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>