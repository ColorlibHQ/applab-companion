<?php
namespace Applabelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Applab elementor business expert section widget.
 *
 * @since 1.0
 */
class Applab_Business_Expert extends Widget_Base {

	public function get_name() {
		return 'applab-business-expert';
	}

	public function get_title() {
		return __( 'Business Expert', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Business Expert content ------------------------------
		$this->start_controls_section(
			'business_expert_content',
			[
				'label' => __( 'Business Expert content', 'applab-companion' ),
			]
        );
		$this->add_control(
            'tab_content', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ tab_title }}}',
                'fields' => [
                    [
                        'name' => 'tab_title',
                        'label' => __( 'Tab Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Excellent Services', 'applab-companion' ),
                    ],
                    [
                        'name' => 'template_id',
                        'label' => __( 'Select Elementor Template', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => get_elementor_templates(),
                        'default' => array_key_first( get_elementor_templates() ),
                    ],
                ],
                'default'   => [
                    [      
                        'tab_title' => __( 'Excellent Services', 'applab-companion' ),
                    ],
                    [      
                        'tab_title' => __( 'Qualified Doctors', 'applab-companion' ),
                    ],
                    [      
                        'tab_title' => __( 'Emergency Departments', 'applab-companion' ),
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
            'label' => __( 'Style Business Expert Section', 'applab-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'section_head_bg_col', [
            'label' => __( 'Section Head Bg Color', 'applab-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .business_expert_area .business_tabs_area' => 'background: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'tab_content_styles_separator', [
            'label' => __( 'Tab Content Styles', 'applab-companion' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after'
        ]
    );
    $this->add_control(
        'icon_col', [
            'label' => __( 'Icon Color', 'applab-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .business_expert_area .business_info .icon i' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'icon_bg_col', [
            'label' => __( 'Icon Bg Color', 'applab-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .business_expert_area .business_info .icon i' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'title_col', [
            'label' => __( 'Title Color', 'applab-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .business_expert_area .business_info h3' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'text_col', [
            'label' => __( 'Text Color', 'applab-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .business_expert_area .business_info p' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $tab_items = !empty( $settings['tab_content'] ) ? $settings['tab_content'] : '';
    ?>

    <!-- business_expert_area_start  -->
    <div class="business_expert_area">
        <div class="business_tabs_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <?php
                                $i=1;
                                foreach( $tab_items as $item ) {
                                    $tab_id       = esc_attr( $item['_id'] );
                                    $tab_title    = esc_html( $item['tab_title'] );
                                    $active_class = esc_attr($i == 1 ? ' active' : '');
                                    $selected_val = esc_attr($i == 1 ? 'true' : 'false');
                                    ?>
                                    <li class="nav-item">
                                        <a 
                                            class="nav-link<?=$active_class?>" 
                                            id="<?=$tab_id?>-tab" data-toggle="tab"
                                            href="#<?=$tab_id?>" role="tab" 
                                            aria-controls="<?=$tab_id?>"
                                            aria-selected="<?=$selected_val?>">
                                            <?=$tab_title?>
                                        </a>
                                    </li>
                                    <?php
                                    $i++;
                                }
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <?php
                        $i=1;
                        foreach( $tab_items as $item ) {
                            $tab_id       = esc_attr( $item['_id'] );
                            $template_id  = absint( $item['template_id'] );
                            $active_class = esc_attr($i == 1 ? ' show active' : '');
                            ?>
                            <div class="tab-pane fade<?=$active_class?>" id="<?=$tab_id?>" role="tabpanel" aria-labelledby="<?=$tab_id?>-tab">
                                <?php
                                    echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
                                ?>
                            </div>
                            <?php
                            $i++;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->
    <?php
    }
}