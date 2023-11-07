<?php $this->load->view('templates/header'); ?>
<body>
<div class="container mt-5">
    <?php if ($paymentStatus == 'success'){?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Transaction <label for="Success" class="badge badge-success">Success</label></h4>
                <div class="card-body">
                    <?php
                    echo "<p>Thank You. Your Payment has been received  </br>";
                    echo " Your Package  will Updated soon.</p>";
                    ?>
                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
    <?php } else  {?>
        <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 text-center">
				<div class="card">
					<h4 class="card-header">Transaction <label for="failure" class="badge badge-danger">Failed</label></h4>
					<div class="card-body">
						<?php
						echo "<p>Oops Your Payment status is " . $paymentStatus . ". .</br>";
						?>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
    <?php } ?>
</div>
<br />
<br />
<br />
<br />
<br />

<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('_layout/printline'); ?>