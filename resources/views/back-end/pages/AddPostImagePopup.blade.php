  <div class="modal fade" id="add-image-{{ $post->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Image: <strong class="text-success"></strong>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form method="post" action="{{ route('add-post-image', $post->id) }}" enctype="multipart/form-data">
                      @csrf
                    
                      <!-- File Upload | Drag & Drop OR With Click & Choose -->
                      <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="card">
                                  <div class="header">
                                      <h2>
                                          Add image

                                      </h2>
                                      <ul class="header-dropdown m-r--5">
                                          <li class="dropdown">
                                              <a href="javascript:void(0);" class="dropdown-toggle"
                                                  data-toggle="dropdown" role="button" aria-haspopup="true"
                                                  aria-expanded="false">
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
                                              <h3>Drop files here or click to upload.</h3>

                                          </div>
                                          <div class="fallback">
                                              <input name="filename[]" type="file" multiple />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->




                      <br>
                      <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Add Image</button>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
