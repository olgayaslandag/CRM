<?php $this->extend("layouts/auth"); ?>

<?php $this->section("content"); ?>

<?php echo form_open(site_url(route_to("userAdd")), ["method" => "post", "autocomplete" => "off"]); ?>

  <div class="form-group">
    <div class="d-flex justify-content-between">
      <label for="adsoyad"><?php echo lang('Yetki.nameText'); ?></label>
    </div>
    <?php echo form_input([
      "class" => "form-control",
      "id" => "adsoyad",
      "type" => "text",
      "name" => "adsoyad",

    ]); ?>
    <span class="text-danger"><?php echo isset($validation["adsoyad"]) ? $validation["adsoyad"] : null; ?></span>
  </div>

  <div class="form-group">
    <div class="d-flex justify-content-between">
      <label for="split-login-email"><?php echo lang('Yetki.emailText'); ?></label>
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
      <label for="telefon"><?php echo lang('Yetki.telText'); ?></label>
    </div>
    <?php echo form_input([
      "class" => "form-control",
      "id" => "telefon",
      "type" => "number",
      "name" => "telefon",

    ]); ?>
    <span class="text-danger"><?php echo isset($validation["telefon"]) ? $validation["telefon"] : null; ?></span>
  </div>

  <div class="form-group">
    <div class="d-flex justify-content-between">
      <label for="split-login-password"><?php echo lang('Yetki.passwordText'); ?></label>
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
    <label class="custom-control-label" for="split-checkbox"><?php echo lang('Yetki.kvkkConfirmText'); ?></label>
  </div>
  <div class="form-group">
    <button class="btn btn-secondary btn-block mt-3" type="submit"><?php echo lang('Yetki.registerText'); ?></button>
  </div>
<?php echo form_close(); ?>
<?php $this->endSection(); ?>