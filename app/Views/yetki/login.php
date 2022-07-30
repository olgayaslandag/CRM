<?php $this->extend("layouts/auth"); ?>

<?php $this->section("content"); ?>

<?php echo form_open('', ["method" => "post"]); ?>
  <div class="form-group">
    <div class="d-flex justify-content-between">
      <label for="split-login-email">E-Posta Adresi</label>
      <a class="fs--1 text-dark" href="<?php echo base_url(route_to('registerView')); ?>">
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
      <a class="fs--1 text-dark" href="<?php echo base_url(route_to('rememberView')); ?>">
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
    <button class="btn btn-secondary btn-block mt-3" type="submit">Giriş Yap</button>
  </div>
<?php echo form_close(); ?>
          
<?php $this->endSection(); ?>