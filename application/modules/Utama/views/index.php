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

    <div class="site-blocks-cover" style="background-color:#FFC0CB"; background-size: auto data-aos="fade">
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
              <h2 class="text-uppercase">Visi</h2>
              <p>Unggul dalam Prestasi, Iman dan Takwa, Terampil, Mandiri, dan Berbudaya Pancasila</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Misi</h2>
              <p>1. Meningkatkan keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa, serta berahlak mulia (Cerdas Spiritual/Olah Hati)</p>
<p>2.  Meningkatkan kesadaran dan wawasan dalam bersosialisasi (Cerdas Sosial/Olah Rasa)</p>
<p>3.  Menanamkan kebiasaan berpikir dan berperilaku dengan ceria (Cerdas Intelektual/Olah Pikir)</p>
<p>4.  Meningkatkan kesadaran akan diri dan situasi yang dihadapi (Cerdas Emosional)</p>
<p>5.  Membangun karakter warga sekolah yang peduli lingkungan untuk mewujudkan upaya pelestarian lingkungan (Cerdas Kinestetis)</p>
<p>6.  Menyelenggarakan pembelajaran yang aktif, inovatif, kreatif, efektif, menyenangkan, gembira, dan berbobot dengan tetap menjalankan prokes di masa pandemi.
</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Alamat</h2>
              <p>Gg. Melati Jl. Peltu Sujono No.04, Ciptomulyo, Kec. Sukun, Kota Malang, Jawa Timur 65148</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </body>

  <?php $this->load->view('js') ?>
</html>
