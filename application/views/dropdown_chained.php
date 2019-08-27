<form action="">
   <fieldset>
      <legend>Dropdown Chained Ajax</legend>

      <p>
         <select name="propinsi" id="propinsi" style="width: 30%;">
            <option value="">PILIH PROPINSI</option>
            <?php foreach($propinsi->result() as $row_propinsi): ?>
            <option value="<?php echo $row_propinsi->id_propinsi; ?>"><?php echo $row_propinsi->nama; ?></option>
            <?php endforeach; ?>
         </select>
      </p>
      
      <p>
         <select name="kota" id="kota" style="width: 30%;">
            <option value="">PILIH KOTA</option>
         </select>
      </p>
      
      <p>
         <select name="kecamatan" id="kecamatan" style="width: 30%;">
            <option value="">PILIH KECAMATAN</option>
         </select>
      </p>
      
      <p>
         <select name="desa" id="desa" style="width: 30%;">
            <option value="">PILIH DESA</option>
         </select>
      </p>
   </fieldset>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url('assets/js/chained/jquery.chained.js?v=1.0.0'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url('assets/js/chained/jquery.chained.remote.js?v=1.0.0'); ?>" type="text/javascript" charset="utf-8"></script>
<link href="<?php echo site_url('assets/css/select2.min.css'); ?>" rel="stylesheet" />
<script src="<?php echo site_url('assets/js/select2/select2.min.js'); ?>"></script>

<script>
   $(document).ready(function() {
       $('select').select2();
   });

   $("#kota").remoteChained({
      parents : "#propinsi",
      url : "<?php echo site_url('dropdown_chained/get_kota'); ?>"
   });

   $("#kecamatan").remoteChained({
      parents : "#kota",
      url : "<?php echo site_url('dropdown_chained/get_kecamatan'); ?>"
   });

   $("#desa").remoteChained({
      parents : "#kecamatan",
      url : "<?php echo site_url('dropdown_chained/get_desa'); ?>"
   });
</script>