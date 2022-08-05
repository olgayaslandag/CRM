<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Ewc.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Ewc.page_desc"); ?></p>
        <button class="btn btn-secondary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Ewc.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>
        <label for="import-file">
            <span class="btn btn-primary btn-sm mb-3">
                <?php echo lang("Ewc.import_button"); ?> 
                <span class="fas fa-chevron-right ml-1 fs--2"></span>
            </span>
        </label>
        <input type="file" name="import-file" id="import-file" class="d-none">
        
        <label for="export-file">
            <span class="btn btn-success btn-sm mb-3">
                <?php echo lang("Ewc.export_button"); ?> 
                <span class="fas fa-chevron-right ml-1 fs--2"></span>
            </span>
        </label>
        <input type="file" name="export-file" id="export-file" class="d-none">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo lang("Ewc.table_code"); ?></th>
                        <th><?php echo lang("Ewc.table_desc"); ?></th>
                        <th><?php echo lang("Ewc.table_short_desc"); ?></th>
                        <th><?php echo lang("Ewc.table_sinif"); ?></th>
                        <th><?php echo lang("Ewc.table_birim"); ?></th>
                        <th width="20"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($ewc_kodlar as $ewc){?>
                    <tr>
                        <td><?php echo $ewc->kod; ?></td>
                        <td><?php echo $ewc->aciklama; ?></td>
                        <td><?php echo $ewc->kisa; ?></td>
                        <td><?php echo $ewc->sinif; ?></td>
                        <td><?php echo $ewc->birim_id; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php $this->endSection(); ?>


<?php $this->section("modals"); ?>
    <div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content border-0 min-vh-100">
          <div class="modal-header">
            <h5 class="modal-title" id="yeniEkle"><?php echo lang("Ewc.new_form_title"); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body py-5 text-center">
            <img class="img-fluid" src="assets/img/illustrations/modal-right.png" alt="">
            <?php 
                echo form_open(base_url("ewc_kodlar/ekle"), ["method" => "post", "autocomplete" => "off"]);
                echo form_input([
                    "type" => "hidden", 
                    "name" => "user_id", 
                    "value" => session()->get("id")
                ]);

                echo form_input([
                    "type" => "text", 
                    "name" => "kod", 
                    "class" => "form-control mb-3", 
                    "placeholder" => lang("Ewc.table_code")
                ]);

                echo form_input([
                    "type" => "text", 
                    "name" => "aciklama", 
                    "class" => "form-control mb-3", 
                    "placeholder" => lang("Ewc.table_desc")
                ]);

                echo form_input([
                    "type" => "text", 
                    "name" => "kisa", 
                    "class" => "form-control mb-3", 
                    "placeholder" => lang("Ewc.table_short_desc")
                ]);
            ?>

            <select name="sinif" class="form-control mb-3">
                <option value=""><?php echo lang("Ewc.table_sinif"); ?></option>
                <?php foreach($siniflar as $sinif){
                    echo "<option>".$sinif."</option>";
                }?>
            </select>

            <select name="birim" class="form-control mb-3">
                <option value=""><?php echo lang("Ewc.table_birim"); ?></option>
                <?php foreach($birimler as $birim){
                    echo "<option value='".$birim->id."'>".$birim->ad."</option>";
                }?>
            </select>
            <?php

                echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary form-control", 
                    "content" => lang("Ewc.new_form_add")
                ]);
                echo form_close(); 
            ?>
          </div>
        </div>
      </div>
    </div>
<?php $this->endSection(); ?>


<?php $this->section("javascript"); ?>
<script>
$(function(){
    $(".sil").on("click", function(){
        var kontrol = confirm("Emin Misin?");
        if(!kontrol){
            return false;
        }
    });

    $("input[name=import-file]").on("change", function(){

        var formData = new FormData();
        formData.append('section', 'general');
        formData.append('action', 'previewImg');
        formData.append('file', $(this)[0].files[0]);

        $.ajax({
            url: '<?php echo site_url("ewc_kodlar/import"); ?>',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(r){
                console.log(r);
            }
        });

    });
});
</script>
<?php $this->endSection(); ?>