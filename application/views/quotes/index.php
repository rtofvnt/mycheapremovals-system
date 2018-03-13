<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/datatables/jquery.dataTables.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>





<div class="content content-narrow">
    <!-- Material Design -->

    <!-- Bootstrap Design -->


    <div class="row">

 <div class="block">
        <div class="block-header">
            <h3 class="block-title">Quotes <small>Just created - reminder not sent. It will be within half an hour </small></h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">

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
                            <li><small>30m<sup>3</sup></small>:<strong>&pound;<?php echo $quote->calculated_quote_30; ?></strong></li>
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