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
                Create quote <small>this is only for development purposes.</small>
            </h1>
        </div>
        <div class="col-sm-4 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Create quote </li>
                <li><a class="link-effect" href="">Dev only</a></li>
            </ol>
        </div>
    </div>
</div>



<div class="content content-narrow">
    <!-- Material Design -->
<?php echo form_open(); ?>
    <div class="row">
        <div class="col-sm-6">
            <!-- Static Labels -->


             <div class="block">
                <div class="block-header">

                    <h3 class="block-title">Removal from ...</h3>
                </div>
                <div class="block-content block-content-narrow">


                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="origin" name="origin" placeholder="" required="">
                                    <label for="material-emai l2">Town or City</label>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="block block-themed">
                                        <div class="block-header bg-primary-light">
                                            <h3 class="block-title">up to 300kg</h3>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                <label class="radio-inline" for="example-inline-radio1">
                                                    <input type="radio" id="example-inline-radio1" name="weight" value="5" required> 5 m<sup>3</sup>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="block block-themed">
                                        <div class="block-header bg-amethyst-light">
                                            <h3 class="block-title">up to 600kg</h3>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                <label class="radio-inline" for="example-inline-radio1">
                                                    <input type="radio" id="example-inline-radio1" name="weight" value="10"> 10 m<sup>3</sup>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="block block-themed">
                                        <div class="block-header bg-flat-light">
                                            <h3 class="block-title">up to 1200kg</h3>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                <label class="radio-inline" for="example-inline-radio1">
                                                    <input type="radio" id="example-inline-radio1" name="weight" value="10"> 15 m<sup>3</sup>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div>
                 <div class="geo-details-origins" style="display:none">
                    <input type="hidden" data-geo="country" value="" id="setting_country" name="setting_country">
                    <input type="hidden" data-geo="country_short" value="" id="setting_country_short" name="setting_country_short">
                    <input type="hidden" data-geo="administrative_area_level_1" value="" id="setting_state" name="setting_state">
                    <input type="hidden" data-geo="administrative_area_level_1_short" value="" id="setting_state_short" name="setting_state_short">
                    <input type="hidden" data-geo="administrative_area_level_2" value="" id="setting_city" name="setting_city">
                    <input type="hidden" data-geo="lat" value="" id="setting_latitude" name="setting_latitude">
                    <input type="hidden" data-geo="lng" value="" id="setting_longitude" name="setting_longitude">
                </div>
            </div>
            <!-- END Static Labels -->
        </div>
        <div class="col-sm-6" id="destination-column">
            <!-- Floating Labels -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Destination</h3>
                </div>
                <div class="block-content block-content-narrow">

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="destination" name="destination" placeholder="" required disabled>
                                <label for="material-emai l2">Town or City</label>
                            </div>
                        </div>
                    </div>
                       <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="email" id="email" name="email" required disabled>
                                    <label for="email l2">Email</label>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="col-md-8">
                                <div class="form-material">
                                    <input class="js-datepicker form-control" type="text" id="date" name="date" data-date-format="yyyy-mm-dd" placeholder="">
                                    <label for="date">Choose a date</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-9">
                                <button disabled class="btn btn-sm btn-primary" type="submit" id="create_quote" name="create_quote" value="new">Submit</button>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                <div class="geo-details-destination" style="display:none">
                    <input type="hidden" data-geo="country" value="" id="setting_country" name="destination_setting_country">
                    <input type="hidden" data-geo="country_short" value="" id="setting_country_short" name="destination_setting_country_short">
                    <input type="hidden" data-geo="administrative_area_level_1" value="" id="setting_state" name="destination_setting_state">
                    <input type="hidden" data-geo="administrative_area_level_1_short" value="" id="setting_state_short" name="destination_setting_state_short">
                    <input type="hidden" data-geo="administrative_area_level_2" value="" id="setting_city" name="destination_setting_city">
                    <input type="hidden" data-geo="lat" value="" id="setting_latitude" name="destination_setting_latitude">
                    <input type="hidden" data-geo="lng" value="" id="setting_longitude" name="destination_setting_longitude">
                </div>

                    <input type="hidden" id="distance_found" name="distance_found" value="" />

                </div>
            </div>
            <!-- END Floating Labels -->
        </div>
    </div>
    <!-- END Material Design -->
</form>

    <!-- Bootstrap Design -->


    <div class="row">

 <div class="block">
        <div class="block-header">
            <h3 class="block-title">Dynamic Table <small>Full pagination</small></h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center">id</th>
                        <th> </th>
                        <th>From</th>
                        <th> </th>
                        <th>To </th>
                        <th><i class="glyphicon glyphicon-scale"></i> Weight</th>
                        <th><i class="fa fa-calendar"></i> Date </th>
                        <th>Distance</th>

                            <th>Customer Email <br />Quotes</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($quick_quotes as $quote): ?>
                    <tr>
                        <td class="text-center"><?php echo $quote->id; ?></td>
                        <td><img src="<?php echo $one->assets_folder; ?>/img/24/<?php echo strtolower($quote->origin_country_short); ?>.png" /></td>
                        <td ><?php echo $quote->origin; ?></td>
                        <td ><img src="<?php echo $one->assets_folder; ?>/img/24/<?php echo strtolower($quote->destination_country_short); ?>.png" />

                        </td>
                        <td ><?php echo $quote->destination; ?></td>
                        <td><?php echo $quote->weight; ?> m<sup>3</sup></td>
                        <td><?php echo date('j M Y',strtotime($quote->preferred_date)); ?></td>
                        <td><?php echo round($quote->distance_found/1000); ?>  <small>km</small></td>

                        <td><?php echo $quote->customer_email; ?><br />

                        <ul class="list-inline">
                            <li><small>5m<sup>3</sup></small>:<strong>&pound;<?php echo $quote->calculated_quote_5; ?></strong></li>
                            <li><small>10m<sup>3</sup></small>:<strong>&pound;<?php echo $quote->calculated_quote_10; ?></strong></li>
                            <li><small>15m<sup>3</sup></small>:<strong>&pound;<?php echo $quote->calculated_quote_15; ?></strong></li>
                            </ul>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">

                                <button class="btn btn-xs btn-success" type="button" data-toggle="tooltip" title="Send reminder">REMINDER</button>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    </div>



</div>




<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/js/pages/base_tables_datatables.js"></script>

<script src="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script>
    jQuery(function(){
        // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
        App.initHelpers(['datepicker']);
    });
</script>
 <script>
      $(function(){

        $("#origin").geocomplete({
                details: ".geo-details-origins",
                detailsAttribute: "data-geo"
        })
          .bind("geocode:result", function(event, result){
             console.log("Result: " + result.formatted_address);
             $('#destination-column input').prop("disabled", false);
             $('#destination-column button').prop("disabled", false);
          })
          .bind("geocode:error", function(event, status){
            console.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            console.log("Multiple: " + results.length + " results found");
          });

      $("#destination").geocomplete({

                details: ".geo-details-destination",
                detailsAttribute: "data-geo"
            })

          .bind("geocode:result", function(event, result){
            var directionsService = new google.maps.DirectionsService();
            var origin = $('#origin').val();
            var destination  = $('#destination').val();
            var request = {
                origin      : origin,
                destination : destination,
                travelMode  : google.maps.DirectionsTravelMode.DRIVING
            };

            directionsService.route(request, function(response, status) {
                if ( status == google.maps.DirectionsStatus.OK ) {
                    var distance = response.routes[0].legs[0].distance.value;

                    $('#distance_found').val(distance); }
                else { alert('error');}
            });

          })
          .bind("geocode:error", function(event, status){
            console.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            console.log("Multiple: " + results.length + " results found");
          });


  });
    </script>

<?php require 'inc/views/template_footer_end.php'; ?>