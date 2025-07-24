      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total <br/>Users</p>
                    <h5 class="font-weight-bolder">
                      <?= $dashboardStats['users_counter']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape text-center">
                    <img src="../assets/img/users.png" alt="MyBrada" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total <br/>Responders</p>
                    <h5 class="font-weight-bolder">
                      <?= $dashboardStats['responders_counter']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape text-center">
                    <img src="../assets/img/dispatcher.png" alt="MyBrada" class="img-fluid" style="width: 250px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Open <br/>Alerts</p>
                    <h5 class="font-weight-bolder">
                      <?= $dashboardStats['open_alerts_counter']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape text-center">
                    <img src="../assets/img/alerts.png" alt="MyBrada" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Support <br/>Requests</p>
                    <h5 class="font-weight-bolder">
                      <?= $dashboardStats['unassigned_support_requests_counter']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape text-center">
                    <img src="../assets/img/professional_support.png" alt="MyBrada" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>All Users</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">

              <div class="table-responsive p-0">
                <table id="usersTable" class="table align-items-center mb-0 datatables">
                  <thead>
                    <tr>
                      <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Relationship Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Background of Abuse</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Siblings</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Educational Level</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Physical Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($allUsers['users'] as $user): ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="<?= $user->profile_image ?: '../assets/img/team-2.jpg' ?>" onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';"  class="avatar avatar-sm me-3" alt="user">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></h6>
                              <p class="text-xs text-secondary mb-0"><?= htmlspecialchars($user->email_address) ?></p>
                            </div>
                          </div>
                        </td>
                        <td><p class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->user_role=='dispatcher' ? 'Responder' : $user->user_role ) ?></p></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->id_number ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->phone_number ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->relationship_status ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->background_of_abuse ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->number_of_siblings ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= htmlspecialchars($user->education_level ?: 'N/A') ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center" style="max-width: 150px; word-break: break-word; white-space: normal;">
                          <?= htmlspecialchars($user->physical_address ?: 'N/A') ?>
                        </td>
                        <td class="text-secondary text-xs font-weight-bold text-center"><?= date('Y-m-d', strtotime($user->date_created)) ?></td>
                        <td class="text-secondary text-xs font-weight-bold text-center text-sm">
                          <?php if (!empty($user->status) && $user->status === 'verified'): ?>
                            <span class="badge badge-sm bg-gradient-success">Verified</span>
                          <?php elseif (!empty($user->status) && $user->status === 'pending'): ?>
                            <span class="badge badge-sm bg-gradient-warning"><?php echo $user->status;?></span>
                          <?php else: ?>
                            <span class="badge badge-sm bg-gradient-danger">Blocked</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-center text-sm">
                          <?php if (!empty($user->status) && $user->status === 'blocked'): ?>
                            <a class="btn btn-link text-white mb-0" href="javascript:;" onClick="unblockUser(<?= $user->id ?>)">
                              <span class="badge badge-sm bg-gradient-success">Unblock User</span>
                            </a>
                          <?php else: ?>
                            <a class="btn btn-link text-white mb-0" href="javascript:;" onClick="blockUser(<?= $user->id ?>)">
                              <span class="badge badge-sm bg-gradient-danger">Block User</span>
                            </a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
             </div>
          </div>
        </div>
      </div>

      