<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Evrak_giden.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Evrak_giden.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Evrak_giden.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>


        <?php echo form_open("", ["method" => "get"]); ?>
        <ul class="list-inline">
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "date",
                    "name" => "tarih",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Evrak_giden.table_tarih")
                ]); ?>
            </li>
            <li class="list-inline-item">
                <select class="form-control form-control-sm mb-2" name="belge_tur">
                    <option value=""><?php echo lang("Evrak_giden.table_belgeTur"); ?></option>
                    <?php foreach($evrakTurler as $tur){
                        echo "<option value='".$tur->id."'>".$tur->tanim."</option>";
                    }?>
                </select>
            </li>
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "text",
                    "name" => "alici_firma",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Evrak_giden.table_aliciFirma")
                ]); ?>
            </li>
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "text",
                    "name" => "ilgili_firma",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Evrak_giden.table_ilgiliFirma")
                ]); ?>
            </li>
            <li class="list-inline-item">
                <?php echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary btn-sm", 
                    "content" => lang("Evrak_giden.filter_button_text")
                ]); ?>
            </li>
        </ul>
        <?php echo form_close(); ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo lang("Evrak_giden.table_belgeNo"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_tarih"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_gonderenId"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_aliciFirma"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_belgeTur"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_ilgiliFirma"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_kargoFirma"); ?></th>
                        <th><?php echo lang("Evrak_giden.table_barkodNo"); ?></th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($evraklar as $evrak){?>
                    <tr>
                        <td><?php echo $evrak->belge_no; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($evrak->tarih)); ?></td>
                        <td><?php echo $evrak->adsoyad; ?></td>
                        <td><?php echo $evrak->alici_firma; ?></td>
                        <td><?php echo $evrak->tanim; ?></td>
                        <td><?php echo $evrak->ilgili_firma; ?></td>
                        <td><?php echo $evrak->kargo_firma; ?></td>
                        <td><?php echo $evrak->barkod_no; ?></td>
                        <td>
                            <button id="<?php echo $evrak->evrak_id; ?>" class="btn btn-primary btn-sm detail" data-toggle="modal" data-target="#detay">
                                <i class="fa fa-info"></i>
                            </button>
                            <a href="<?php echo base_url("evrak/gelen_sil/". $evrak->evrak_id); ?>" class="btn btn-danger btn-sm sil">
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




<div class="modal modal-fixed-right fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="detay" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="detay"><?php echo lang("Evrak_giden.detail_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span class="font-weight-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">

      </div>
    </div>
  </div>
</div>

<div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniEkle"><?php echo lang("Evrak_giden.new_form_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span class="font-weight-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body py-5 text-center">
        <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
        <?php 
            echo form_open_multipart(base_url("evrak/giden_ekle"), ["method" => "post", "autocomplete" => "off"]);
            echo form_input([
                "type" => "hidden", 
                "name" => "ekleyen_id", 
                "value" => session()->get("id")
            ]);
            
            echo form_input([
                "type" => "text",
                "name" => "belge_no",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_belgeNo")
            ]);

            echo form_input([
                "type" => "date",
                "name" => "tarih",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_tarih")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "alici_firma",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_aliciFirma")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "alici_kisi",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_aliciKisi")
            ]);
            ?>
            <select class="form-control mb-3" name="evrak_tur_id">
                <option value=""><?php echo lang("Evrak_giden.table_belgeTur"); ?></option>
                <?php foreach($evrakTurler as $tur){
                    echo "<option value='".$tur->id."'>".$tur->tanim."</option>";
                }?>
            </select>
            <?php 
            echo form_input([
                "type" => "text",
                "name" => "ilgili_firma",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_ilgiliFirma")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "kargo_firma",
                "class" => "form-control mb-3",
                "placeholder" => lang("Evrak_giden.table_kargoFirma")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "barkod_no",
                "class" => "form-control mb-3",
                "placeholder" => lang("Evrak_giden.table_barkodNo")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "konu",
                "class" => "form-control mb-3",
                "required" => true,
                "placeholder" => lang("Evrak_giden.table_konu")
            ]);

            echo form_input([
                "type" => "text",
                "name" => "arsiv_klasor_bilgi",
                "class" => "form-control mb-3",
                "placeholder" => lang("Evrak_giden.table_arsivKlasorBilgi")
            ]);

           
            echo form_button([
                "type" => "submit", 
                "class" => "btn btn-primary form-control", 
                "content" => lang("Evrak_giden.add_button")
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
        var kontrol = confirm("<?php echo lang('Evrak_giden.confirm_text'); ?>");
        if(!kontrol){
            return false;
        }
    });




    $(".detail").on("click", function(){
        var id = $(this).attr("id");
        var url = <?php echo json_encode(site_url("/evrak/gelen_detay/")); ?>;

        $.get( url + id, function( data ) {
          data = data.result;
          var content = '\
          <div class="table-responsive">\
            <table class="table">\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_belgeNo"); ?></th>\
                    <td>'+data.belge_no+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_tarih"); ?></th>\
                    <td>'+data.tarih+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_gonderenId"); ?></th>\
                    <td>'+data.adsoyad+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_aliciFirma"); ?></th>\
                    <td>'+data.alici_firma+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_aliciKisi"); ?></th>\
                    <td>'+data.alici_kisi+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_belgeTur"); ?></th>\
                    <td>'+data.tanim+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_ilgiliFirma"); ?></th>\
                    <td>'+data.ilgili_firma+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_kargoFirma"); ?></th>\
                    <td>'+data.kargo_firma+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_barkodNo"); ?></th>\
                    <td>'+data.barkod_no+'</td>\
                </tr>\
                <tr>\
                    <th><?php echo lang("Evrak_giden.table_konu"); ?></th>\
                    <td>'+data.konu+'</td>\
                </tr>\
            </table>\
          </div>';
          $("#detay .modal-body").html(content)
        });
        
    });
});
</script>
<?php $this->endSection(); ?>