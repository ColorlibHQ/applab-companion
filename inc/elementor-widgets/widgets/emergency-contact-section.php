<?php
namespace Applabelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Applab elementor emergency-contact section section widget.
 *
 * @since 1.0
 */
class Applab_Emergency_Contact_Section extends Widget_Base {

	public function get_name() {
		return 'applab-emergency-contact-section';
	}

	public function get_title() {
		return __( 'Emergency Contact Section', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Emergency Contact Section ------------------------------
        $this->start_controls_section(
            'emergency_contact_section_content',
            [
                'label' => __( 'Emergency Contact Section', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'emergency_contact_settings_seperator',
            [
                'label' => esc_html__( 'Emergency Contact Section', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'ec_bg_img',
            [
                'label' => esc_html__( 'BG Image', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'ec_title',
            [
                'label' => esc_html__( 'Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'For Any Emergency Contact', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'ec_text',
            [
                'label' => esc_html__( 'Text', 'applab-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Esteem spirit temper too say adieus.', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'ec_btn_label',
            [
                'label' => esc_html__( 'Button Label', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '+10 378 4673 467', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'ec_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'applab-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );


        $this->add_control(
            'online_appointment_settings_seperator',
            [
                'label' => esc_html__( 'Online Appointment Section', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'oa_bg_img',
            [
                'label' => esc_html__( 'BG Image', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'oa_title',
            [
                'label' => esc_html__( 'Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make an Online Appointment', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'oa_text',
            [
                'label' => esc_html__( 'Text', 'applab-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Esteem spirit temper too say adieus.', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'oa_btn_label',
            [
                'label' => esc_html__( 'Button Label', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make an Appointment', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'oa_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'applab-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End emergency_contact_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'applab-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'button_col', [
				'label' => __( 'Button Text & Border Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'color: {{VALUE}} !important; border-color: transparent;',
				],
			]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Bg Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'overlay_color_styles_seperator',
            [
                'label' => esc_html__( 'Overlay Color Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Bg Overlay Color', 'applab-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency.overlay_skyblue::before' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $ec_title = !empty( $settings['ec_title'] ) ? $settings['ec_title'] : '';
    $ec_bg_img    = !empty( $settings['ec_bg_img']['url'] ) ? $settings['ec_bg_img']['url'] : '';
    $ec_text = !empty( $settings['ec_text'] ) ? $settings['ec_text'] : '';
    $ec_btn_label = !empty( $settings['ec_btn_label'] ) ? $settings['ec_btn_label'] : '';
    $ec_btn_url   = !empty( $settings['ec_btn_url']['url'] ) ? $settings['ec_btn_url']['url'] : '';
    $oa_title = !empty( $settings['oa_title'] ) ? $settings['oa_title'] : '';
    $oa_bg_img    = !empty( $settings['oa_bg_img']['url'] ) ? $settings['oa_bg_img']['url'] : '';
    $oa_text = !empty( $settings['oa_text'] ) ? $settings['oa_text'] : '';
    $oa_btn_label = !empty( $settings['oa_btn_label'] ) ? $settings['oa_btn_label'] : '';
    $oa_btn_url   = !empty( $settings['oa_btn_url']['url'] ) ? $settings['oa_btn_url']['url'] : '';
    ?>

    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center overlay_skyblue" <?php echo applab_inline_bg_img( esc_url( $ec_bg_img ) ); ?>>
                        <div class="info">
                            <?php 
                                if ( $ec_title ) { 
                                    echo '<h3>'.esc_html($ec_title).'</h3>';
                                }
                                if ( $ec_text ) { 
                                    echo '<p>'.esc_html($ec_text).'</p>';
                                }
                            ?>
                        </div>
                        <?php 
                            if ( $ec_btn_label ) { 
                                echo 
                                '<div class="info_button">
                                    <a href="'.esc_url($ec_btn_url).'" class="boxed-btn3-white">'.esc_html( $ec_btn_label ).'</a>
                                </div>';
                            }
                        ?>                        
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center overlay_skyblue" <?php echo applab_inline_bg_img( esc_url( $oa_bg_img ) ); ?>>
                        <div class="info">
                            <?php 
                                if ( $oa_title ) { 
                                    echo '<h3>'.esc_html($oa_title).'</h3>';
                                }
                                if ( $oa_text ) { 
                                    echo '<p>'.esc_html($oa_text).'</p>';
                                }
                            ?>
                        </div>
                        <?php 
                            if ( $oa_btn_label ) { 
                                echo 
                                '<div class="info_button">
                                    <a href="'.esc_url($oa_btn_url).'" class="boxed-btn3-white">'.esc_html( $oa_btn_label ).'</a>
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
    <?php

    }
}
