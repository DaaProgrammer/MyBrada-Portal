  <div class="modal fade" id="assignProfessional" tabindex="-1" role="dialog" aria-labelledby="AssignProfessional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-primary text-gradient">Assign a Professional</h3>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left" id="assignProfessionalForm">
                <label>Assign to a Professional</label>
                <div class="input-group mb-3">
                  <div class="btn-group dropup">
                    <button type="button" class="btn bg-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
                      Choose Professional
                    </button>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                      <?php foreach ($professionals['professionals'] as $professional): ?>
                        <?php if ($professional->status === 'active'): ?>
                          <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;" data-id="<?= htmlspecialchars($professional->id) ?>" onclick="setProfessionalDetails(this.dataset.id, '<?= htmlspecialchars($professional->first_name) ?>', '<?= htmlspecialchars($professional->last_name) ?>', '<?= htmlspecialchars($professional->email_address) ?>')">
                              <?= htmlspecialchars($professional->first_name) ?> <?= htmlspecialchars($professional->last_name) ?> - <?= htmlspecialchars($professional->email_address) ?>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                 <h6 class="mb-0" id="chosen_professional">
                  <?php
                    $activeProfessional = null;
                    if (!empty($professionals['professionals'])) {
                      foreach ($professionals['professionals'] as $professional) {
                        if ($professional->status === 'active') {
                          $activeProfessional = $professional;
                          break;
                        }
                      }
                    }
                    echo $activeProfessional
                      ? htmlspecialchars($activeProfessional->first_name).' '.htmlspecialchars($activeProfessional->last_name).' : '.htmlspecialchars($activeProfessional->email_address)
                      : 'Choose professional';
                  ?>
                  </h6>
                <input type="hidden" id="support_id" value="" name="support_id">
                <input type="hidden" id="professional_id" value="<?= $activeProfessional ? htmlspecialchars($activeProfessional->id) : '' ?>" name="professional_id">

                <div class="text-center">
                  <button type="button" class="btn bg-primary btn-lg btn-rounded w-100 mt-4 mb-0" style="color: #000;" onclick="assignProfessional()">Assign Professional</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>