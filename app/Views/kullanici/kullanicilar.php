<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Kullanici.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Kullanici.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Kullanici.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>

        <?php echo form_open("", ["method" => "get"]); ?>
        <ul class="list-inline">            
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "text",
                    "name" => "adsoyad",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Kullanici.table_adsoyad"),
                    "value" => isset($filter->adsoyad) ? $filter->adsoyad : null
                ]); ?>
            </li>
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "email",
                    "name" => "eposta",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Kullanici.table_eposta"),
                    "value" => isset($filter->eposta) ? $filter->eposta : null
                ]); ?>
            </li>
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "number",
                    "name" => "telefon",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Kullanici.table_tel"),
                    "value" => isset($filter->telefon) ? $filter->telefon : null
                ]); ?>
            </li>

            <li class="list-inline-item">
                <select class="form-control form-control-sm mb-2" name="rank">
                    <option value=""><?php echo lang("Kullanici.table_rank"); ?></option>
                    <?php foreach($yetkiler as $yetki){
                        $selected = isset($filter->rank) && $filter->rank == $yetki->id ? "selected" : null; 
                        echo "<option value='".$yetki->id."' ".$selected.">".$yetki->tanim."</option>";
                    }?>
                </select>
            </li>
            <li class="list-inline-item">
                <?php echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary btn-sm", 
                    "content" => lang("Kullanici.filter_button_text")
                ]); ?>
            </li>
        </ul>
        <?php echo form_close(); ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo lang("Kullanici.table_adsoyad"); ?></th>
                        <th><?php echo lang("Kullanici.table_eposta"); ?></th>
                        <th><?php echo lang("Kullanici.table_tel"); ?></th>
                        <th><?php echo lang("Kullanici.table_rank"); ?></th>
                        <th><?php echo lang("Kullanici.table_aktif"); ?></th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kullanicilar as $kullanici){?>
                    <tr>
                        <td><?php echo $kullanici->adsoyad; ?></td>
                        <td><?php echo $kullanici->eposta; ?></td>
                        <td><?php echo $kullanici->telefon; ?></td>
                        <td><?php echo $kullanici->tanim; ?></td>
                        <td><?php echo $kullanici->aktif ? lang("Kullanici.active_text") : lang("Kullanici.passive_text"); ?></td>
                        <td>
                            <button id="<?php echo $kullanici->id; ?>" class="btn btn-primary btn-sm detail" data-toggle="modal" data-target="#detay">
                                <i class="fa fa-info"></i>
                            </button>
                            <a href="<?php echo base_url("kullanici/sil/". $kullanici->id); ?>" class="btn btn-danger btn-sm sil">
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
<?php $this->endSection(); ?>


<?php $this->section("modals"); ?>
    <div class="modal modal-fixed-right fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="detay" aria-hidden="true">
      <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content border-0 min-vh-100">
          <div class="modal-header">
            <h5 class="modal-title" id="detay"><?php echo lang("Kullanici.detail_title"); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body p-0"></div>
        </div>
      </div>
    </div>




    <div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content border-0 min-vh-100">
          <div class="modal-header">
            <h5 class="modal-title" id="yeniEkle"><?php echo lang("Kullanici.new_form_title"); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body py-5 text-center">
            <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
            <?php 
                echo form_open(base_url("kullanici/ekle"), ["method" => "post", "autocomplete" => "off"]);
                echo form_input([
                    "type" => "hidden", 
                    "name" => "ekleyen_id", 
                    "value" => session()->get("id")
                ]);
            
                echo form_input([
                    "type" => "text",
                    "name" => "adsoyad",
                    "class" => "form-control mb-3",
                    "placeholder" => lang("Kullanici.table_adsoyad")
                ]);

                echo form_input([
                    "type" => "email",
                    "name" => "eposta",
                    "class" => "form-control mb-3",
                    "placeholder" => lang("Kullanici.table_eposta")
                ]);

                echo form_input([
                    "type" => "text",
                    "name" => "telefon",
                    "class" => "form-control mb-3",
                    "placeholder" => lang("Kullanici.table_tel")
                ]);
            ?>
                <select class="form-control mb-3" name="rutbe_id">
                    <option value=""><?php echo lang("Kullanici.table_rank"); ?></option>
                    <?php foreach($yetkiler as $yetki){
                        echo "<option value='".$yetki->id."'>".$yetki->tanim."</option>";
                    }?>
                </select>
            <?php


                echo form_input([
                    "type" => "text",
                    "name" => "sifre",
                    "class" => "form-control mb-3",
                    "placeholder" => lang("Kullanici.table_pass")
                ]);


                echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary form-control", 
                    "content" => lang("Kullanici.add_button")
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






    /*
    * --------------------------------------------------------------------
    * Get Detail Method
    * --------------------------------------------------------------------
    */
    $(".detail").on("click", function(){
        var id = $(this).attr("id");
        var url = <?php echo json_encode(site_url("kullanici/getir/")); ?>;

        $.get( url + id, function( data ) {
            console.log(data)
            var content = "";
            if(data.status){
                content = '<div class="table-responsive">\
                    <table class="table table-bordered">\
                        <thead>\
                            <tr>\
                                <th><?php echo lang("Kullanici.table_adsoyad"); ?></th>\
                                <td>' + data.result.adsoyad + '</td>\
                            </tr>\
                            <tr>\
                                <th><?php echo lang("Kullanici.table_tel"); ?></th>\
                                <td>' + data.result.telefon + '</td>\
                            </tr>\
                            <tr>\
                                <th><?php echo lang("Kullanici.table_eposta"); ?></th>\
                                <td>' + data.result.eposta + '</td>\
                            </tr>\
                            <tr>\
                                <th><?php echo lang("Kullanici.table_aktif"); ?></th>\
                                <td>' + data.result.aktif + '</td>\
                            </tr>\
                            <tr>\
                                <th><?php echo lang("Kullanici.table_yerlesim"); ?></th>\
                                <td>' + data.result.tanim + '</td>\
                            </tr>\
                        </thead>\
                    </table>\
                </div> <div class="text-center">' + data.result.link + '</div>'
            }
            $("#detay .modal-body").html(content)
        });
    });



});
</script>
<?php $this->endSection(); ?>