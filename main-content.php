  <main>

    <!-- ===== PAGE HEADING ===== -->
    <section class="dashboard-heading py-4 text-white">
      <div class="container">
        <h1 class="h3 mb-1">Room Monitoring Dashboard</h1>
        <p class="mb-0">Shows if a classroom light was left on with nobody inside</p>
      </div>
    </section>

    <div class="container py-4">

      <!-- ===== SUMMARY NUMBERS ===== -->
      <div class="row g-3 mb-4 text-center">
        <div class="col-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="h4 mb-0">5</h2>
              <p class="text-muted small mb-0">Rooms Monitored</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="h4 mb-0 text-success">2</h2>
              <p class="text-muted small mb-0">Lights Off / OK</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="h4 mb-0 text-danger">2</h2>
              <p class="text-muted small mb-0">Light Left On</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="h4 mb-0 text-warning">1</h2>
              <p class="text-muted small mb-0">Sensor Offline</p>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== ROOM STATUS TABLE ===== -->
      <section id="rooms" class="mb-4">
        <h2 class="h5 mb-3">Room Status</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-hover bg-white align-middle">
            <thead class="table-light">
              <tr>
                <th scope="col">Room</th>
                <th scope="col">Light</th>
                <th scope="col">Motion</th>
                <th scope="col">Status</th>
                <th scope="col">Last Update</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>TSB 502</td>
                <td>On</td>
                <td>None Detected</td>
                <td><span class="badge bg-danger">Light Left On</span></td>
                <td>2 mins ago</td>
              </tr>
              <tr>
                <td>GZB 303</td>
                <td>Off</td>
                <td>None Detected</td>
                <td><span class="badge bg-success">OK</span></td>
                <td>5 mins ago</td>
              </tr>
              <tr>
                <td>Computer Lab 1</td>
                <td>On</td>
                <td>Detected</td>
                <td><span class="badge bg-success">OK</span></td>
                <td>1 min ago</td>
              </tr>
              <tr>
                <td>ABB 102</td>
                <td>On</td>
                <td>None Detected</td>
                <td><span class="badge bg-danger">Light Left On</span></td>
                <td>8 mins ago</td>
              </tr>
              <tr>
                <td>Faculty Room</td>
                <td>--</td>
                <td>--</td>
                <td><span class="badge bg-warning text-dark">Sensor Offline</span></td>
                <td>1 hour ago</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- ===== ALERTS ===== -->
      <section id="alerts">
        <h2 class="h5 mb-3">Recent Alerts</h2>
        <ul class="list-group">
          <li class="list-group-item">
            <strong>TSB 502</strong> - light left on, room empty
            <br><small class="text-muted">2 minutes ago</small>
          </li>
          <li class="list-group-item">
            <strong>GZB 303</strong> - light left on, room empty
            <br><small class="text-muted">8 minutes ago</small>
          </li>
          <li class="list-group-item">
            <strong>Faculty Room</strong> - sensor not responding
            <br><small class="text-muted">1 hour ago</small>
          </li>
        </ul>
      </section>

    </div>
  </main>
