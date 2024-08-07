<!-- Left side columns -->
<section class="section dashboard">
  <div class="col-lg-12">
    <div class="row">

      <!-- Sales Card -->
      <div class="col-xxl-4 col-xl-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Pengguna <span>| Total</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person-lines-fill"></i>
              </div>
              <div class="ps-3">
                <h6><?php echo $user['hasil']; ?></h6>
                <span class="text-muted small pt-2 ps-1"><a href="<?php echo site_url('user') ?>" class="small-box-footer">Selengkapnya <i class="bi bi-arrow-right-short"></i></a></span>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->

      <!-- Sales Card -->
      <div class="col-xxl-4 col-xl-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Siswa <span>| Total</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6><?php echo $siswa['hasil']; ?></h6>
                <span class="text-muted small pt-2 ps-1"><a href="<?php echo site_url('user') ?>" class="small-box-footer">Selengkapnya <i class="bi bi-arrow-right-short"></i></a></span>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->

      <!-- Sales Card -->
      <div class="col-xxl-4 col-xl-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Guru <span>| Total</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6><?php echo $guru['hasil']; ?></h6>
                <span class="text-muted small pt-2 ps-1"><a href="<?php echo site_url('guru') ?>" class="small-box-footer">Selengkapnya <i class="bi bi-arrow-right-short"></i></a></span>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->

      <!-- Sales Card -->
      <div class="col-xxl-4 col-xl-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Ruangan Kelas <span>| Total</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-door-open"></i>
              </div>
              <div class="ps-3">
                <h6><?php echo $ruangan['hasil']; ?></h6>
                <span class="text-muted small pt-2 ps-1"><a href="<?php echo site_url('ruangan') ?>" class="small-box-footer">Selengkapnya <i class="bi bi-arrow-right-short"></i></a></span>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->



    </div>
  </div><!-- End Left side columns -->
</section>