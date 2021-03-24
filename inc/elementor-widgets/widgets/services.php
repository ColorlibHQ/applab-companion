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
 * Applab elementor service section widget.
 *
 * @since 1.0
 */
class Applab_Services extends Widget_Base {

	public function get_name() {
		return 'applab-service';
	}

	public function get_title() {
		return __( 'Services', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Services content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'applab-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'applab-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Explore Our Solutions', 'applab-companion' ),
            ]
        );

        $this->add_control(
            'service_settings_seperator',
            [
                'label' => esc_html__( 'Services', 'applab-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'bg_img',
                        'label' => __( 'BG Image', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default'     => 'legal-paper',
                        'options' => applab_themify_icon()
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Invoicing', 'applab-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'These cases are perfectly simple and easy to distinguish. In a free hour power.', 'applab-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'bg_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'    => 'legal-paper',
                        'item_title'   => __( 'Invoicing', 'applab-companion' ),
                        'item_text'    => __( 'These cases are perfectly simple and easy to distinguish. In a free hour power.', 'applab-companion' ),
                    ],
                    [      
                        'bg_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'    => 'case',
                        'item_title'   => __( 'Business Growth', 'applab-companion' ),
                        'item_text'    => __( 'These cases are perfectly simple and easy to distinguish. In a free hour power.', 'applab-companion' ),
                    ],
                    [      
                        'bg_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_icon'    => 'survey',
                        'item_title'   => __( 'Problem Solving', 'applab-companion' ),
                        'item_text'    => __( 'These cases are perfectly simple and easy to distinguish. In a free hour power.', 'applab-companion' ),
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
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>
    
    <!-- service_area_start -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-50">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $services ) && count( $services ) > 0 ) {
                    foreach( $services as $item ) {
                        $bg_img = ( !empty( $item['bg_img']['url'] ) ) ? $item['bg_img']['url'] : '';
                        $item_icon = ( !empty( $item['item_icon'] ) ) ? APPLAB_DIR_ICON_IMG_URI . $item['item_icon'] : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_service" <?php echo applab_inline_bg_img( esc_url( $bg_img ) ); ?>>
                                <div class="service_hover">
                                    <?php 
                                        if ( $item_icon ) { 
                                            echo '<img src="'.esc_attr( $item_icon ).'.svg" alt="'.esc_attr( $item_icon ).'">';
                                        }
                                        if ( $item_title ) { 
                                            echo '<h3>'.esc_html( $item_title ).'</h3>';
                                        }
                                    ?>
                                    <div class="hover_content">
                                        <div class="hover_content_inner">
                                            <?php 
                                                if ( $item_title ) { 
                                                    echo '<h4>'.esc_html( $item_title ).'</h4>';
                                                }
                                                if ( $item_text ) { 
                                                    echo '<p>'.wp_kses_post( $item_text ).'</p>';
                                                }
                                            ?>
                                        </div>
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