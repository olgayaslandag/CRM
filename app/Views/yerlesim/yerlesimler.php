<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Yerlesim.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Yerlesim.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Yerlesim.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo lang("Yerlesim.table_unvan"); ?></th>
                        <th><?php echo lang("Yerlesim.table_tel"); ?></th>
                        <th><?php echo lang("Yerlesim.table_eposta"); ?></th>
                        <th><?php echo lang("Yerlesim.table_vergi_no"); ?></th>
                        <th><?php echo lang("Yerlesim.table_il_id"); ?></th>
                        <th><?php echo lang("Yerlesim.table_yerlesim_tip"); ?></th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($yerlesimler as $yerlesim){?>
                    <tr>
                        <td><?php echo $yerlesim->unvan; ?></td>
                        <td><?php echo $yerlesim->tel; ?></td>
                        <td><?php echo $yerlesim->eposta; ?></td>
                        <td><?php echo $yerlesim->vergi_no; ?></td>
                        <td><?php echo $yerlesim->il_adi; ?></td>
                        <td><?php echo $yerlesim->yerlesim_tip; ?></td>
                        <td>
                            <button id="<?php echo $yerlesim->id; ?>" class="btn btn-primary btn-sm detail" data-toggle="modal" data-target="#detay">
                                <i class="fa fa-info"></i>
                            </button>
                            <a href="<?php echo base_url("yerlesim/sil/". $yerlesim->id); ?>" class="btn btn-danger btn-sm sil">
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
        <h5 class="modal-title" id="detay"><?php echo lang("Yerlesim.detail_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
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
        <h5 class="modal-title" id="yeniEkle"><?php echo lang("Yerlesim.new_form_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body py-5 text-center">
        <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
        <?php 
            echo form_open(base_url("yerlesim/ekle"), ["method" => "post", "autocomplete" => "off"]);
            echo form_input([
                "type" => "hidden", 
                "name" => "ekleyen_id", 
                "value" => session()->get("id")
            ]);
        ?>
        <select class="form-control mb-3" name="yerlesim_tip">
            <option value=""><?php echo lang("Yerlesim.table_yerlesim_tip"); ?></option>
            <?php foreach($yerlesim_tipleri as $tip){
                echo "<option value='".$tip->id."'>".$tip->tanim."</option>";
            } ?>
        </select>
        <?php 
            echo form_input([
                "type" => "text", 
                "name" => "unvan", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_unvan")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "adres", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_adres")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "tel", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_tel")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "faks", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_faks")
            ]);

            echo form_input([
                "type" => "email", 
                "name" => "eposta", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_eposta")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "vergi_daire", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_vergi_daire")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "vergi_no", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_vergi_no")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "il_id", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_il_id")
            ]);

            echo form_input([
                "type" => "text", 
                "name" => "ilce_id", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Yerlesim.table_ilce_id")
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
    /*
    * --------------------------------------------------------------------
    * Delete Method
    * --------------------------------------------------------------------
    */
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
        var url = <?php echo json_encode(site_url("/yerlesim/getir/")); ?>;

        $.get( url + id, function( data ) {
            var content = "";
            if(data.status){
                content = '<div class="table-responsive">\
                <table class="table">\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_unvan"); ?></th>\
                        <td>' + data.result.unvan + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_adres"); ?></th>\
                        <td>' + data.result.adres + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_tel"); ?></th>\
                        <td>' + data.result.tel + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_faks"); ?></th>\
                        <td>' + data.result.faks + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_eposta"); ?></th>\
                        <td>' + data.result.eposta + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_vergi_daire"); ?></th>\
                        <td>' + data.result.vergi_daire + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_yerlesim_tip"); ?></th>\
                        <td>' + data.result.yerlesim_tip + '</td>\
                    <tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_vergi_no"); ?></th>\
                        <td>' + data.result.vergi_no + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_il_id"); ?></th>\
                        <td>' + data.result.il_id + '</td>\
                    </tr>\
                    <tr>\
                        <th><?php echo lang("Yerlesim.table_ilce_id"); ?></th>\
                        <td>' + data.result.ilce_id + '</td>\
                    </tr>\
                </table>\
            </div>'
            }
            $("#detay .modal-body").html(content)
        });
    });
});
</script>
<?php $this->endSection(); ?>