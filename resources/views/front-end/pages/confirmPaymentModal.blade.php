<!-- Modal -->
<div class="modal fade" id="confirm-payment-{{ $coursesubscribed->course_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Payment for course <span style="color:rgb(248, 172, 7)">({{ $coursesubscribed->course->name}}) </span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">
              <form>
                  <div>
                    <label for="amount"> Transaction Code</label>
                      <input class="form-control" id="transaction_code" type="text" name="transaction_code" placeholder="Transaction Code" />

                  </div>
                  <div>
                      <label for="amount"> Amount</label>
                    <input class="form-control" id="amount" type="text" name="amount" placeholder="Transaction Code" value=" {{ $coursesubscribed->course->amount}}" readonly/>
                </div>
                  <div>
                      <label for="phone"> Phonenumber <small style="color:rgb(214, 158, 5)"> * that made payment</small></label>
                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Phone number that made payment" value="{{ Auth::user()->phone }}" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" style="" class="btn btn-success">Confirm</button>
                  </div>
               
              </form>

          </div>
        </div>
      
      </div>
    </div>
  </div>