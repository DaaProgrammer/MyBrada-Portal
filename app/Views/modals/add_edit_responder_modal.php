  <!-- Edit Responder Modal -->
  <div class="modal fade" id="editResponder" tabindex="-1" role="dialog" aria-labelledby="EditResponder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Edit Responder</h3>
                <p class="mb-0">Edit the Responder details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="editResponderForm">
                <label>First Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon" name="first_name">
                </div>
                <label>Last Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Last Name" aria-label="Name" aria-describedby="name-addon" name="last_name">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" id="responder_email" readonly>
                </div>
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="phone-addon" name="phone">
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="edit_responder_status" onchange="changeDispatcherStatus(this.checked)" name="responder_status">
                  <label class="mb-0">Responder status: <span id="responderStatus" class="text text-warning responderStatus">Inactive</span></label>
                </div>
                <input type="hidden" id="responder_id_input" name="responder_id_input">
                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" onclick="editResponder()">Update Responder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Responder Modal -->
  <div class="modal fade" id="addResponder" tabindex="-1" role="dialog" aria-labelledby="AddResponder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add a Responder</h3>
                <p class="mb-0">Add the Responder details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="addResponderForm">
                <label>First Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon" name="name">
                </div>
                <label>Last Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Last Name" aria-label="Name" aria-describedby="name-addon" name="surname">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
                </div>
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="phone-addon" name="phone">
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="add_responder_status" onchange="changeDispatcherStatus(this.checked)">
                  <label class="mb-0">Responder status: <span id="responderStatus" class="text text-warning responderStatus">Inactive</span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" onclick="addResponder()">Add Responder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>