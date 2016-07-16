<?php
/**
 * Adds addition widgets
 */

/**
 * Register widget.
 */
function ncn_register_widget() {
	register_widget( 'NCN_Facebook_Page_Widget' );
}
add_action( 'widgets_init', 'ncn_register_widget' );

/**
 * Adds NCN_Facebook_Page_Widget
 */
class NCN_Facebook_Page_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'ncn_facebook_page_widget',
			__( 'Facebook Page', 'namncn' ),
			array( 'description' => __( 'Show your Facebook page on sidebar.', 'namncn' ) )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title                      = apply_filters( 'widget_title', $instance['title'] );
		$data_href                  = $instance['data_href'];
		$data_tabs                  = $instance['data_tabs'];
		$data_small_header          = $instance['data_small_header'];
		$data_container_width       = $instance['data_container_width'];
		$data_hide_cover            = $instance['data_hide_cover'];
		$data_show_facepile         = $instance['data_show_facepile'];
		$data_hide_cta              = $instance['data_hide_cta'];
		$data_width                 = $instance['data_width'];
		$data_height                = $instance['data_height'];

		if ( true == $data_small_header ) {
			$data_small_header = 'true';
		} else {
			$data_small_header = 'false';
		}

		if ( true == $data_hide_cover ) {
			$data_hide_cover = 'true';
		} else {
			$data_hide_cover = 'false';
		}
		
		if ( true == $data_show_facepile ) {
			$data_show_facepile = 'true';
		} else {
			$data_show_facepile = 'false';
		}

		if ( true == $data_container_width ) {
			$data_container_width = 'true';
		} else {
			$data_container_width = 'false';
		}

		if ( true == $data_hide_cta ) {
			$data_hide_cta = 'true';
		} else {
			$data_hide_cta = 'false';
		}

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] ) . wp_kses_post( $title ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="fb-page" data-href="<?php echo esc_url( $data_href ); ?>" data-tabs="<?php echo esc_attr( $data_tabs ); ?>" data-small-header="<?php echo esc_attr( $data_small_header ); ?>" data-adapt-container-width="<?php echo esc_attr( $data_container_width ); ?>" data-hide-cover="<?php echo esc_attr( $data_hide_cover ); ?>" data-show-facepile="<?php echo esc_attr( $data_show_facepile ); ?>" data-hide-cta="<?php echo esc_attr( $data_hide_cta ); ?>" data-width="<?php echo esc_attr( $data_width ); ?>" data-height="<?php echo esc_attr( $data_height ); ?>">
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		// $instance = wp_parse_args( array(
		// 	'title'                => esc_html__( 'Facebook', 'namncn' ),
		// 	'data_href'            => 'http://facebook.com/facebook/',
		// 	'data_tabs'            => 'timeline, events, messages',
		// 	'data_small_header'    => 0,
		// 	'data_hide_cover'      => 0,
		// 	'data_container_width' => 1,
		// 	'data_show_facepile'   => 1,
		// 	'data_hide_cta'        => 0,
		// 	'data_width'           => '340',
		// 	'data_height'          => '500',
		// ), $instance );

		$title                   = ! empty( $instance['title'] ) ? $instance['title'] : '';

		$data_href               = ! empty( $instance['data_href'] ) ? $instance['data_href'] : '';

		$data_tabs               = ! empty( $instance['data_tabs'] ) ? $instance['data_tabs'] : '';

		$data_small_header       = ! empty( $instance['data_small_header'] ) ? (bool) $instance['data_small_header'] : '';

		$data_hide_cover         = ! empty( $instance['data_hide_cover'] ) ? (bool) $instance['data_hide_cover'] : '';

		$data_container_width    = ! empty( $instance['data_container_width'] ) ? (bool) $instance['data_container_width'] : '';

		$data_show_facepile      = ! empty( $instance['data_show_facepile'] ) ? (bool) $instance['data_show_facepile'] : '';

		$data_hide_cta           = ! empty( $instance['data_hide_cta'] ) ? (bool) $instance['data_hide_cta'] : '';

		$data_width              = ! empty( $instance['data_width'] ) ? absint( $instance['data_width'] ) : '';

		$data_height             = ! empty( $instance['data_height'] ) ? absint( $instance['data_height'] ) : '';

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Tiêu đề:', 'namncn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'data_href' ) ); ?>"><?php esc_html_e( 'URL of Facebook page:', 'namncn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_href' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_href' ) ); ?>" type="text" value="<?php echo esc_attr( $data_href ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'data_width' ) ); ?>"><?php esc_html_e( 'Chiều rộng:', 'namncn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_width' ) ); ?>" type="number" step="1" min="180" max="500" value="<?php echo esc_attr( $data_width ); ?>">
				<small><?php esc_html_e( 'Chiều rộng pixel của widget. Tối thiểu là 180 và tối đa là 500. Có thể bỏ qua vì bạn có thể dùng chức năng hiển thị rộng bằng khung chưa phía dưới.', 'namncn' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'data_height' ) ); ?>"><?php esc_html_e( 'Chiều cao:', 'namncn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_height' ) ); ?>" type="number" step="1" min="70" value="<?php echo esc_attr( $data_height ); ?>">
				<small><?php esc_html_e( 'Chiều cao pixel của widget. Tối thiểu là 70.', 'namncn' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'data_tabs' ) ); ?>"><?php esc_html_e( 'Tab hiển thị:', 'namncn' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_tabs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_tabs' ) ); ?>" type="text" value="<?php echo esc_attr( $data_tabs ); ?>">
				<small><?php esc_html_e( 'Các tab sẽ hiển thị, ví dụ : timeline, events, messages. Sử dụng danh sách được phân tách bằng dấu phẩy để thêm nhiều tab, ví dụ : timeline, events.', 'namncn' ); ?></small>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('data_small_header'); ?>" name="<?php echo $this->get_field_name('data_small_header'); ?>"<?php checked( $data_small_header ); ?> />
				<label for="<?php echo $this->get_field_id('data_small_header'); ?>"><?php _e( 'Hiển thị ảnh bìa nhỏ' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('data_hide_cover'); ?>" name="<?php echo $this->get_field_name('data_hide_cover'); ?>"<?php checked( $data_hide_cover ); ?> />
				<label for="<?php echo $this->get_field_id('data_hide_cover'); ?>"><?php _e( 'Ẩn cmnl ảnh bìa' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('data_container_width'); ?>" name="<?php echo $this->get_field_name('data_container_width'); ?>"<?php checked( $data_container_width ); ?> />
				<label for="<?php echo $this->get_field_id('data_container_width'); ?>"><?php _e( 'Hiển thị rộng bằng khung chứa' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('data_show_facepile'); ?>" name="<?php echo $this->get_field_name('data_show_facepile'); ?>"<?php checked( $data_show_facepile ); ?> />
				<label for="<?php echo $this->get_field_id('data_show_facepile'); ?>"><?php _e( 'Hiển thị ảnh đại diện bạn bè' ); ?></label>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('data_hide_cta'); ?>" name="<?php echo $this->get_field_name('data_hide_cta'); ?>"<?php checked( $data_hide_cta ); ?> />
				<label for="<?php echo $this->get_field_id('data_hide_cta'); ?>"><?php _e( 'Ẩn nút kêu gọi hành động (nếu có)' ); ?></label>
			</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']                = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['data_href']            = ( ! empty( $new_instance['data_href'] ) ) ? strip_tags( $new_instance['data_href'] ) : '';

		$instance['data_tabs']            = ( ! empty( $new_instance['data_tabs'] ) ) ? strip_tags( $new_instance['data_tabs'] ) : '';

		$instance['data_small_header']    = ( ! empty( $new_instance['data_small_header'] ) ) ? 1 : 0;

		$instance['data_container_width'] = ( ! empty( $new_instance['data_container_width'] ) ) ? 1 : 0;

		$instance['data_hide_cover']      = ( ! empty( $new_instance['data_hide_cover'] ) ) ? 1 : 0;

		$instance['data_show_facepile']   = ( ! empty( $new_instance['data_show_facepile'] ) ) ? 1 : 0;

		$instance['data_hide_cta']        = ( ! empty( $new_instance['data_hide_cta'] ) ) ? 1 : 0;

		$instance['data_width']           = ( ! empty( $new_instance['data_width'] ) ) ? absint( $new_instance['data_width'] ) : '';

		$instance['data_height']          = ( ! empty( $new_instance['data_height'] ) ) ? absint( $new_instance['data_height'] ) : '';

		return $instance;
	}
}

