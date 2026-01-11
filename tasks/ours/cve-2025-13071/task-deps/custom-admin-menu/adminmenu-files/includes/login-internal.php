<style>
<?php if( $this->options['head_font'] == $this->options['para_font'] )  { ?>
	@import url(http://fonts.googleapis.com/css?family=<?php echo $this->options['head_font'] ?>);
<?php }else{ ?>
	@import url(http://fonts.googleapis.com/css?family=<?php echo $this->options['head_font'] ?>|<?php echo $this->options['para_font'] ?>);
<?php } ?>
<?php if( isset( $this->options['head_font'] ) && $this->options['head_font'] != '' ) { ?>
h1, h2, h3, h4, h5, h6{
	font-family: <?php echo str_replace( '+', ' ', $this->options['head_font'] ) ?>
}
<?php } ?>
<?php if( isset( $this->options['para_font'] ) && $this->options['para_font'] != '' ) { ?>
body, p, ul, li, a, table, tr, td {
	font-family: <?php echo $this->options['para_font']; ?>
}
<?php } ?>

<?php if( ( isset( $this->options['login_bg_col'] ) && trim( $this->options['login_bg_col'] ) != '' ) ) { ?>
body.login{
	background: <?php echo $this->options['login_bg_col'] ?>;
}
<?php }elseif( ( isset( $this->options['login_bg_img_encoded'] ) && trim( $this->options['login_bg_img_encoded'] ) != '' ) ) { ?>
body.login{
	background: url( <?php echo $this->options['login_bg_img_encoded'] ?> );
	background-size: cover;
}
<?php }elseif( ( isset( $this->options['login_bg_img'] ) && trim( $this->options['login_bg_img'] ) != '' ) ) { ?>
body.login{
	background-image: url( <?php echo $this->options['login_bg_img'] ?> );
	background-size: cover;
}
<?php } ?>

body{
	<?php if( isset( $this->options['para_font'] ) && $this->options['para_font'] != '' ) { ?>
	font-family: <?php echo str_replace( '+', ' ', $this->options['para_font'] ) ?>;
	<?php } ?>
	
	<?php if( isset( $this->options['login_font_col'] ) && $this->options['login_font_col'] != '' ) { ?>
	color: <?php echo $this->options['login_font_col']; ?>;
	<?php } ?>
	
	<?php if( isset( $this->options['body_font_size'] ) && $this->options['body_font_size'] != '' ) { ?>
	font-size: <?php echo $this->options['body_font_size']; ?>px;
	<?php } ?>
}

.form-table th, .form-wrap label{
	<?php if( isset( $this->options['body_font_size'] ) && $this->options['body_font_size'] != '' ) { ?>
	font-size: <?php echo $this->options['body_font_size']; ?>px;
	<?php } ?>
	
	<?php if( isset( $this->options['font_color'] ) && $this->options['font_color'] != '' ) { ?>
	color: <?php echo $this->options['font_color']; ?>
	<?php } ?>
}

.login h1 a{
	<?php if( isset( $this->options['login_logo'] ) && $this->options['login_logo'] != '' ) { ?>
	background-image: url(<?php echo $this->options['login_logo'] ?>);
	<?php } ?>
	<?php if( isset( $this->options['login_logo_encoded'] ) && $this->options['login_logo_encoded'] != '' ) { ?>
		background-image: url(<?php echo $this->options['login_logo_encoded'] ?>);
	<?php } ?>
}
<?php if(isset($this->options['login_form_bg_col']) && $this->options['login_form_bg_col'] != '') { ?>
.login form{
	background: <?php echo $this->options['login_form_bg_col'] != '' ? $this->options['login_form_bg_col'] : 'none' ?>;
	box-shadow: none; 
	}
<?php } ?>
#login strong{
	text-align: center;
	display: block;
}
#login{
	padding-top: 4%;
	<?php if( isset( $this->options['login_font_col'] ) && $this->options['login_font_col'] != '' ) { ?>
	color: <?php echo $this->options['login_font_col']; ?>;
	<?php } ?>
}
.login label, .login #backtoblog a, .login #nav a{
	<?php if( isset( $this->options['login_font_col'] ) && $this->options['login_font_col'] != '' ) { ?>
	color: <?php echo $this->options['login_font_col']; ?>;
	<?php } ?>
}
.wp-core-ui .button-primary{
		<?php if( isset( $this->options['pr_btn_color'] ) && $this->options['pr_btn_color'] != '' ) { ?>
		background: <?php echo $this->options['pr_btn_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['pr_btn_color'] ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		border: 1px solid <?php echo $this->options['pr_btn_color'] ?>;
		<?php } ?>
		<?php if( isset( $this->options['pr_btn_font_color'] ) && $this->options['pr_btn_font_color'] != '' ) { ?>
		color: <?php echo $this->options['pr_btn_font_color']; ?>;
		<?php } ?>
	}
.wp-core-ui .button-primary:hover{
		<?php if( isset( $this->options['pr_btn_hover_color'] ) && $this->options['pr_btn_hover_color'] != '' ) { ?>
		background: <?php echo $this->options['pr_btn_hover_color']; ?>;
		box-shadow: 0 0 0 2px <?php echo $this->options['pr_btn_font_hover_color']; ?> inset, 0 0 1px rgba(0, 0, 0, 0);
		<?php } ?>
		<?php if( isset( $this->options['pr_btn_font_hover_color'] ) && $this->options['pr_btn_font_hover_color'] != '' ) { ?>
		color: <?php echo $this->options['pr_btn_font_hover_color']; ?>;
		<?php } ?>
}
<?php if( isset( $this->options['back_to'] ) && $this->options['back_to'] == 1 ) { ?>
p#backtoblog{
	display: none;
}
<?php } ?>

	.login_msg{
		text-align: center;
	}
</style>