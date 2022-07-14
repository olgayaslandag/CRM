<?php $this->extend("layouts/auth"); ?>

<?php $this->section("content"); ?>
<div class="row min-vh-100 bg-100">
  <div class="col-6 d-none d-lg-block">
    <div class="bg-holder" style="background-image:url(assets/img/generic/14.jpg);background-position: 50% 20%;">
    </div>
  </div>
  <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
    <div class="row justify-content-center no-gutters">
      <div class="col-lg-9 col-xl-8 col-xxl-6">
        <div class="card">
          <div class="card-header bg-circle-shape text-center p-2"><a class="text-white text-sans-serif font-weight-extra-bold fs-4 z-index-1 position-relative" href="<?php echo base_url(); ?>">TORA</a></div>
          <div class="card-body p-4">
            <?php if(session()->get("message")){ ?>
            <div class="bg-danger text-white p-2 mb-2">
              <?php 
              echo session()->get("message");
              session()->remove("status");
              session()->remove("message");
              ?>
            </div>
            <?php } ?>
            <?php echo form_open('', ["method" => "post"]); ?>
              <div class="form-group">
                <div class="d-flex justify-content-between">
                  <label for="split-login-email">E-Posta Adresi</label>
                  <a class="fs--1" href="<?php echo base_url('kayit'); ?>">
                    Yeni Hesap Oluştur
                  </a>
                </div>
                <?php echo form_input([
                  "class" => "form-control",
                  "id" => "split-login-email",
                  "type" => "email",
                  "name" => "eposta",

                ]); ?>
                <span class="text-danger"><?php echo isset($validation["eposta"]) ? $validation["eposta"] : null; ?></span>
              </div>
              
              <div class="form-group">
                <div class="d-flex justify-content-between">
                  <label for="split-login-password">Şifre</label>
                  <a class="fs--1" href="<?php echo base_url('sifremi_unuttum'); ?>">
                    Şifremi Unuttum
                  </a>
                </div>
                <?php echo form_input([
                  "class" => "form-control",
                  "id" => "split-login-password",
                  "type" => "password",
                  "name" => "sifre",
                  "required" => true
                ]); ?>
                <span class="text-danger"><?php echo isset($validation["sifre"]) ? $validation["sifre"] : null; ?></span>
              </div>

              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="split-checkbox" />
                <label class="custom-control-label" for="split-checkbox">Beni Hatırla</label>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block mt-3" type="submit">Giriş Yap</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>