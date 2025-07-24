      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Professional Support</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
            
                <?php if (!empty($professionalSupport['professionalSupport'])): ?>
                  <table class="table align-items-center mb-0 datatables">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Professional Fullname</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Professional Number</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Professional Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Created</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($professionalSupport['professionalSupport'] as $item): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="<?= !empty($item->mybrada_users->profile_image) ? $item->mybrada_users->profile_image : '../assets/img/default-avatar.png' ?>" class="avatar avatar-sm me-3" alt="user-img" onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">
                                  <?= $item->mybrada_users->first_name . ' ' . $item->mybrada_users->last_name ?>
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                  <?= $item->mybrada_users->email_address ?>
                                </p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= $item->professional_name ?: 'N/A' ?>
                            </span>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= $item->professional_number ?: 'N/A' ?>
                            </span>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= $item->professional_email ?: 'N/A' ?>
                            </span>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= date('d/m/Y', strtotime($item->created_at)) ?>
                            </span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php
                              $statusClass = strtolower(trim($item->status)) === 'assigned' ? 'bg-gradient-success' : 'bg-gradient-warning';
                              $statusLabel = ucfirst(trim($item->status));
                            ?>
                            <span class="badge badge-sm <?= $statusClass ?>"><?= $statusLabel ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <div class="ms-auto">
                              <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignProfessional">
                                <i class="fa fa-pencil" style="font-size:25px;color:green"></i>
                              </a>
                              <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deleteProfessionalSupport(<?= $item->id ?>)">
                                <i class="fa fa-trash-o" style="font-size:25px;color:red"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else: ?>
                  <p>No professional support records available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>List of Professionals</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <?php if (!empty($professionals['professionals'])): ?>
                  <table class="table align-items-center mb-0 datatables">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Professional Number</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Created</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($professionals['professionals'] as $item): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="<?= !empty($item->profile_image) ? $item->profile_image : '../assets/img/default-avatar.png' ?>" class="avatar avatar-sm me-3" alt="user-img" onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">
                                  <?= $item->first_name . ' ' . $item->last_name ?>
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                  <?= $item->email_address ?>
                                </p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= $item->phone_number ?: 'N/A' ?>
                            </span>
                          </td>
                          <td class="align-middle text-left">
                            <span class="text-secondary text-xs font-weight-bold">
                              <?= date('d/m/Y', strtotime($item->created_at)) ?>
                            </span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php
                              $statusClass = strtolower(trim($item->status)) === 'assigned' ? 'bg-gradient-success' : 'bg-gradient-warning';
                              $statusLabel = ucfirst(trim($item->status));
                            ?>
                            <span class="badge badge-sm <?= $statusClass ?>"><?= $statusLabel ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <div class="ms-auto">
                              <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignProfessional">
                                <i class="fa fa-pencil" style="font-size:25px;color:green"></i>
                              </a>
                              <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deleteProfessional(<?= $item->id ?>)">
                                <i class="fa fa-trash-o" style="font-size:25px;color:red"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else: ?>
                  <p>No professionals records available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?= view('modals/assign_a_professional_modal'); ?>