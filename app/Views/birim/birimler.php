<?php $this->extend("layouts/main"); ?>

<?php $this->section("content"); ?>
<div class="card">
    <div class="card-body">
        <h3 class="mb-0"><?php echo lang("Birim.page_title"); ?></h3>
        <p class="mt-2"><?php echo lang("Birim.page_desc"); ?></p>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#yeniEkle">
            <?php echo lang("Birim.new_button"); ?> 
            <span class="fas fa-chevron-right ml-1 fs--2"></span>
        </button>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo lang("Birim.table_birim"); ?></th>
                        <th width="20"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($birimler as $birim){?>
                    <tr>
                        <td><?php echo $birim->ad; ?></td>
                        <td>
                            <a href="<?php echo base_url("birimler/sil/". $birim->id); ?>" class="btn btn-danger btn-sm sil">
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
<div class="modal modal-fixed-right fade" id="yeniEkle" tabindex="-1" role="dialog" aria-labelledby="yeniEkle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniEkle"><?php echo lang("Birim.new_form_title"); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body py-5 text-center">
        <img class="img-fluid" src="<?php echo site_url('assets/img/illustrations/modal-right.png'); ?>" alt="">
        <?php 
            echo form_open(base_url("birimler/ekle"), ["method" => "post", "autocomplete" => "off"]);
            echo form_input([
                "type" => "hidden", 
                "name" => "user_id", 
                "value" => session()->get("id")
            ]);
        
            echo form_input([
                "type" => "text", 
                "name" => "ad", 
                "class" => "form-control mb-3", 
                "placeholder" => lang("Birim.table_birim")
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