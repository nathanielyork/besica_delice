<?php  if (count($errors) > 0) { ?>
	<div class="error">
		<?php foreach ($errors as $error) { ?>
            <p>
            <!-- // echo'<div>'; -->

           <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oooooops une eureur!</strong>
  <?php=echo.$error."";?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">close</span>
  </button>
</div>'
            <!-- // echo'</div>'; -->
            <!-- ?> -->
            </p>
   <?php } ?>
	</div>
            <?php  } ?>
