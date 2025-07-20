  <!-- Create Notice Modal -->
  <div class="modal fade" id="addNotice" tabindex="-1" role="dialog" aria-labelledby="AddNotice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add Notice</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Notice Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Notice Title" aria-label="noticetitle" aria-describedby="noticetitle-addon">
                </div>
                <label>Notice Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Notice Contents" aria-label="noticecontents" aria-describedby="noticecontents-addon"></textarea>
                </div>
                <label>Choose Responder</label>
                <div class="input-group mb-3">
                  <div class="btn-group dropup">
                    <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Responder
                    </button>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">John Wick - john@doe.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Rambo - rambo@steve.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Van Dam - van@dam.co.za</a></li>
                    </ul>
                  </div>
                </div>
                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="post_status" onclick="">
                  <label for="isDraft">Save as draft? <span id="post_status_error"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;">Upload Notice</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Edit Notice Modal -->
  <div class="modal fade" id="editNotice" tabindex="-1" role="dialog" aria-labelledby="EditNotice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Edit Notice</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Notice Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Notice Title" aria-label="noticetitle" aria-describedby="noticetitle-addon">
                </div>
                <label>Notice Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Notice Contents" aria-label="noticecontents" aria-describedby="noticecontents-addon"></textarea>
                </div>
                <label>Choose Responder</label>
                <div class="input-group mb-3">
                  <div class="btn-group dropup">
                    <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Responder
                    </button>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">John Wick - john@doe.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Rambo - rambo@steve.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Van Dam - van@dam.co.za</a></li>
                    </ul>
                  </div>
                </div>
                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="post_status" onclick="">
                  <label for="isDraft">Save as draft? <span id="post_status_error"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;">Upload Notice</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
