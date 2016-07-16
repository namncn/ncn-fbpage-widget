<?php
/**
 * Plugin setting page.
 */

// Create setting page.
$settings = create_settings_page(
	'ncn_fbpage_option',
	esc_html__( 'Trang cài đặt NCN Facebook Page', 'namncn' ),
	array(
		'title' => esc_html__( 'Cài đặt NCN Facebook Page', 'namncn' )
	),
	array(
		'include_fb_sdk_js' => array(
			// 'title'       => esc_html__( '' ),
			// 'description' => esc_html__( '' ),
			'fields'      => array(
				'appid'    => array(
					'label'        => esc_html__( 'App ID - ID ứng dụng facebook của bạn?', 'namncn' ),
					'description'  => esc_html__( 'Nếu bạn chưa có App ID, truy cập link sau để tạo 1 App ID facebook: https://developers.facebook.com/docs/apps/register.', 'namncn' ),
				),
				'sdk_js'    => array(
					'type'         => 'checkbox',
					'label'        => esc_html__( 'Nhúng SDK JavaScript vào website?', 'namncn' ),
					'description'  => esc_html__( 'SDK JavaScript là 1 đoạn mã javascript quan trọng để facebook page có thể hiển thị, nếu website bạn đã nhúng đoạn mã này rồi thì không cần bước này nữa.', 'namncn' ),
				),
				'languages' => array(
					'type'         => 'select',
					'label'        => esc_html__( 'Chọn ngôn ngữ của Facebook', 'namncn' ),
					'description'  => esc_html__( 'Bạn muốn Facebook page hiển thị theo ngôn ngữ nào thì chọn vào ngôn ngữ đó.', 'namncn' ),
					'options' => array(
						'vi'   => __( 'Việt Nam'),
						'en'   => __( 'English (US)'),
					),
				),
			),
		),
	)
);

$settings = apply_filters( 'ncn-fbpage-setting', $settings );

// Access the values
$values = get_setting( 'include_fb_sdk_js' );

$include = $values['sdk_js'];

/**
 * Print facebook sdk js on footer.
 */
function ncn_include_sdkjs() {

	$values = get_setting( 'include_fb_sdk_js' );

	$appid = $values['appid'];

	$language = $values['languages'];

	if ( 'vi' == $language ) {
		$language = 'vi_VN';
	} else {
		$language = 'en_US';
	}
?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/<?php echo esc_html( $language ); ?>/sdk.js#xfbml=1&version=v2.7&appId=<?php echo esc_html( $appid ); ?>";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php
}

if ( $include ) {
	add_action( 'wp_footer', 'ncn_include_sdkjs' );
}
