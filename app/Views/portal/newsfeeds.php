      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Newsfeeds</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addPost">Add a Post</a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0 datatables">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Post Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Post Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($newsfeed['newsfeed'] as $post): ?>
                      <?php
                        $category = ucfirst($post->category);
                        $title = htmlspecialchars($post->post_title);
                        $dateCreated = date('Y-m-d', strtotime($post->date_created));
                        $status = strtolower($post->status);
                        $statusClass = $status === 'published' ? 'bg-gradient-success' : 'bg-gradient-warning';
                        $statusLabel = $status === 'published' ? 'published' : 'draft';
                        $imgPath = !empty($post->image_path) ? $post->image_path : '../assets/img/kal-visuals-square.jpg';
                      ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="<?= $imgPath ?>"
                                  onerror="this.onerror=null; this.src='../assets/img/kal-visuals-square.jpg';"
                                  class="avatar avatar-xl me-2"
                                  alt="category-image">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?= $category ?></h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle">
                          <span class="text-secondary text-xs font-weight-bold"><?= $title ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= $dateCreated ?></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm <?= $statusClass ?>"><?= $statusLabel ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <div class="ms-auto">
                            <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editPost">
                              <i class="fa fa-pencil" style="font-size:25px;color:green"></i>
                            </a>
                            <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deletePost(<?= $post->id ?>)">
                              <i class="fa fa-trash-o" style="font-size:25px;color:red"></i>
                            </a>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>

      
<?= view('modals/add_edit_post_modal') ?>