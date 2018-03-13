<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-8">
            <h1 class="page-heading">
                Config <small>be very very very careful.</small>
            </h1>
        </div>
        <div class="col-sm-4 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>System config</li>
                <li><a class="link-effect" href="">Dev only</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="content content-narrow">

    <div class="block block-themed block-rounded">
        <div class="block-header bg-flat-dark">
            <h3 class="block-title"> Add country to country ferry fees </h3>

        </div>
        <div class="block-content">
            <?php echo form_open(); ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">Select origin country</label>

                            <select class="form-control" id="country_from" name="country_from" size="1">
                                <option>Please select</option>
                                <?php foreach($countries as $id=>$name):?>
                                    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php endforeach; ?>


                            </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">Select destination country</label>

                            <select class="form-control" id="country_to" name="country_to" size="1">
                                <option>Please select</option>
                                <?php foreach($countries as $id=>$name):?>
                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php endforeach; ?>
                            </select>

                    </div>
                </div>

                <div class="col-md-1 col-sm-4">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">5m<sup>3</sup></label>
                            <input class="form-control" type="text" name="cost_5" />

                    </div>
                </div>
                <div class="col-md-1 col-sm-4">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">10m<sup>3</sup></label>
                            <input class="form-control" type="text" name="cost_10" />

                    </div>
                </div>
                <div class="col-md-1 col-sm-4">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">15m<sup>3</sup></label>
                            <input class="form-control" type="text" name="cost_15" />

                    </div>
                </div>

                <div class="col-md-1 col-sm-4">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">30m<sup>3</sup></label>
                            <input class="form-control" type="text" name="cost_30" />

                    </div>
                </div>

                <div class="col-md-2 text-right">
                    <div class="form-group">
                          <label class="col-xs-12" for="example-select"></label>
                        <button type="submit" name="add_ferry_cost" value="new" class="btn btn-primary"> ADD FERRY COST</button>
                    </div>



                </div>


            </div>
        </form>

        </div>
    </div>

    <div class="block block-themed block-rounded">
        <div class="block-header bg-info">
            <h3 class="block-title"> Existing Records</h3>

        </div>
            <div class="block-content">
                  <?php echo form_open(); ?>
                <Div class="table-responsive">

                  <table class="table ">
                      <tr>
                          <th>
                              country
                          </th>
                          <th style="width: 10%">
                              5m<sup>3</sup>
                          </th >
                          <th style="width: 10%">
                              10m<sup>3</sup>
                          </th>
                          <th style="width: 10%">
                              15m<sup>3</sup>
                          </th>
                          <th style="width: 10%">
                              30m<sup>3</sup>
                          </th>

                          <th class="text-right">
                              OP
                          </th>


                      </tr>

                      <?php foreach($all_ferries_costs as $ferry_cost): ?>



                      <tr>
                          <td style="width: 20%">
                              <img alt="<?php echo $ferry_cost->origin_country_name; ?>" title="<?php echo $ferry_cost->origin_country_name; ?>" src="<?php echo $one->assets_folder; ?>/img/24/<?php echo strtolower($ferry_cost->origin_country); ?>.png" />
                                    <?php echo $ferry_cost->origin_country; ?>
                                    <i class="fa fa-arrows-h"></i>
                                    <img alt="<?php echo $ferry_cost->destination_country_name; ?>" title="<?php echo $ferry_cost->destination_country_name; ?>" src="<?php echo $one->assets_folder; ?>/img/24/<?php echo strtolower($ferry_cost->destination_country); ?>.png" />
                                        <?php echo $ferry_cost->destination_country; ?>
                          </td>
                          <td>
                              <input  type="text" class="form-control" name="ferry_cost_5" value="<?php echo $ferry_cost->cost_5; ?>"/>
                          </td>
                          <td>
                             <input type="text" class="form-control" name="ferry_cost_10" value="<?php echo $ferry_cost->cost_10; ?>"/>

                          </td>
                          <td >
                               <input type="text" class="form-control" name="ferry_cost_15" value="<?php echo $ferry_cost->cost_15; ?>"/>
                          </td>
                          <td >
                               <input type="text" class="form-control" name="ferry_cost_30" value="<?php echo $ferry_cost->cost_30; ?>"/>
                          </td>



                          <td style="width: 20%" class="text-right">
                              <button type="submit" class="btn btn-primary btn-xs" name="update_ferry_cost" value="<?php echo $ferry_cost->id; ?>"><i class="fa fa-repeat"></i></button>
                              <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger btn-xs" name="delete" value="<?php echo $ferry_cost->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                          </td>

                      </tr>


                      <?php endforeach; ?>


                  </table>
                </div>

                   </form>
            </div>
    </div>








    </div>





</div>





<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->


<!-- Page JS Code -->
<script>

    $('#country_from').on('change',function(){

       console.log(this.value);

    });

</script>



<?php require 'inc/views/template_footer_end.php'; ?>