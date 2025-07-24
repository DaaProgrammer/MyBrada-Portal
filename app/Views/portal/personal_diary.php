      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Personal Diarys</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <?php if (!empty($personalDiary) && is_array($personalDiary)) : ?>
                  <table class="table align-items-center mb-0 datatables">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diary Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Created</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($personalDiary as $entry) : ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="<?= !empty($entry->mybrada_users->profile_image) ? trim($entry->mybrada_users->profile_image, "'") : '../assets/img/default-avatar.png' ?>" class="avatar avatar-sm me-3" alt="user" onerror="this.onerror=null; this.src='../assets/img/team-2.jpg';">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?= esc($entry->mybrada_users->first_name ?? 'Unknown') . ' ' . esc($entry->mybrada_users->last_name ?? '') ?></h6>
                                <p class="text-xs text-secondary mb-0"><?= esc($entry->mybrada_users->email_address ?? '') ?></p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle">
                            <span class="text-secondary text-xs font-weight-bold"><?= esc($entry->title) ?></span>
                          </td>
                          <td class="align-middle">
                            <span class="text-secondary text-xs font-weight-bold"><?= date('d/m/Y', strtotime($entry->date_created)) ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <div class="ms-auto">
                              <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewdiary">
                                <i class="fa fa-eye" style="font-size:25px;color:green"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else : ?>
                  <p>No diary entries found.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?= view('modals/view_diary_modal'); ?>