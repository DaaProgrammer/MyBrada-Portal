

  <!-- Edit Notice Modal -->
  <div class="modal fade" id="editNotice" tabindex="-1" role="dialog" aria-labelledby="EditNotice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Edit Notice</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Notice Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Notice Title" aria-label="noticetitle" aria-describedby="noticetitle-addon">
                </div>
                <label>Notice Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Notice Contents" aria-label="noticecontents" aria-describedby="noticecontents-addon"></textarea>
                </div>
                <label>Choose Responder</label>
                <div class="input-group mb-3">
                  <div class="btn-group dropup">
                    <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Responder
                    </button>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">John Wick - john@doe.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Rambo - rambo@steve.co.za</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Van Dam - van@dam.co.za</a></li>
                    </ul>
                  </div>
                </div>
                <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="post_status_edit" onclick="">
                  <label for="isDraft">Save as draft? <span id="post_status_error"></span></label>
                </div>

                <div class="text-center col-12">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;">Update Notice</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- Create Notice Modal -->
  <div class="modal fade" id="addNotice" tabindex="-1" role="dialog" aria-labelledby="AddNotice" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Add Notice</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="addNoticeForm">
                <label>Notice Title</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Notice Title" aria-label="noticetitle" aria-describedby="noticetitle-addon" name="notice_title">
                </div>
                <label>Notice Contents</label>
                <div class="input-group mb-3">
                  <textarea class="form-control" placeholder="Notice Contents" aria-label="noticecontents" aria-describedby="noticecontents-addon" name="notice_contents"></textarea>
                </div>
                <label>Choose Responder</label>
                <div class="input-group mb-3 d-flex align-items-center">
                  <div class="btn-group dropup d-flex align-items-center">
                    <button type="button" class="btn bg-primary dropdown-toggle me-2 mb-3" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Responder
                    </button><br/>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <?php foreach ($responders['responders'] as $responder): ?>
                        <?php if ($responder->status === 'active' || $responder->status === 'verified'): ?>
                          <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;" data-id="<?= htmlspecialchars($responder->first_name).' '.htmlspecialchars($responder->last_name).' : '.htmlspecialchars($responder->email_address) ?>" onclick="setResponderDetails(this.dataset.id, '<?= htmlspecialchars($responder->id) ?>', '<?= htmlspecialchars($responder->first_name) ?>', '<?= htmlspecialchars($responder->last_name) ?>', '<?= htmlspecialchars($responder->email_address) ?>')">
                              <?= htmlspecialchars($responder->first_name).' '.htmlspecialchars($responder->last_name).' : '.htmlspecialchars($responder->email_address) ?>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>

                </div>
                <div class="col-12 mb-3">
                    <h6 class="mb-0" id="chosen_responder">
                    <?php
                      // Filter responders to only those with status 'active'
                      $activeResponders = array_filter(
                      $responders['responders'],
                      function($responder) {
                        return $responder->status === 'active';
                      }
                      );
                      $defaultResponder = !empty($activeResponders) ? reset($activeResponders) : null;
                      echo $defaultResponder
                      ? htmlspecialchars($defaultResponder->first_name).' '.htmlspecialchars($defaultResponder->last_name).' : '.htmlspecialchars($defaultResponder->email_address)
                      : 'Choose Responder';
                    ?>
                    </h6>
                </div><br/>
                  <input type="hidden" name="responder" value="<?php
                      echo $defaultResponder
                        ? htmlspecialchars($defaultResponder->first_name).' '.htmlspecialchars($defaultResponder->last_name).' : '.htmlspecialchars($defaultResponder->email_address)
                        : '';
                  ?>" id="responder_details">

                  <input type="hidden" name="responder_uid" value="<?php
                      echo $defaultResponder
                        ? htmlspecialchars($defaultResponder->id)
                        : '';
                  ?>" id="responder_uid">
                
                <div class="form-check form-switch d-flex align-items-center col-12">
                  <input type="checkbox" class="form-check-input" id="post_status" name="notice_status" value="published" onchange="setPostStatus()">
                  <label for="notice_status" class="mb-0">Save as draft?
                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;" onclick="addNotice()">Add Notice</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

