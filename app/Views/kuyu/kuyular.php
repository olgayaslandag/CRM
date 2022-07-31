<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Kuyu.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Kuyu.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Kuyu.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>

        <?php echo form_open("", ["method" => "get"]); ?>
        <ul class="list-inline">            
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "text",
                    "name" => "yerlesim",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Kuyu.table_yerlesim"),
                    "value" => isset($filter->yerlesim) ? $filter->yerlesim : null
                ]); ?>
            </li>
            <li class="list-inline-item">
                <?php echo form_input([
                    "type" => "text",
                    "name" => "ekleyen",
                    "class"=> "form-control form-control-sm mb-2",
                    "placeholder" => lang("Kuyu.table_ekleyen"),
                    "value" => isset($filter->ekleyen) ? $filter->ekleyen : null
                ]); ?>
            </li>

            <li class="list-inline-item">
                <?php echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary btn-sm", 
                    "content" => lang("Kuyu.filter_button_text")
                ]); ?>
            </li>
        </ul>
        <?php echo form_close(); ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo lang("Kuyu.table_tanim"); ?></th>
                        <th><?php echo lang("Kuyu.table_yerlesim"); ?></th>
                        <th><?php echo lang("Kuyu.table_ekleyen"); ?></th>
                        <th><?php echo lang("Kuyu.table_aktif"); ?></th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kuyular as $kuyu){?>
                        <td><?php echo $kuyu->id; ?></td>
                        <td><?php echo $kuyu->tanim; ?></td>
                        <td><?php echo $kuyu->unvan; ?></td>
                        <td><?php echo $kuyu->adsoyad; ?></td>
                        <td><?php echo $kuyu->aktif; ?></td>
                        <td>
                            <button id="<?php echo $kuyu->id; ?>" class="btn btn-primary btn-sm detail" data-toggle="modal" data-target="#detay">
                                <i class="fa fa-info"></i>
                            </button>
                            <a href="<?php echo base_url("kuyu/sil/". $kuyu->id); ?>" class="btn btn-danger btn-sm sil">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
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

    <div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true" data-focus="false">
      <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content border-0 min-vh-100">
          <div class="modal-header">
            <h5 class="modal-title" id="yeniEkle"><?php echo lang("Kullanici.new_form_title"); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body py-5 text-center">
            <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
            <?php 
                echo form_open(base_url(route_to("wellsAdd")), ["method" => "post", "autocomplete" => "off"]);
                echo form_input([
                    "type" => "hidden", 
                    "name" => "ekleyen_id", 
                    "value" => session()->get("id")
                ]);
            
                echo form_input([
                    "type" => "text",
                    "name" => "tanim",
                    "class" => "form-control mb-3",
                    "placeholder" => lang("Kuyu.table_tanim")
                ]);

               echo '<div class="mb-3">';
                echo form_dropdown([
                    "name" => "yerlesim_id", 
                    "class" => "select2-post",
                    "data-ajax--url" => base_url('yerlesim/find_select'),
                    "data-placeholder" => lang("Kuyu.table_yerlesim")
                ]);
                echo '</div>';


                echo form_button([
                    "type" => "submit", 
                    "class" => "btn btn-primary form-control", 
                    "content" => lang("Kuyu.add_button")
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
                </div>'
            }
            $("#detay .modal-body").html(content)
        });
    });



});
</script>
<?php $this->endSection(); ?>