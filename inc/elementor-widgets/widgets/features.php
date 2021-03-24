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
 * Applab elementor features section widget.
 *
 * @since 1.0
 */
class Applab_Features extends Widget_Base {

	public function get_name() {
		return 'applab-features';
	}

	public function get_title() {
		return __( 'App Features', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  features content ------------------------------
		$this->start_controls_section(
			'features_content',
			[
				'label' => __( 'Features content', 'applab-companion' ),
			]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'applab-companion' ),
                'description' => esc_html__( 'Best size is 372x655', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'right_img',
            [
                'label' => esc_html__( 'Right Image', 'applab-companion' ),
                'description' => esc_html__( 'Best size is 561x707', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'features_settings_seperator',
            [
                'label' => esc_html__( 'Features', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'features', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Sign Up for free', 'applab-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Short Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'applab-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_title'    => __( 'Sign Up for free', 'applab-companion' ),
                        'item_text'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'applab-companion' ),
                    ],
                    [      
                        'item_title'    => __( 'Make your profile', 'applab-companion' ),
                        'item_text'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'applab-companion' ),
                    ],
                    [      
                        'item_title'    => __( 'Enjoy the app', 'applab-companion' ),
                        'item_text'   => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'applab-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End features content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'applab-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .doctors_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_bg_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Bg Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_bg_color', [
                'label' => __( 'Bg Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_member_bg_color', [
                'label' => __( 'Item Hover Bg Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert:hover .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $left_img  = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'applab_service_man_thumb_372x655', '', array( 'alt' => 'left image' ) ) : '';
    $right_img = !empty( $settings['right_img']['id'] ) ? wp_get_attachment_image( $settings['right_img']['id'], 'applab_service_right_thumb_561x707', '', array( 'alt' => 'right image' ) ) : '';
    $features  = !empty( $settings['features'] ) ? $settings['features'] : '';
    $i = 0;
    ?>

    <!-- service_area_2  -->
    <div class="service_area_2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration=".4s" data-wow-delay=".5s">
                    <div class="man_thumb">
                        <?php 
                            if ( $left_img ) { 
                                echo $left_img;
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-6 ">
                    <div class="mobile_screen wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".5s">
                        <?php 
                            if ( $right_img ) { 
                                echo $right_img;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="service_content_wrap">
                <div class="row">
                    <?php 
                    if( is_array( $features ) && count( $features ) > 0 ) {
                        foreach( $features as $item ) {
                            $i++;
                            $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                            $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                            ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="single_service  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                                    <span>0<?=$i?></span>
                                    <?php 
                                        if ( $item_title ) { 
                                            echo '<h3>'.wp_kses_post( nl2br( $item_title ) ).'</h3>';
                                        }
                                        if ( $item_text ) { 
                                            echo '<p>'.wp_kses_post( nl2br( $item_text ) ).'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_2_end  -->
    <?php
    }
}