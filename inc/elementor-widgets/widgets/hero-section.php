<?php
namespace Applabelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Applab elementor hero section widget.
 *
 * @since 1.0
 */
class Applab_Hero extends Widget_Base {

	public function get_name() {
		return 'applab-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'applab-companion' ),
			]
        );
        
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'applab-companion' ),
                'description' => esc_html__( 'Best size is 1920x900', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'big_text',
            [
                'label' => esc_html__( 'Big Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Promote your app <br>with applab',
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Get more users to promote your app with this template', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Get Start Now', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'applab-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        $this->add_control(
            'phone_img',
            [
                'label' => esc_html__( 'Phone Image', 'applab-companion' ),
                'description' => esc_html__( 'Best size is 464x680', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'applab-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Title Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'button_section_separator',
            [
                'label'     => __( 'Button Styles', 'applab-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
			'button_col', [
				'label' => __( 'Button Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3' => 'color: {{VALUE}} !important',
				],
			]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg_color',
                'label' => __( 'Button BG Color', 'applab-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3',
            ]
        );

        $this->add_control(
            'button_hover_section_separator',
            [
                'label'     => __( 'Button Hover Styles', 'applab-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3:hover' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'button_hover_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3:hover' => 'background: {{VALUE}};',
				],
			]
        );

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings    = $this->get_settings();
    $bg_img      = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : ''; 
    $big_text    = !empty( $settings['big_text'] ) ? $settings['big_text'] : ''; 
    $sub_title   = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : ''; 
    $btn_label   = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : ''; 
    $btn_url     = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : ''; 
    $phone_img   = !empty( $settings['phone_img']['id'] ) ? wp_get_attachment_image( $settings['phone_img']['id'], 'applab_hero_right_thumb_464x680', '', array( 'alt' => 'hero phone image' ) ) : '';
    ?>
    
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center" <?php echo applab_inline_bg_img( esc_url( $bg_img ) ); ?>>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <?php 
                                if ( $big_text ) { 
                                    echo '<h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">'.wp_kses_post( nl2br( $big_text ) ).'</h3>';
                                }
                                if ( $sub_title ) { 
                                    echo '<p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">'.esc_html( $sub_title ).'</p>';
                                }
                                if ( $btn_label ) { 
                                    echo '<div class="video_service_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s"><a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_label ).'</a></div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                            <?php 
                                if ( $phone_img ) { 
                                    echo $phone_img;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    } 
}