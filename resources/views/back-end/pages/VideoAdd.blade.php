  
  <div class="modal fade" id="add-video-{{ $showcourse->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Video: <strong class="text-success"></strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('add-video',$showcourse->id) }}" enctype="multipart/form-data" autocomplete="off">
                @csrf
            
              <!-- File Upload | Drag & Drop OR With Click & Choose -->
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Add Video
                   
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                       
                    </li>
                </ul>
            </div>
            <div class="body">
              
                <div class="dropzone">
                    <div class="dz-message">
                        <div class="drag-icon-cph">
                            <i class="material-icons">touch_app</i>
                        </div>
                        <h3>Drop file here or click to upload.</h3>
                     
                    </div>
                    
                    
                    <div class="fallback">
                        <input name="video" type="file" multiple />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

<div class="col-md-12">
  <label for="lesson">Lesson number</label>
  <input name="lesson" class="form-control" placeholder="Enter the lesson number. The Demo should be lesson 1 Eg. Lession 1"id="lesson" type="text"/>

</div>
<div class="col-md-12">
  <label for="description"> Video description</label>
  <input name="description" class="form-control" placeholder="Enter a small description about the lesson or video"id="description" type="text"/>

</div>
               
            
                <br>
                <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Add Video</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  