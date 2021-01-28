<form action="{{env('APP_URL')}}/admin/exams" method="post">
  @csrf
  <div class="modal" id="new_exam_modal" tabindex="-1" role="dialog" aria-labelledby="new_exam_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="new_exam_modal_label">Create new exam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
          </div>
          <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" placeholder="Start Time" name="start_time">
          </div>
          <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" placeholder="End Time" name="end_time">
          </div>
          <div class="form-group">
            <label for="time_limit">Time Limit</label>
            <input type="time" class="form-control" id="time_limit" placeholder="Time Limit" value="00:00" name="time_limit">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_negative_marking" name="is_negative_marking">
            <label class="form-check-label" for="is_negative_marking">
              Negative Marking
            </label>
          </div>
          <div class="form-group">
            <label for="negative_marks">Negative Marks</label>
            <input type="number" class="form-control" id="negative_marks" placeholder="Negative Marks" value="0" name="negative_marks">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
  </div>
</form>
