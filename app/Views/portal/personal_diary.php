      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Personal Diarys</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">


                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diary Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Created</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">My birthday</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="ms-auto">
                          <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;"><i class="fa fa-eye" style="font-size:25px;color:green" data-bs-toggle="modal" data-bs-target="#viewdiary"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">My birthday</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="ms-auto">
                          <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;"><i class="fa fa-eye" style="font-size:25px;color:green" data-bs-toggle="modal" data-bs-target="#viewdiary"></i></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>

    <?= view('modals/view_diary_modal'); ?>