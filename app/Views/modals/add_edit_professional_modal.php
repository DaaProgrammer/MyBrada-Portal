  <!-- Edit Professional Modal -->
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
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Update Responder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Professional Modal -->
  <div class="modal fade" id="addProfessional" tabindex="-1" role="dialog" aria-labelledby="AddProfessional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add a Professional</h3>
                <p class="mb-0">Add the Professional details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="addProfessionalForm">
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
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email_address">
                </div>
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="phone-addon" name="phone_number">
                </div>
                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="professional_status" onchange="changeProfessionalStatus(this.checked)">
                  <label for="professional_status" class="mb-0">Professional status: <span id="addProfessionalStatus" class="text text-warning">Inactive</span></label>
                </div>
                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" onclick="addProfessional()">Add Professional</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>