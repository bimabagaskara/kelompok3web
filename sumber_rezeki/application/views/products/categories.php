<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <?= form_error('name','<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>')?>
            <?= form_error('code','<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>')?>
            <?= $this->session->flashdata('message');?>
            <div class="card-header">
              <h4>Category</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#addCategoryModal"><i class="fas fa-plus-circle"></i>
                    Add New Category</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-md" id="tabel-data">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach ($categories as $c) :?>
                    <tr>
                      
                      
                      <td><?=$i;?>.</td>
                      <td><?= $c['name_categories'] ?></td>
                      <td><?= $c['code_categories'] ?></td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#editCategoryModal<?=$c['id_categories']?>"><i class="fas fa-edit"></i> Edit</a>
                        <a href="<?=base_url('product/deleteCat/'.$c['id_categories'])?>" onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-icon icon-left btn-danger" ><i class=" far fa-trash-alt"></i>Delete</a>
                        
                      </td>
                      <?php $i++;?>
                      
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
  </section>
</div>
<!-- The Modal Add -->
<div class="modal" id="addCategoryModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Categories</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=base_url('product/categories')?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label></label>
              <input type="text" id="name" name="name" placeholder="Categories Name" class="form-control">
            </div>
            <div class="form-group">
              <label></label>
              <input type="text" id="code" name="code" placeholder="Categories Code" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- The Modal Edit -->
<?php
foreach($categories as $c):
$c_id=$c['id_categories'];
$c_category=$c['name_categories'];
$c_code=$c['code_categories'];
?>
<div class="modal" id="editCategoryModal<?=$c_id?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=base_url('product/updatecat/').$c_id?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Categories Name</label>
              <input type="text" id="name" name="name" placeholder="Category Name" class="form-control" value="<?= $c_category?>">
            </div>
            <div class="form-group">
              <label>Categories Code</label>
              <input type="text" id="code" name="code" placeholder="Categories Code" class="form-control" value="<?= $c_code ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>