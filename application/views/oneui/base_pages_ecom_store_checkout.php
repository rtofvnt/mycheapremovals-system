<?php require 'inc/config.php'; ?>
<?php
// Specific Page Options
$one->inc_side_overlay  = 'base_pages_ecom_store_side_overlay.php';
$one->inc_header        = 'base_pages_ecom_store_header.php';
?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>


<!-- Hero Content -->
<div class="bg-image" style="background-image: url('<?php echo $one->assets_folder; ?>/img/photos/photo3@2x.jpg');">
    <div class="bg-primary-dark-op">
        <section class="content content-full content-boxed overflow-hidden">
            <!-- Section Content -->
            <div class="push-30-t push-30 text-center">
                <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown"><i class="fa fa-shopping-cart text-white-op"></i> Checkout.</h1>
                <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">We are almost there!</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
</div>
<!-- END Hero Content -->

<!-- Checkout Content -->
<section class="content content-boxed">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!-- Card plugin (.js-card-form and .js-card-container are initialized at the bottom of the page) -->
            <!-- For more info and examples you can check out https://github.com/jessepollak/card -->
            <form class="js-card-form form-horizontal" action="base_pages_ecom_store_checkout.php" method="post" onsubmit="return false;">
                <!-- Products -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Please check all details.</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-vcenter">
                            <tbody>
                                <tr>

                                    <td style="width: 100px;">
                                        <img class="img-responsive" src="<?php echo $one->assets_folder; ?>/img/various/map.png" alt="">
                                    </td>
                                    <td>
                                        <small>FROM: </small><p class="h5"><?php echo $job->origin; ?></p>

                                    </td>

                                      <td>
                                        <small>TO: </small><p class="h5"><?php echo $job->destination; ?></p>

                                    </td>

                                </tr>
                                <tr>

                                    <td >
                                        <img class="img-responsive" src="<?php echo $one->assets_folder; ?>/img/various/calendar.png" alt="">
                                    </td>
                                    <td colspan="2">
                                        <p >Preferred date: <span class="h4"><?php echo date('j M Y',strtotime($job->preferred_date)); ?></span>
                                            <strong> - if you changed your mind please contact us</strong>
                                        </p>

                                    </td>


                                </tr>

                                <tr class="success">
                                    <td class="text-right" colspan="3">
                                        <span class="h4 font-w600">Total</span>
                                    </td>
                                    <td class="text-right" colspan="2">
                                        <div class="h4 font-w600 text-success">&pound; <?php echo $job->{'calculated_quote_'.$selected_weight_from_email}; ?></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Products -->

                <!-- Create Account -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">2. Create Account</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-username" name="checkout-username" type="text">
                                            <label for="checkout-username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-email" name="checkout-email" type="email">
                                            <label for="checkout-email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-password" name="checkout-password" type="password">
                                            <label for="checkout-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-password2" name="checkout-password2" type="password">
                                            <label for="checkout-password2">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-firstname" name="checkout-firstname" type="text">
                                            <label for="checkout-firstname">Firstname</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-lastname" name="checkout-lastname" type="text">
                                            <label for="checkout-lastname">Lastname</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-country" name="checkout-country" type="text">
                                            <label for="checkout-country">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" id="checkout-city" name="checkout-city" type="text">
                                            <label for="checkout-city">City</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Create Account -->

                <!-- Credit Card -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">3. Credit Card</h3>
                    </div>
                    <div class="block-content">
                        <!-- Card Container -->
                        <div class="js-card-container hidden-xs push-50"></div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" id="checkout-cc-number" name="checkout-cc-number" type="text" placeholder="**** **** **** ****">
                                            <label for="checkout-cc-number">Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" id="checkout-cc-name" name="checkout-cc-name" type="text" placeholder="JOHN DOE">
                                            <label for="checkout-cc-name">Full Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <input class="form-control" id="checkout-cc-expiry" name="checkout-cc-expiry" type="text" placeholder="01/2019">
                                            <label for="checkout-cc-expiry">MM/YYYY</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-material">
                                            <input class="form-control" id="checkout-cc-cvc" name="checkout-cc-cvc" type="text" placeholder="***">
                                            <label for="checkout-cc-cvc">CVC</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 text-center">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-check push-5-r"></i> Complete Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Credit Card -->
            </form>
        </div>
    </div>
</section>
<!-- END Checkout Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/card/jquery.card.min.js"></script>

<!-- Page JS Code -->
<script>
    jQuery(function(){
        // Init page helpers (Appear plugin)
        App.initHelpers('appear');

        // Init Card, for more info and examples you can check out https://github.com/jessepollak/card
        jQuery('.js-card-form').card({
            container: '.js-card-container',
            formSelectors: {
                numberInput: '#checkout-cc-number',
                expiryInput: '#checkout-cc-expiry',
                cvcInput: '#checkout-cc-cvc',
                nameInput: '#checkout-cc-name'
            }
        });
    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>