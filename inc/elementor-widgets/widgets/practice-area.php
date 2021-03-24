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
 * Applab elementor parctice area widget.
 *
 * @since 1.0
 */
class Applab_Practice_Area extends Widget_Base {

	public function get_name() {
		return 'applab-practice-area';
	}

	public function get_title() {
		return __( 'Practice Area', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  practice area content ------------------------------
		$this->start_controls_section(
			'practice_area_content',
			[
				'label' => __( 'Practice Area content', 'applab-companion' ),
			]
        );

        $this->add_control(
            'big_title',
            [
                'label' => esc_html__( 'Big Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Practice Area', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Many variations of passages of Lorem Ipsum available, but the majority have <br> suffered alteration in some.',
            ]
        );
        $this->add_control(
            'practice_items_separator',
            [
                'label' => esc_html__( 'Practice Items', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
		$this->add_control(
            'practice_items', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_bg_img',
                        'label' => __( 'Item BG Image', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Item Icon', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'default'     => 'flaticon-case',
                        'options'     => applab_themify_icon(),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Business Law', 'applab-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'There are many variations of passages of <br> Lorem Ipsum available, <br> but the majority have suffered',
                    ],
                    [
                        'name' => 'btn_text',
                        'label' => __( 'Anchor Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Learn More', 'applab-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Anchor URL', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [     
                        'item_bg_img'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'  => 'flaticon-case',
                        'item_title' => __( 'Business Law', 'applab-companion' ),
                        'item_text'  => 'There are many variations of passages of <br> Lorem Ipsum available, <br> but the majority have suffered',
                        'btn_text'     => __( 'Learn More', 'applab-companion' ),
                        'btn_url'     => [
                            'url'      => '#'
                        ],
                    ],
                    [     
                        'item_bg_img'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'  => 'flaticon-courthouse',
                        'item_title' => __( 'Finance Law', 'applab-companion' ),
                        'item_text'  => 'There are many variations of passages of <br> Lorem Ipsum available, <br> but the majority have suffered',
                        'btn_text'     => __( 'Learn More', 'applab-companion' ),
                        'btn_url'     => [
                            'url'      => '#'
                        ],
                    ],
                    [     
                        'item_bg_img'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'  => 'flaticon-judge',
                        'item_title' => __( 'Family Law', 'applab-companion' ),
                        'item_text'  => 'There are many variations of passages of <br> Lorem Ipsum available, <br> but the majority have suffered',
                        'btn_text'     => __( 'Learn More', 'applab-companion' ),
                        'btn_url'     => [
                            'url'      => '#'
                        ],
                    ],
                    [     
                        'item_bg_img'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'  => 'flaticon-jury',
                        'item_title' => __( 'Education Law', 'applab-companion' ),
                        'item_text'  => 'There are many variations of passages of <br> Lorem Ipsum available, <br> but the majority have suffered',
                        'btn_text'     => __( 'Learn More', 'applab-companion' ),
                        'btn_url'     => [
                            'url'      => '#'
                        ],
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

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
            'sec_bg_col', [
                'label' => __( 'Section Bg Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_mid_bg_col', [
                'label' => __( 'Middle Section Bg Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .col-xl-4:nth-child(2) .single_service' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Service Item Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_icon_col', [
                'label' => __( 'Icon Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .single_service .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_title_col', [
                'label' => __( 'Title Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .single_service h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_txt_col', [
                'label' => __( 'Text Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .single_service p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'button_col', [
                'label' => __( 'Button Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .single_service .boxed-btn3-white' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
                    '{{WRAPPER}} .service_area .single_service .boxed-btn3-white:hover' => 'background: {{VALUE}}; border-color: transparent;',
                ],
            ]
        );
        $this->add_control(
            'singl_item_btn_hover_styles_seperator',
            [
                'label' => esc_html__( 'Button Hover Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'button_hover_col', [
                'label' => __( 'Button Hover Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .single_service .boxed-btn3-white:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $big_title = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $practice_items = !empty( $settings['practice_items'] ) ? $settings['practice_items'] : '';
    ?>

    <!-- practice_area_start -->
    <div class="practice_area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-60">
                    <?php 
                        if ( $big_title ) { 
                            echo '<h3>'.$big_title.'</h3>';
                        }
                        if ( $sub_title ) { 
                            echo '<p>'.wp_kses_post( nl2br( $sub_title ) ).'</p>';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <?php 
                if( is_array( $practice_items ) && count( $practice_items ) > 0 ) {
                    foreach( $practice_items as $item ) {
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_bg_img  = !empty( $item['item_bg_img']['id'] ) ? wp_get_attachment_image( $item['item_bg_img']['id'], 'applab_practice_thumb_448x500', '', array('alt' => $item_title . ' image' ) ) : '';
                        $item_icon  = ( !empty( $item['item_icon'] ) ) ? $item['item_icon'] : '';
                        $item_text  = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        $btn_text      = ( !empty( $item['btn_text'] ) ) ? $item['btn_text'] : '';
                        $btn_url      = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';
                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="single_practice">
                                <div class="practice_image">
                                    <?php 
                                        if ( $item_bg_img ) { 
                                            echo $item_bg_img;
                                        }
                                    ?>
                                </div>
                                <div class="practice_hover text-center">
                                    <div class="hover_inner">
                                        <?php 
                                            if ( $item_icon ) { 
                                                echo '<i class="'.esc_attr($item_icon).'"></i>';
                                            }
                                            if ( $item_title ) { 
                                                echo '<h3>'.$item_title.'</h3>';
                                            }
                                            if ( $item_text ) { 
                                                echo '<p>'.wp_kses_post( nl2br( $item_text ) ).'</p>';
                                            }
                                            if ( $btn_text ) { 
                                                echo '<a href="'.esc_url($btn_url).'" class="lern_more">'.esc_html( $btn_text ).'</a>';
                                            }
                                        ?>
                                    </div>
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