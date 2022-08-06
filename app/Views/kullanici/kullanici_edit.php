<?php $this->extend("layouts/main"); ?>

<?php $validation = session()->getFlashData("validation"); ?>

<?php $this->section("content"); ?>
    <div class="card">
        <div class="card-body">
            <h3 class="mb-0"><?php echo lang("Kullanici.edit_page_title"); ?></h3>
            <p class="mt-2"><?php echo lang("Kullanici.edit_page_desc"); ?></p>

            <?php echo form_open(
                    url_to("editAction"),
                    ["method" => "post"],
                    ["guncelleyen_id" => 1, "id" => $kullanici->id]
            );


            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_adsoyad'), 'adsoyad');
            echo form_input([
                "type" => "text",
                "name" => "adsoyad",
                "id" => "adsoyad",
                "class" => "form-control",
                "value" => old("adsoyad") ? old("adsoyad") : $kullanici->adsoyad
            ]);
            echo isset($validation["adsoyad"]) ? '<small class="text-danger">'.$validation["adsoyad"].'</small>' : null;
            echo form_fieldset_close();



            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_eposta'), 'eposta');
            echo form_input([
                "type" => "email",
                "name" => "eposta",
                "id" => "eposta",
                "class" => "form-control",
                "value" => old("eposta") ? old("eposta") : $kullanici->eposta
            ]);
            echo isset($validation["eposta"]) ? '<small class="text-danger">'.$validation["eposta"].'</small>' : null;
            echo form_fieldset_close();


            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_tel'), 'telefon');
            echo form_input([
                "type" => "number",
                "name" => "telefon",
                "id" => "telefon",
                "class" => "form-control",
                "value" => old("telefon") ? old("telefon") : $kullanici->telefon
            ]);
            echo isset($validation["telefon"]) ? '<small class="text-danger">'.$validation["telefon"].'</small>' : null;
            echo form_fieldset_close();


            $yetki_dropdown = [];
            foreach($yetkiler as $yetki)
                $yetki_dropdown[$yetki->id] = $yetki->tanim;
            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_rank'), 'yetki');
            echo form_dropdown('yetki_id', $yetki_dropdown, old("yetki_id") ? old("yetki_id") : $kullanici->yetki_id, ["class" => "form-control"]);
            echo isset($validation["yetki_id"]) ? '<small class="text-danger">'.$validation["yetki_id"].'</small>' : null;
            echo form_fieldset_close();


            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_pasif'), 'aktifPasif');
            echo form_radio([
                "name" => "aktif",
                "id" => "aktifPasif",
                "checked" => !$kullanici->aktif,
                "value" => old("name") ? old("name") : 0,
                "style" => "margin-left: 5px;"
            ]);
            echo "<div class='clearfix'></div>";

            echo form_label(lang('Kullanici.table_aktif'), 'aktifAktif');
            echo form_radio([
                "name" => "aktif",
                "id" => "aktifAktif",
                "checked" => $kullanici->aktif,
                "value" => 1,
                "style" => "margin-left: 5px;"
            ]);
            echo isset($validation["aktif"]) ? '<small class="text-danger">'.$validation["aktif"].'</small>' : null;
            echo form_fieldset_close();



            echo form_fieldset("", ["class" => "mb-3"]);
            echo form_label(lang('Kullanici.table_pass'), 'sifre');
            echo form_input([
                "type" => "password",
                "name" => "sifre",
                "id" => "sifre",
                "class" => "form-control"
            ]);
            echo isset($validation["sifre"]) ? '<small class="text-danger">'.$validation["sifre"].'</small>' : null;
            echo form_fieldset_close();



            echo form_button([
                "type" => "submit",
                "class" => "btn btn-primary btn-sm",
                "content" => lang("Kullanici.update_button")
            ]);

            echo form_close(); ?>
        </div>
    </div>
<?php $this->endSection(); ?>




<?php $this->section("javascript"); ?>

<?php $this->endSection(); ?>