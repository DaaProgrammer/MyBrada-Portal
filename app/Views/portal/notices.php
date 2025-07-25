      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Notices</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addNotice">Add a Notice</a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <?php
                // Assuming $notices is passed from your controller/parent script
                // If not defined, initialize as empty array to prevent errors
                if (!isset($notices)) {
                    $notices = [];
                }

                ?>

                <table class="table align-items-center mb-0 datatables">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Notice Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($notices) && is_array($notices)) : ?>
                      <?php foreach ($notices as $notice) : ?>
                        <?php
                          $user = $notice->mybrada_users ?? null;
                          $img = !empty($user?->profile_image) ? htmlspecialchars(trim($user->profile_image, "'")) : '../assets/img/team-2.jpg';
                          $name = $user ? htmlspecialchars($user->first_name . ' ' . $user->last_name) : 'Unknown';
                          $email = $user?->email_address ?? 'N/A';
                          $status = $user?->status ?? 'unknown';
                          $notestatus = $notice?->status ?? 'draft';
                          $noticeTitle = htmlspecialchars($notice->notice_title ?? 'Untitled');
                          $createdAt = !empty($notice->created_at) ? date('Y-m-d', strtotime($notice->created_at)) : 'N/A';
                          $noticeId = (int)($notice->id ?? 0);
                        ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="<?= $img ?>" class="avatar avatar-sm me-3" alt="user avatar" 
                                                  onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?= $name ?></h6>
                                <p class="text-xs text-secondary mb-0"><?= htmlspecialchars($email) ?></p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $noticeTitle ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $createdAt ?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm <?= $notestatus === 'draft' ? 'bg-gradient-warning' : 'bg-gradient-success' ?>">
                              <?= ucfirst(htmlspecialchars($notestatus)) ?>
                            </span>
                          </td>
                          <td class="align-middle text-center">
                            <div class="ms-auto">
                              <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editNotice">
                                <i class="fa fa-pencil" style="font-size:25px;color:green" title="Edit Notice"></i>
                              </a>
                              <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deleteNotice(<?= $noticeId ?>)" title="Delete Notice">
                                <i class="fa fa-trash-o" style="font-size:25px;color:red"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="5" class="text-center text-muted">No notices available.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>

      <?= view('modals/add_edit_notice_modal') ?>