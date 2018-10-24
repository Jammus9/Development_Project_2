<?php  if (count($errors) > 0) : ?>
<div class="row" id="alert_box">
    <div class="col s12 m12">
        <div class="card red lighten-1">
            <div class="row">
                <div class="col s12 m10">
        <div class="card-content white-text">
		<?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
		<?php endforeach ?>
          </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  endif ?>
