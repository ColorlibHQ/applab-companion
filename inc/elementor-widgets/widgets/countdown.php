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
 * Applab elementor Countdown section widget.
 *
 * @since 1.0
 */
class Applab_Countdown extends Widget_Base {

	public function get_name() {
		return 'applab-countdown';
	}

	public function get_title() {
		return __( 'Countdown', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Countdown content ------------------------------
        $this->start_controls_section(
            'countdown_content',
            [
                'label' => __( 'Countdown Settings', 'applab-companion' ),
            ]
        );
		$this->add_control(
            'counters', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ counter_label }}}',
                'fields' => [
                    [
                        'name' => 'counter_val',
                        'label' => __( 'Counter Value', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '520', 'applab-companion' ),
                    ],
                    [
                        'name' => 'counter_suffix',
                        'label' => __( 'Counter Suffix', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '+', 'applab-companion' ),
                    ],
                    [
                        'name' => 'counter_label',
                        'label' => __( 'Counter Label', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Total Projects', 'applab-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'counter_val'    => __( '520', 'applab-companion' ),
                        'counter_suffix' => __( '+', 'applab-companion' ),
                        'counter_label'  => __( 'Total Projects', 'applab-companion' ),
                    ],
                    [      
                        'counter_val'    => __( '244', 'applab-companion' ),
                        'counter_suffix' => __( '', 'applab-companion' ),
                        'counter_label'  => __( 'On Going Projects', 'applab-companion' ),
                    ],
                    [      
                        'counter_val'    => __( '95', 'applab-companion' ),
                        'counter_suffix' => __( '%', 'applab-companion' ),
                        'counter_label'  => __( 'Job Success', 'applab-companion' ),
                    ],
                ],
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

    // call load widget script
    $this->load_widget_script(); 

    $settings = $this->get_settings();      
    $counters = !empty( $settings['counters'] ) ? $settings['counters'] : '';
    ?>
    
    <!-- counter  -->
    <div class="counter_area">
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $counters ) && count( $counters ) > 0 ) {
                    foreach( $counters as $item ) {
                        $counter_val = ( !empty( $item['counter_val'] ) ) ? $item['counter_val'] : '';
                        $counter_suffix = ( !empty( $item['counter_suffix'] ) ) ? '<span>'.$item['counter_suffix'].'</span>' : '';
                        $counter_label = ( !empty( $item['counter_label'] ) ) ? $item['counter_label'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_counter text-center">
                                <!-- <h3> <span class="counter">520</span> <span>+</span> </h3>
                                <span>Total Projects</span> -->

                                <?php 
                                    if ( $counter_val ) { 
                                        echo '<h3> <span class="counter">'.esc_html( $counter_val ).'</span> '.wp_kses_post( $counter_suffix ).' </h3>';
                                    }
                                    if ( $counter_label ) { 
                                        echo '<span>'.esc_html( $counter_label ).'</span> ';
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
    <!-- counter end -->
    <?php
    }
    
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // counter 
            $('.counter').counterUp({
              delay: 10,
              time: 10000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}