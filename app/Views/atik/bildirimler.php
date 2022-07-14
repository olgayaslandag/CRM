<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("AtikBildirim.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("AtikBildirim.page_desc"); ?></p>
        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("AtikBildirim.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>
        

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo lang("AtikBildirim.table_code"); ?></th>
                        <th><?php echo lang("AtikBildirim.table_desc"); ?></th>
                        <th><?php echo lang("AtikBildirim.table_birim"); ?></th>
                        <th><?php echo lang("AtikBildirim.table_miktar"); ?></th>
                        <th><?php echo lang("AtikBildirim.table_notlar"); ?></th>
                        <th><?php echo lang("AtikBildirim.table_dosya"); ?></th>
                        <th width="20"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($bildirimler as $bildirim){?>
                    <tr>
                        <td><?php echo $bildirim->kod; ?></td>
                        <td><?php echo $bildirim->aciklama; ?></td>
                        <td><?php echo $bildirim->ad; ?></td>
                        <td><?php echo $bildirim->miktar; ?></td>
                        <td><?php echo $bildirim->notlar; ?></td>
                        <td><?php echo $bildirim->dosya; ?></td>
                        <td>
                            <a href="<?php echo base_url("/atik_bildirimleri/sil/". $bildirim->id); ?>" class="btn btn-danger btn-sm sil">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniEkle"><?php echo lang("AtikBildirim.new_form_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body py-5 text-center">
        <img class="img-fluid" src="assets/img/illustrations/modal-right.png" alt="">
        <?php 
            echo form_open(base_url("atik_bildirimleri/ekle"), ["method" => "post", "autocomplete" => "off"]);
            echo form_input([
                "type" => "hidden", 
                "name" => "user_id", 
                "value" => session()->get("id")
            ]);
        ?>
        <select name="kod" class="form-control mb-3">
            <option value=""><?php echo lang("AtikBildirim.table_code"); ?></option>
            <?php foreach($atik_kodlar as $kod){
                echo "<option value='".$kod->id."'>".$kod->kisa."</option>";
            }?>
        </select>
        <?php

            echo form_input([
                "type" => "text", 
                "name" => "aciklama", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("AtikBildirim.table_desc")
            ]);
        ?>
        <select name="birim" class="form-control mb-3">
            <option value=""><?php echo lang("AtikBildirim.table_birim"); ?></option>
            <?php foreach($birimler as $birim){
                echo "<option value='".$birim->id."'>".$birim->ad."</option>";
            }?>
        </select>
        <?php
            echo form_input([
                "type" => "number", 
                "name" => "miktar", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("AtikBildirim.table_miktar")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "notlar", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("AtikBildirim.table_notlar")
            ]);

            echo form_input([
                "type" => "file", 
                "name" => "dosya", 
                "class" => "mb-3", 
                "placeholder" => lang("AtikBildirim.table_dosya")
            ]);

            echo form_button([
                "type" => "submit", 
                "class" => "btn btn-primary form-control", 
                "content" => lang("AtikBildirim.new_form_add")
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
});
</script>
<?php $this->endSection(); ?>