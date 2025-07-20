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
              <form role="form text-left">
                <label>First Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                </div>
                <label>Last Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Last Name" aria-label="Name" aria-describedby="name-addon">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                </div>
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="phone" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="dispatcher_status" onclick="changeDispatcherstatus(this.checked)">
                  <label for="isDraft">Responder status: <span id="dispatcher_status_view"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Update</button>
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
                <p class="mb-0">Add a Responder</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>First Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                </div>
                <label>Last Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Last Name" aria-label="Name" aria-describedby="name-addon">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                </div>
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="phone" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>

                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="dispatcher_status" onclick="changeDispatcherstatus(this.checked)">
                  <label for="isDraft">Responder status: <span id="dispatcher_status_view"></span></label>
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>