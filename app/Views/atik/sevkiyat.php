<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Sevkiyat.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Sevkiyat.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Sevkiyat.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo lang("Sevkiyat.table_code"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_date"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_quantity"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_birim"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_plate_no"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_bertaraf"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_motat"); ?></th>
                        <th><?php echo lang("Sevkiyat.table_km"); ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sevkiyatlar as $sevkiyat){?>
                        <tr>
                            <td><?php echo $sevkiyat->kisa; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($sevkiyat->tarih)); ?></td>
                            <td><?php echo $sevkiyat->miktar; ?></td>
                            <td><?php echo $sevkiyat->birim; ?></td>
                            <td><?php echo $sevkiyat->plaka; ?></td>
                            <td><?php echo $sevkiyat->bertaraf; ?></td>
                            <td><?php echo $sevkiyat->motat; ?></td>
                            <td><?php echo $sevkiyat->km; ?></td>
                            <td>
                            <a href="<?php echo base_url("/atik_kodlar/sevkiyat/sil/". $sevkiyat->id); ?>" class="btn btn-danger btn-sm sil">
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
        <h5 class="modal-title" id="yeniEkle"><?php echo lang("Sevkiyat.new_form_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body py-5 text-center">
        <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
        <?php 
            echo form_open(base_url("atik_kodlar/sevkiyat"), ["method" => "post", "autocomplete" => "off"]);
            echo form_input([
                "type" => "hidden", 
                "name" => "user_id", 
                "value" => session()->get("id")
            ]);
        ?>
            <select class="form-control mb-3 select2" name="kod">
                <option value="">Atık Kodu</option>
                <?php foreach($kodlar as $k){
                    echo "<option value='".$k->id."'>".$k->kisa."</option>";
                }?>
            </select>
        <?php

            echo form_input([
                "type" => "date", 
                "name" => "tarih", 
                "class" => "form-control mb-3 date", 
                "placeholder" => lang("Sevkiyat.table_date")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "miktar", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_quantity")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "birim", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_birim")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "plaka", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_plate_no")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "bertaraf", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_bertaraf")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "motat", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_motat")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "km", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Sevkiyat.table_km")
            ]);



            echo form_button([
                "type" => "submit", 
                "class" => "btn btn-primary form-control", 
                "content" => lang("Sevkiyat.add_button")
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