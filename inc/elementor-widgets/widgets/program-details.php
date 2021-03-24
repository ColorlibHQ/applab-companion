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
 * Applab elementor program details section widget.
 *
 * @since 1.0
 */
class Applab_Program_Details extends Widget_Base {

	public function get_name() {
		return 'applab-program-details';
	}

	public function get_title() {
		return __( 'Program Details', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Program Details content ------------------------------
        $this->start_controls_section(
            'program_details_content',
            [
                'label' => __( 'Program Details Settings', 'applab-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Program. Details', 'applab-companion' ),
            ]
        );
        
		$this->add_control(
            'events', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'time',
                        'label' => __( 'Time', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '16.00', 'applab-companion' ),
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Wedding Ceremony', 'applab-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some content of a page when looking at its layout.', 'applab-companion' ),
                    ],
                    [
                        'name' => 'bg_img',
                        'label' => __( 'BG Image', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'time'            => __( '16.00', 'applab-companion' ),
                        'title'           => __( 'Wedding Ceremony', 'applab-companion' ),
                        'text'            => __( 'Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some content of a page when looking at its layout.', 'applab-companion' ),
                        'bg_img'          => [
                            'url'         => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'time'            => __( '20.00', 'applab-companion' ),
                        'title'           => __( 'Lunch Time', 'applab-companion' ),
                        'text'            => __( 'Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some content of a page when looking at its layout.', 'applab-companion' ),
                        'bg_img'          => [
                            'url'         => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'time'            => __( '22.00', 'applab-companion' ),
                        'title'           => __( 'Party Time', 'applab-companion' ),
                        'text'            => __( 'Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some content of a page when looking at its layout.', 'applab-companion' ),
                        'bg_img'          => [
                            'url'         => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End left content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'applab-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Icon Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info ul li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info .boxed-btn3-white-2' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info .boxed-btn3-white-2:hover' => 'background: {{VALUE}} !important; border-color: transparent',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_col', [
                'label' => __( 'Button Hover Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_applab_area .welcome_applab_info .boxed-btn3-white-2:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

    }


	protected function render() {
    $settings        = $this->get_settings(); 
    $sec_title       = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $events          = !empty( $settings['events'] ) ? $settings['events'] : '';
    $section_img     = APPLAB_DIR_IMGS_URI . 'flowers.png';
    $ornaments_img   = APPLAB_DIR_IMGS_URI . 'ornaments.png';
    ?>

    <!-- program_details -->
    <div class="program_details_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center">
                        <?php 
                            echo '<img src="'.esc_url($section_img).'" alt="flowers image">';
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html($sec_title).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $events ) && count( $events ) > 0 ){
                    foreach ( $events as $event ) {
                        $time    = !empty( $event['time'] ) ? $event['time'] : '';
                        $title   = !empty( $event['title'] ) ? $event['title'] : '';
                        $text    = !empty( $event['text'] ) ? $event['text'] : '';
                        $bg_img  = !empty( $event['bg_img']['url'] ) ? $event['bg_img']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-lg-4">
                            <div class="single_program text-center" <?php echo applab_inline_bg_img( esc_url( $bg_img ) ); ?>>
                                <div class="program_inner ">
                                    <?php 
                                        if ( $time ) { 
                                            echo '<span>'.esc_html($time).'</span>';
                                        }
                                        if ( $title ) { 
                                            echo '<h3>'.esc_html($title).'</h3>';
                                        }
                                        if ( $text ) { 
                                            echo '<p>'.wp_kses_post($text).'</p>';
                                        }
                                    ?>
                                    <?php 
                                        echo '<img src="'.esc_url($ornaments_img).'" alt="ornaments image">';
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
    <!--/ program_details -->
    <?php
    }
}