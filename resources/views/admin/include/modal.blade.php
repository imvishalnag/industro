{{-- Reject Modal --}}
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="reject_model">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">Reject Reason</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden"  id="reject_id">
          <input type="hidden" id="reject_modal_action_id">
            <div class="col-md-12 col-sm-12 col-xs-12 mb-3" >
                <label for="remarks_model">Enter Reject Remarks</label>
                <textarea  rows="5" class="form-control" id="reject_remarks_model" placeholder="e.g. Due to some unavoidable circumstances we can't proceed your withdraw request. We are really sorry for that."></textarea>
                <span id="account_error"></span><br><br>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="hideModelReject()">Submit</button>
        </div>
      </div>
    </div>
</div>