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
 * Applab elementor facilities section widget.
 *
 * @since 1.0
 */
class Applab_Facilities extends Widget_Base {

	public function get_name() {
		return 'applab-facilities';
	}

	public function get_title() {
		return __( 'App Facilities', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Facilities content ------------------------------
		$this->start_controls_section(
			'facilities_content',
			[
				'label' => __( 'Facilities content', 'applab-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Save your time to <br>using applab',
            ]
        );

        $this->add_control(
            'facilities_settings_seperator',
            [
                'label' => esc_html__( 'Facilities', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'facilities', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default'     => 'facility-icon-1',
                        'options' => applab_themify_icon()
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => 'Manage team in <br> One Place',
                    ],
                ],
                'default'   => [
                    [      
                        'item_icon'    => 'facility-icon-2',
                        'item_title'   => 'Manage team in <br> One Place',
                    ],
                    [      
                        'item_icon'    => 'facility-icon-1',
                        'item_title'   => 'All-powerful Pointing <br> has no control',
                    ],
                    [      
                        'item_icon'    => 'facility-icon-3',
                        'item_title'   => 'Establish a solid online <br> presence',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End facilities content

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
    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $facilities = !empty( $settings['facilities'] ) ? $settings['facilities'] : '';
    ?>

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $facilities ) && count( $facilities ) > 0 ) {
                    foreach( $facilities as $item ) {
                        $item_icon = ( !empty( $item['item_icon'] ) ) ? APPLAB_DIR_ICON_IMG_URI . $item['item_icon'] : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_service text-center wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".4s">
                                <div class="thumb">
                                    <?php 
                                        if ( $item_icon ) { 
                                            echo '<img src="'.esc_url( $item_icon . '.svg' ).'" alt="facility icon">';
                                        }
                                    ?>
                                </div>
                                <?php 
                                    if ( $item_title ) { 
                                        echo '<h3>'.wp_kses_post( nl2br( $item_title ) ).'</h3>';
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
    <!-- service_area_end -->
    <?php
    }
}