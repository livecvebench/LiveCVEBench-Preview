<?php

if ( ! class_exists( 'GFForms' ) ) {
	return '';
}

class GF_Field_HandLFreeSource extends GF_Field_Hidden {
	public $type = 'handlfree_utm_source';

//	public function get_form_editor_field_title() {
//		return 'HandL UTM Campaign';
//	}

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking utm_source in your form' );
	}

//	public function get_form_editor_field_icon() {
//		return 'gform-icon--vote';
//	}
}
GF_Fields::register( new GF_Field_HandLFreeSource() );

class GF_Field_HandLFreeCampaign extends GF_Field_Hidden {
	public $type = 'handlfree_utm_campaign';

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking utm_campaign in your form' );
	}
}
GF_Fields::register( new GF_Field_HandLFreeCampaign() );

class GF_Field_HandLFreeMedium extends GF_Field_Hidden {
	public $type = 'handlfree_utm_medium';

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking utm_medium in your form' );
	}
}
GF_Fields::register( new GF_Field_HandLFreeMedium() );

class GF_Field_HandLFreeContent extends GF_Field_Hidden {
	public $type = 'handlfree_utm_content';

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking utm_content in your form' );
	}
}
GF_Fields::register( new GF_Field_HandLFreeContent() );

class GF_Field_HandLFreeTerm extends GF_Field_Hidden {
	public $type = 'handlfree_utm_term';

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking utm_term in your form' );
	}
}
GF_Fields::register( new GF_Field_HandLFreeTerm() );

class GF_Field_HandLFreeGclid extends GF_Field_Hidden {
	public $type = 'handlfree_gclid';

	public function get_form_editor_field_description() {
		return esc_attr__( 'Tracking gclid in your form' );
	}
}
GF_Fields::register( new GF_Field_HandLFreeGclid() );



/*
 * Gravity Form Dependencies
 */
add_filter('gform_field_groups_form_editor','handl_gform_field_groups_form_editor', 10, 1);
function handl_gform_field_groups_form_editor( $field_groups ) {
	$utm_fields = handl_utm_variables();
	foreach ($utm_fields as $field) {
		$fields[] = array( 'data-type'        => 'handlfree_'.$field,
		                   'value'            => $field,
//		                   'data-description' => "Tracking $field in your form",
//		                   'data-icon' => 'gform-icon--vote'
		);
	}
	foreach (PREMIUM_FEATURES as $feature){
		$fields[] = array(
			'data-type' => 'handlpremium',
			'value' => $feature,
			'data-description' => 'HandL UTM Grabber v3 Premium Feature. Upgrade to track more.',
			'onclick' => 'if ( confirm("You need v3 to use this feature, Upgrade now?") == true ){window.open("'.HANDL_UTM_V3_LINK.'", "_blank");}'
		);
	}

	$field_groups['handl_utm_tracking'] = array(
		'name' => 'handl_utm_tracking',
		'label' => 'UTM Tracking',
		'fields' => $fields
	);
	return $field_groups;
}

add_action('gform_editor_js_set_default_values', 'handl_gform_editor_js_set_default_values',10,1);
function handl_gform_editor_js_set_default_values($a){
	$utm_fields = handl_utm_variables();
	foreach ($utm_fields as $field) {
		print "
        case 'handlfree_$field':
            field.inputs = null;
            field.label = 'HandL ( $field )'
            field.allowsPrepopulate = true
            field.inputName = '$field'
        break;
    ";
	}
}

add_filter( 'gform_entry_detail_meta_boxes', 'add_gravity_form_notice_for_v3', 10, 3 );
function add_gravity_form_notice_for_v3( $meta_boxes, $entry, $form ) {
	if ( ! isset( $meta_boxes['grabber_v3'] ) ) {
		$meta_boxes['grabber_v3'] = array(
			'title'         => 'UTM Tracking',
			'callback'      => 'gravity_grabber_v3',
			'context'       => 'side',
			'callback_args' => array( $entry, $form ),
			'priority'      => 'default'
		);
	}

	return $meta_boxes;
}

function gravity_grabber_v3($entry, $form){
	$upgrade_link = handl_v3_generate_links('HandL_Premium_Upgrade','','GravityForm');
	print "<p>You are currently tracking only utm_* variables. You could have tracked more. <a href='$upgrade_link' target='_blank'>Click here</a> to upgrade.</p>";
	print "<ul>";
	foreach (PREMIUM_FEATURES as $feature){
		print "<li><a target='_blank' href='$upgrade_link'><input type='checkbox' disabled/></a>$feature</li>";
	}
	print "</ul>";

}
?>