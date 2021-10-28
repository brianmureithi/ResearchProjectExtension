<div class="modal fade" id="add-course-{{$showcourse->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Course: <strong class="text-success">( {{$showcourse->name}}) </strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="." method="post" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name">Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter name" value="{{ $showcourse->name }}">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-lg-6">
                        <label for="model">Amount</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid  @enderror" placeholder="Enter Amount" value="{{ $showcourse->amount }}">
                                @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-lg-6">
                        <label for="type">Description</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="description" name="description" class="form-control @error('description') is-invalid  @enderror" placeholder="Enter Description" value="{{ $showcourse->description }}">
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                      
                    </div>
                  
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">update changes</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>