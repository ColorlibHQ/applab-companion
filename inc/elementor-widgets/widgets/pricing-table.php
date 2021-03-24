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
 * Applab Pricing Table Contents section widget.
 *
 * @since 1.0
 */
class Applab_Pricing_Contents extends Widget_Base {

	public function get_name() {
		return 'applab-pricing-contents';
	}

	public function get_title() {
		return __( 'Pricing Contents', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Pricing contents  ------------------------------
		$this->start_controls_section(
			'pricing_content',
			[
				'label' => __( 'Pricing Contents', 'applab-companion' ),
			]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Unlock full Power', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br> tempor incididunt.',
            ]
        );
		$this->add_control(
            'pricing', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ pack_name }}}',
                'fields' => [
                    [
                        'name' => 'pack_name',
                        'label' => __( 'Package Name', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Basic', 'applab-companion' ),
                    ],
                    [
                        'name' => 'pack_price',
                        'label' => __( 'Package Price', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$06', 'applab-companion' ),
                    ],
                    [
                        'name' => 'fet_1',
                        'label' => __( 'Feature 1', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'One User', 'applab-companion' ),
                    ],
                    [
                        'name' => 'fet_2',
                        'label' => __( 'Feature 2', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '1000 ui elements', 'applab-companion' ),
                    ],
                    [
                        'name' => 'fet_3',
                        'label' => __( 'Feature 3', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Webmail Support', 'applab-companion' ),
                    ],
                    [
                        'name' => 'fet_4',
                        'label' => __( 'Feature 4', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '100GB Cloud Storage', 'applab-companion' ),
                    ],
                    [
                        'name' => 'fet_5',
                        'label' => __( 'Feature 5', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Unlimited Users Limit', 'applab-companion' ),
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Get Now', 'applab-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'pack_name'       => __( 'Basic', 'applab-companion' ),
                        'pack_price'      => __( '$06', 'applab-companion' ),
                        'fet_1'           => __( 'One User', 'applab-companion' ),
                        'fet_2'           => __( '1000 ui elements', 'applab-companion' ),
                        'fet_3'           => __( 'Webmail Support', 'applab-companion' ),
                        'fet_4'           => __( '100GB Cloud Storage', 'applab-companion' ),
                        'fet_5'           => '',
                        'btn_label'       => __( 'Get Now', 'applab-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
                    [
                        'pack_name'       => __( 'Team', 'applab-companion' ),
                        'pack_price'      => __( '$16', 'applab-companion' ),
                        'fet_1'           => __( '10 Users', 'applab-companion' ),
                        'fet_2'           => __( '10000 ui elements', 'applab-companion' ),
                        'fet_3'           => __( 'Webmail Support', 'applab-companion' ),
                        'fet_4'           => __( '1000GB Cloud Storage', 'applab-companion' ),
                        'fet_5'           => __( 'Unlimited Users Limit', 'applab-companion' ),
                        'btn_label'       => __( 'Get Now', 'applab-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
                    [
                        'pack_name'       => __( 'Business', 'applab-companion' ),
                        'pack_price'      => __( '$26', 'applab-companion' ),
                        'fet_1'           => __( 'Unlimited User', 'applab-companion' ),
                        'fet_2'           => __( '100000 ui elements', 'applab-companion' ),
                        'fet_3'           => __( 'Webmail Support', 'applab-companion' ),
                        'fet_4'           => __( '10000GB Cloud Storage', 'applab-companion' ),
                        'fet_5'           => '',
                        'btn_label'       => __( 'Get Now', 'applab-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
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
                'label' => __( 'Style Client Section', 'applab-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rev_txt_col', [
                'label' => __( 'Review Text Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_desig_col', [
                'label' => __( 'Reviewer Designation Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $pricing  = !empty( $settings['pricing'] ) ? $settings['pricing'] : '';
    ?>

    <!-- prising_area  -->
    <div class="prising_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                            if ( $sub_title ) { 
                                echo '<p>'.wp_kses_post( nl2br( $sub_title ) ).'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row no-gutters align-items-center">
                <?php
                $i = 0;
                if( is_array( $pricing ) && count( $pricing ) > 0 ){
                    foreach ( $pricing as $item ) {
                        $i++;
                        $pack_name = !empty( $item['pack_name'] ) ? $item['pack_name'] : '';
                        $pack_price = !empty( $item['pack_price'] ) ? $item['pack_price'] : '';
                        $fet_1 = !empty( $item['fet_1'] ) ? $item['fet_1'] : '';
                        $fet_2 = !empty( $item['fet_2'] ) ? $item['fet_2'] : '';
                        $fet_3 = !empty( $item['fet_3'] ) ? $item['fet_3'] : '';
                        $fet_4 = !empty( $item['fet_4'] ) ? $item['fet_4'] : '';
                        $fet_5 = !empty( $item['fet_5'] ) ? $item['fet_5'] : '';
                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
                        $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_prising text-center wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".8s">
                                <div class="prising_header d-flex justify-content-between<?=($i==2)?' pink_header':($i==3?' green_header':'')?>">
                                    <?php 
                                        if ( $pack_name ) { 
                                            echo '<h3>'.esc_html( $pack_name ).'</h3>';
                                        }
                                        if ( $pack_price ) { 
                                            echo '<span>'.esc_html( $pack_price ).'</span>';
                                        }
                                    ?>
                                </div>
                                <ul>
                                    <?php 
                                        if ( $fet_1 ) { 
                                            echo '<li>'.esc_html( $fet_1 ).'</li>';
                                        }
                                        if ( $fet_2 ) { 
                                            echo '<li>'.esc_html( $fet_2 ).'</li>';
                                        }
                                        if ( $fet_3 ) { 
                                            echo '<li>'.esc_html( $fet_3 ).'</li>';
                                        }
                                        if ( $fet_4 ) { 
                                            echo '<li>'.esc_html( $fet_4 ).'</li>';
                                        }
                                        if ( $fet_5 ) { 
                                            echo '<li>'.esc_html( $fet_5 ).'</li>';
                                        }
                                    ?>
                                </ul>
                                <div class="prising_bottom">
                                    <?php 
                                        if ( $btn_label ) { 
                                            echo '<a href="'.esc_url( $btn_url ).'" class="get_now prising_btn">'.esc_html( $btn_label ).'</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php

    }	
}
