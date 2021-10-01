<?php include('header.php'); ?>

<div class="container" style="margin-top:50px;">
<div class="rows">
  <a href="adduser" class="btn btn-lg btn-primary">Add Article</a>  
 <?= anchor('Admin/adduser','Add Articles',['class'=>'btn btn-lg btn-primary'])  ?>
</div>




<div class="container" style="margin-top:50px;">
<?php  if($msg=$this->session->flashdata('msg')): 

$msg_class=$this->session->flashdata('msg_class')

 ?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $msg_class ?>">
<?= $msg; ?>
</div>
</div>
</div>

<?php endif; ?>

</div>


<div class="table">
<table>
<thead>
<tr>
<th>S.no</th>
<th>Article Title</th>
<th>Article Body</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php if(count($articles)): ?> 
<?php foreach ($articles as $art): ?>
    <thead>
<tr>
     <td><?= $art->user_id;?></td>
    <td><?=  $art->article_title; ?></td>
    <td><?=  $art->article_body; ?></td>
    <td><?=  anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-default']);  ?></td>
    
    <td>
        <?=
        form_open('admin/delarticles'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
        form_close();
        ?>
         </td>
  </tr>
  </thead>
  <?php endforeach; ?>
<?php else: ?>
  <tr>
  <td colspan="3">Not data available</td>
  </tr>
   <?php endif; ?>
</tbody>




</table>


<?php  echo $this->pagination->create_links();   ?> 
</div>





</div>
<?php include('footer.php'); ?>