<?php
namespace Applabelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Applab elementor business expert tab items section widget.
 *
 * @since 1.0
 */
class Applab_Business_Expert_Tab_Items extends Widget_Base {

	public function get_name() {
		return 'applab-business-expert-tab-items';
	}

	public function get_title() {
		return __( 'Business Expert Tab Items', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Business Expert tab content ------------------------------
		$this->start_controls_section(
			'core_feature_tab_content',
			[
				'label' => __( 'Business Expert Tab Item', 'applab-companion' ),
			]
        );

		$this->add_control(
            'feature_items', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'business_img',
                        'label' => __( 'Business Image', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Leading edge care for Your family', 'applab-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Esteem spirit temper too say adieus who direct esteem. It esteems luckily picture placing drawing. Apartments frequently or motionless on reasonable projecting expression.', 'applab-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'business_img'  => [
                            'url' => Utils::get_placeholder_image_src()
                        ],
                        'item_title' => __( 'Leading edge care for Your family', 'applab-companion' ),
                        'item_text'  => __( 'Esteem spirit temper too say adieus who direct esteem. It esteems luckily picture placing drawing. Apartments frequently or motionless on reasonable projecting expression.', 'applab-companion' ),
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End service content

	}

	protected function render() {
    $settings      = $this->get_settings();
    $feature_items = !empty( $settings['feature_items'] ) ? $settings['feature_items'] : '';

    // echo '<div class="row">';
    if( is_array( $feature_items ) && count( $feature_items ) > 0 ) {
        foreach( $feature_items as $item ) {
            $item_title   = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
            $item_text    = ( !empty( $item['item_text'] ) ) ? esc_html($item['item_text']) : '';
            $business_img = !empty( $item['business_img']['id'] ) ? wp_get_attachment_image( $item['business_img']['id'], 'applab_business_expert_thumb_558x330', '', array('alt' => $item_title . ' image' ) ) : '';
            ?>
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="business_info">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <?php
                            if ( $item_title ) { 
                                echo "<h3>{$item_title}</h3>";
                            }
                            if ( $item_text ) { 
                                echo "<p>{$item_text}</p>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <?php
                        echo '<div class="business_thumb">';
                            if ( $business_img ) { 
                                echo $business_img;
                            }
                        echo '</div>';
                    ?>
                </div>
            </div>
            <?php
        }
    }
    // echo '</div>';
    }
}