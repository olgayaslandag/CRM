<?php $this->extend("layouts/auth"); ?>

<?php $this->section("content"); ?>

<?php echo form_open(site_url(route_to("rememberAction")), ["method" => "post", "autocomplete" => "off"]); ?>

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
    <button class="btn btn-secondary btn-block mt-3" type="submit"><?php echo lang('Yetki.rememberButton'); ?></button>
  </div>
<?php echo form_close(); ?>
<?php $this->endSection(); ?>