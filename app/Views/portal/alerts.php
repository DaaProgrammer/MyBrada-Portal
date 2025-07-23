      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Alerts</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

<table class="table align-items-center mb-0">
  <thead>
    <tr>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alert Type</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alert ID</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Location</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alert Status</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Responder Details</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Responder Notes</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Controller Notes</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Controller Number</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
      <th class="text-secondary opacity-7"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alerts['alerts'] as $user): ?>
      <?php
        $fullName = $user->first_name . ' ' . $user->last_name;
        $email = htmlspecialchars($user->email_address);
        $userImage = !empty($user->profile_image) ? $user->profile_image : '../assets/img/team-2.jpg';
        $userImageTag = "<img src='{$userImage}' class='avatar avatar-sm me-3' alt='user' onerror=\"this.onerror=null;this.src='../assets/img/team-2.jpg';\">";
      ?>

      <?php foreach ($user->mybrada_alerts as $alert): ?>
        <?php
          $alertType = htmlspecialchars($alert->panic_status ?? 'N/A');
          $alertTypeBadgeClass = $alertType === 'High Alert Assistance' ? 'bg-gradient-danger' : ($alertType === 'Moderate Alert Assistance' ? 'bg-gradient-warning' : 'bg-gradient-secondary');
          $alertId = htmlspecialchars($alert->alert_id ?? 'N/A');
          $alertStatus = strtolower($alert->status);
          $statusBadgeClass = $alertStatus === 'responded' ? 'bg-gradient-success' : ($alertStatus === 'open' ? 'bg-gradient-warning' : 'bg-gradient-secondary');
          $responder = $user->first_name . ' ' . $user->last_name;
          $responderEmail = $user->email_address ?? 'N/A';
          $dispatcherNotes = $alert->dispatcher_notes ?: 'N/A';
          $controllerNotes = $alert->controller_notes ?: 'N/A';
          $controllerNumber = $alert->controller_number ?: 'N/A';
          $createdDate = date('Y-m-d', strtotime($alert->created_at));
          $mapImage = "<img src='../assets/img/5ba2f6_e8d66fae67804f479f92f1089bad4806.png' class='img-fluid avatar avatar-sm me-2'>";
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div><?= $userImageTag ?></div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?= $fullName ?></h6>
                <p class="text-xs text-secondary mb-0"><?= $email ?></p>
              </div>
            </div>
          </td>
          <td class="align-middle text-center text-sm">
            <span class="badge badge-sm <?= $alertTypeBadgeClass ?>"><?= $alertType ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?= $alertId ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">
              <a href="https://www.google.com/maps?q=<?= $alert->lat ?>,<?= $alert->long ?>" target="_blank"><?= $mapImage ?></a>
            </span>
          </td>
          <td class="align-middle text-center text-sm">
            <span class="badge badge-sm <?= $statusBadgeClass ?>"><?= ucfirst($alertStatus) ?></span>
          </td>
          <td class="align-middle text-center">
            <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm"><?= $responder ?></h6>
              <p class="text-xs text-secondary mb-0"><?= $responderEmail ?></p>
            </div>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" style="max-width: 150px; word-break: break-word; white-space: normal;"><?= htmlspecialchars($dispatcherNotes) ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" style="max-width: 150px; word-break: break-word; white-space: normal;"><?= htmlspecialchars($controllerNotes) ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?= htmlspecialchars($controllerNumber) ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?= $createdDate ?></span>
          </td>
          <td class="align-middle text-center">
            <div class="ms-auto">
              <a class="btn btn-link text-success text-gradient mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#updateAlert">
                <i class="fa fa-pencil" style="font-size:25px;color:green"></i>
              </a>
              <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:;" onclick="deleteAlert(<?= $alert->id ?>)">
                <i class="fa fa-trash-o" style="font-size:25px;color:red"></i>
              </a>
            </div>
          </td>
          <td></td>
        </tr>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tbody>
</table>

              </div>
            </div>
          </div>
        </div>
      </div>

      <?= view('modals/update_alert_modal') ?>