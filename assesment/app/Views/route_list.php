<div class="row">
    <div class="col-lg-12">           
        <h2> CRUD Operation         
            <div class="pull-right">
               <a class="btn btn-primary" href="<?php echo base_url('assesment/public/CRUDController/create') ?>"> Create New Route</a>
            </div>
            <!-- <div class="pull-right">
               <a class="btn btn-primary" href="<?php echo base_url('assesment/public/CRUDController/index/limit') ?>"> Limit</a>
            </div> -->
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <th>SapId  
              <!-- <input type="text" class="search form-control" id="searchInput" placeholder="By Name"> -->
          <!-- <input type="button" class="btn btn-primary" value="Search" onclick="getUsers('search',$('#searchInput').val())"/> -->
        </th>
          <th>Host Name</th>
          <th>Loop Back</th>
          <th>Mac Address</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($route as $d) { ?>      
      <tr>
          <td><?php echo $d['SapId']; ?></td>
          <td><?php echo $d['Hostname']; ?></td> 
          <td><?php echo $d['Loopback']; ?></td>
          <td><?php echo $d['macAddress']; ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('assesment/public/CRUDController/delete/'.$d['id']);?>">
         <a class="btn btn-info btn-xs" href="<?php echo base_url('assesment/public/CRUDController/edit/'.$d['id']) ?>">
         <i class="glyphicon glyphicon-pencil"></i></a>
          <button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>