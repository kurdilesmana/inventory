      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?php echo $caption ?></h3>  
              <div class="box-tools">                
                <a href="<?php echo base_url(); ?>users/add" type="button" class="btn btn-block btn-default pull-right">Tambah User</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($this->session->flashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible" style="margin-top: 3px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <div class="header"><b><i class="fa fa-check"></i> SUCCESS</b> <?php echo $this->session->flashdata('success'); ?></div>
              </div>
              <?php } ?>
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Opsi</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>