<?php $this->load->view('/emails/common_heading.php'); ?>


<body bgcolor="#FFFFFF">

<?php $this->load->view('/emails/common_header.php'); ?>

<!-- BODY -->
<table class="body-wrap">
        <tr>
            <td></td>
            <td class="container" bgcolor="#FFFFFF">
            <div class="content">
                <table>
                    <tr>
                        <td>
                             <p>Thank you for your interest in booking your European removal with MyCheapRemovals.
                                Please find below the details of the personalised quotation for our engagement based on the details you supplied. </p>


                        </td>
                    </tr>
                    <tr>
                        <td>
                         <br />
                        </td>
                    </tr>
                    <tr>
                        <td class="callout" style="padding:15px; background-color:#E2F5E4; margin-bottom: 15px;">
                            <h4>We have volume options available for you </h4>
                            <p>Please select from the options listed below.
                                If you are not sure what option could be the most suitable for your move click on one of the links
                                on the right to find out more details
                            </p>
                        </td>
                    </tr>
		</table>
                <br />
                <table>
                    <tr>
                        <td><p style="font-size: 11px;">From:</p> </td><td><strong><?php echo $job['job']->origin; ?></strong>
                        <td><p style="font-size: 11px;">To:</p> </td> <td><strong> <?php echo $job['job']->destination; ?> </strong> </td>

                    </tr>



                </table>
                <br />
                 <hr/>
                <br />
                <table>
                    <tr>
                        <td align="center" width="33%">

                            <h4>5 m<sup>3</sup> </h4>
                            <p style="font-size: 10px;">176 cubic feet - up to 300kg</p>
                        </td>
                        <td width="33%" align="center">
                            <h3>&pound;<?php echo $job['job']->calculated_quote_5; ?></h3>

                        </td>
                        <td align="right" width="33%">
                            <a href="http://mycheapremovals.co.uk/system/payment?s=5&je=<?php echo $job['encoded_id']; ?>">
                                <img src="http://mycheapremovals.co.uk/system/assets/img/emails/btn_booknow.png" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br />
                            <hr/>
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="33%">
                            <h4>10 m<sup>3</sup> </h4>
                            <p style="font-size: 10px;">176 cubic feet - up to 300kg</p>
                        </td>
                        <td width="33%" align="center">
                            <h3>&pound;<?php echo $job['job']->calculated_quote_10; ?></h3>

                        </td>
                        <td align="right" width="33%">
                            <a href="http://mycheapremovals.co.uk/system/payment?s=10&je=<?php echo $job['encoded_id']; ?>">
                                <img src="http://mycheapremovals.co.uk/system/assets/img/emails/btn_booknow.png" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br />
                            <hr/>
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="33%">

                            <h4>15 m<sup>3</sup> </h4>
                            <p style="font-size: 10px;">176 cubic feet - up to 300kg</p>
                        </td>
                        <td width="33%" align="center">
                            <h3>&pound;<?php echo $job['job']->calculated_quote_15; ?></h3>

                        </td>
                        <td align="right" width="33%">
                            <a href="http://mycheapremovals.co.uk/system/payment?s=15&je=<?php echo $job['encoded_id']; ?>">
                                <img src="http://mycheapremovals.co.uk/system/assets/img/emails/btn_booknow.png" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                         <td colspan="3">
                            <br />
                            <hr/>
                            <br />
                        </td>
                    </tr>


                </table>



            </div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">

				<!-- content -->
				<div class="content">



                                    <table>
				<tr>
					<td align="center">
						<p>
							<a href="http://www.theprintrunner.co.uk/page/terms_and_conditions_printers/">Terms</a> |
							<a href="http://www.theprintrunner.co.uk/page/privacy/">Privacy</a> |

						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>