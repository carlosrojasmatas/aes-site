<?php use_stylesheet("login.css", "last");?>
<div class="panel960">
	<div class="panelTop"></div>
	<div class="panelContent">
		<div class="loginPanel">
			<div>
				<div class="topLeft"></div>
				<div class="topRight"></div>
				<div class="topCenter"></div>
			</div>

			<div class="middleLeft">
				<div class="middleRight">
					<div class="content">
                                            <?php if($sf_user->hasFlash("notice")):?>
                                                <div class="formRow"><?php echo $sf_user->getFlash("notice");?></div>
                                            <?php endif;?>
						<?php use_helper('I18N') ?>
						<h2>Log In</h2>
						<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
					</div>
				</div>
			</div>
			<div style="clear: left;">
				<div class="bottomLeft"></div>
				<div class="bottomRight"></div>
				<div class="bottomCenter"></div>
			</div>
		</div>
	</div>
	<div class="panelBottom"></div>
</div>
