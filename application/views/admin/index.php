              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <?php if ($this->session->userdata('role_id') == 1) : ?>
                      <!-- Earnings (Monthly) Card Example -->
                      <a href="../../kuisioner/admin" target="_blank">
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-m font-weight-bold text-success text-uppercase mb-1">Login Kuisioner</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>

                  <?php endif; ?>

              </div>
              <!-- /.container-fluid -->

              </div>
              <!-- End of Main Content -->