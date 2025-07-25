  <!-- Update Alert Modal -->
  <div class="modal fade" id="updateAlert" tabindex="-1" role="dialog" aria-labelledby="UpdateAlert" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Emergency Alert</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="updateAlertForm">
                <label>Controller Note</label>
                <div class="input-group mb-3">
                  <textarea rows="5" class="form-control" placeholder="Post Contents" aria-label="postcontents" aria-describedby="postcontents-addon" name="controller_notes" id="controller_notes"></textarea>
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

                  <input type="hidden" name="first_name" value="<?php
                      echo $defaultResponder
                        ? htmlspecialchars($defaultResponder->first_name)
                        : '';
                  ?>" id="first_nameResponder">

                  <input type="hidden" name="last_name" value="<?php
                      echo $defaultResponder
                        ? htmlspecialchars($defaultResponder->last_name)
                        : '';
                  ?>" id="last_nameResponder">

                  <input type="hidden" name="email_address" value="<?php
                      echo $defaultResponder
                        ? htmlspecialchars($defaultResponder->email_address)
                        : '';
                  ?>" id="emailResponder">

                  <input type="hidden" name="alert_id" value="" id="alert_id_responder">

                </div>

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;" onclick="assignResponder()">Assign Responder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>