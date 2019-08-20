<?php echo form_open('gaji/create');?>
<table>

<tr><td>id_gaji</td><td><?php echo form_input('id_gaji');?></td></tr>
<tr><td>nama_karyawan</td><td><?php echo form_input('nama_karyawan');?></td></tr>
<tr><td>JURUSAN</td><td>
<select name="jurusan">
   <?php
  $connect = mysqli_connect('localhost', 'root', '', 'akademik');      $sql = mysqli_query($connect,'SELECT * FROM jurusan ORDER BY id_jurusan ASC;');    ?>              <?php if (mysqli_num_rows($sql) > 0) { ?>     <?php while ($row = mysqli_fetch_array($sql)) { ?>      <option><?php echo $row['id_jurusan'] ?></option>     <?php } ?>    <?php } ?>     
  </select>
</td></tr>
<tr><td>ALAMAT</td><td><?php echo form_input('alamat');?></td></tr>
<tr><td colspan="2">
<?php echo form_submit('submit','Simpan');?>
<?php echo anchor('gaji','Kembali');?></td></tr>
</table>
<?php
echo form_close();?>

