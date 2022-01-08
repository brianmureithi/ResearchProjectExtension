<div class="modal fade" id="edit-faq-{{ $faq->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Faq: <strong class="text-success">(
                        {{ $faq->id }}) </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{ route('update-faq-route', $faq->id) }}" enctype="multipart/form-data"
                    autocomplete="off">
                    @method('PUT')
                    @csrf

                    <label for="question">Question</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="question" name="question" value="{{ $faq->question }}"
                                class="form-control" placeholder="Enter question">
                        </div>
                    </div>
                    <label for="answer">Answer</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="answer" name="answer" class="form-control"
                                value="{{ $faq->answer }}" placeholder="Enter answer">
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Edit F.A.Q</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
