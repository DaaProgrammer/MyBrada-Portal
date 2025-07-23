      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Responders</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addResponder">Add a Responder</a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 datatables">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Responders</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($allResponders['responders'] as $responder): ?>
                      <?php
                        // Clean image URL
                        $imgUrl = trim(str_replace(["'::character varying", "'"], '', $responder->profile_image));
                        $status = !empty($responder->mybrada_dispatcher[0]->status) ? strtolower($responder->mybrada_dispatcher[0]->status) : 'unknown';
                        $statusClass = $status === 'active' ? 'bg-gradient-success' : ($status === 'inactive' ? 'bg-gradient-secondary' : 'bg-gradient-warning');
                        $statusLabel = ucfirst($status);
                        $dateCreated = date('d/m/Y', strtotime($responder->date_created));
                      ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="<?= $imgUrl ?>"
                                  onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';"
                                  class="avatar avatar-sm me-3"
                                  alt="responder">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?= htmlspecialchars($responder->first_name . ' ' . $responder->last_name) ?></h6>
                              <p class="text-xs text-secondary mb-0"><?= htmlspecialchars($responder->email_address) ?></p>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= htmlspecialchars($responder->phone_number ?: 'N/A') ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= $dateCreated ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm <?= $statusClass ?>"><?= $statusLabel ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <div class="ms-auto">
                            <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editResponder"><i class="fa fa-pencil" style="font-size:25px;color:green"></i></a>
                            <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deleteResponder(<?= $responder->id ?>)"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>


              </div>
            </div>
          </div>
        </div>
<?= view('modals/add_edit_responder_modal') ?>
