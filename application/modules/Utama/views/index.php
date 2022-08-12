<?php $this->load->view('header') ?>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-15 mb-6 mb-md-0 col-md-8 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="<?php echo base_url('Utama') ?>" class="js-logo-clone">Paud dan Taman Kanak Kanak Kosgoro </a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li class="">
                  <a href="<?php echo base_url('Auth_Petugas') ?>" class="user-profile" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Login
                  </a>
                </li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
      </nav>
    </header>

    <div class="site-blocks-cover" style="background-color:#6495ED"; background-size: auto data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center">
          <div class="">
            <h1 class="mb-">Paud dan Taman Kanak Kanak Kosgoro</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Daftarkan Anak anda Disini!!</p>
              <p>
                <a href="<?php echo base_url('dashboard_rakyat') ?>" class="btn btn-sm btn-info">Daftar</a><br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Respon</h2>
              <p>Respon Cepat Terhadap Masalah Yang ada.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Tanggapan</h2>
              <p>Tanggapan Mudah diterima oleh Masyarakat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </body>

  <?php $this->load->view('js') ?>
</html>