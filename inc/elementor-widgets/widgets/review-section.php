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
 * Applab Review Contents section widget.
 *
 * @since 1.0
 */
class Applab_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'applab-review-contents';
	}

	public function get_title() {
		return __( 'Review Contents', 'applab-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'applab-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Review Contents', 'applab-companion' ),
			]
        );

        $this->add_control(
            'sec_bg',
            [
                'label' => esc_html__( 'Section Bg Image', 'applab-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        
		$this->add_control(
            'reviews', [
                'label' => __( 'Create New', 'applab-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ reviewer_name }}}',
                'fields' => [
                    [
                        'name' => 'sec_title',
                        'label' => __( 'Section Title', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Review from our <br> regular users'
                    ],
                    [
                        'name' => 'review_txt',
                        'label' => __( 'Review Text', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br> tempor incididunt labore et dolore magna aliqua <br> quis ipsum suspendisse ultrices.'
                    ],
                    [
                        'name' => 'review_stars',
                        'label' => __( 'Review Stars', 'applab-companion' ),
                        'type' => Controls_Manager::CHOOSE,
                        'default' => '5',
                        'options' => [
                            '1' => [
                                'title' => '1',
                                'icon' => 'fa fa-star-o',
                            ],
                            '2' => [
                                'title' => '2',
                                'icon' => 'fa fa-star-o',
                            ],
                            '3' => [
                                'title' => '3',
                                'icon' => 'fa fa-star-o',
                            ],
                            '4' => [
                                'title' => '4',
                                'icon' => 'fa fa-star-o',
                            ],
                            '5' => [
                                'title' => '5',
                                'icon' => 'fa fa-star-o',
                            ],
                        ],
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Client Name', 'applab-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '- Robert Smile', 'applab-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'sec_title'            => 'Review from our <br> regular users',
                        'review_txt'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br> tempor incididunt labore et dolore magna aliqua <br> quis ipsum suspendisse ultrices.',
                        'review_stars'         => '5',
                        'reviewer_name'         => __( '- Robert Smile', 'applab-companion' ),
                    ],
                    [
                        'sec_title'            => 'Review from our <br> regular users',
                        'review_txt'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br> tempor incididunt labore et dolore magna aliqua <br> quis ipsum suspendisse ultrices.',
                        'review_stars'         => '5',
                        'reviewer_name'         => __( '- John Doe', 'applab-companion' ),
                    ],
                    [
                        'sec_title'            => 'Review from our <br> regular users',
                        'review_txt'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br> tempor incididunt labore et dolore magna aliqua <br> quis ipsum suspendisse ultrices.',
                        'review_stars'         => '5',
                        'reviewer_name'         => __( '- Jonathan Doe', 'applab-companion' ),
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
                'label' => __( 'Style Review Section', 'applab-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_overlay_col', [
                'label' => __( 'Section Overlay Color', 'applab-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testmonial.overlay2::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_text_col', [
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
                    '{{WRAPPER}} .testmonial_area .testmonial_info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings       = $this->get_settings();
    $sec_bg         = !empty( $settings['sec_bg']['url'] ) ? $settings['sec_bg']['url'] : '';
    $reviews        = !empty( $settings['reviews'] ) ? $settings['reviews'] : '';
    ?>

    <!-- testmonial_area  -->
    <div class="testmonial_area" <?php echo applab_inline_bg_img( esc_url( $sec_bg ) ); ?>>
        <div class="container">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <?php
                    if( is_array( $reviews ) && count( $reviews ) > 0 ){
                        foreach ( $reviews as $review ) {
                            $sec_title    = !empty( $review['sec_title'] ) ? $review['sec_title'] : '';
                            $review_txt    = !empty( $review['review_txt'] ) ? $review['review_txt'] : '';
                            $review_stars = !empty( $review['review_stars'] ) ? $review['review_stars'] : '';
                            $reviewer_name = !empty( $review['reviewer_name'] ) ? $review['reviewer_name'] : '';
                            $client_img = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'applab_testimonial_author_thumb_35x35', '', array( 'alt' => $reviewer_name. ' image' ) ) : '';
                            ?>
                            <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                                <div class="section_title">
                                    <?php 
                                        if ( $sec_title ) { 
                                            echo '<h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>';
                                        }
                                    ?>
                                </div>
                                <?php 
                                    if ( $review_txt ) { 
                                        echo '<p>'.wp_kses_post( nl2br( $review_txt ) ).'</p>';
                                    }
                                ?>
                                <div class="rating_author">
                                    <?php 
                                        for ( $i = 0; $i < $review_stars; $i++ ) { 
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                        if ( $reviewer_name ) { 
                                            echo '<span>'.esc_html( $reviewer_name ).'</span>';
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
    <!-- testmonial_area_end  -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:false
                },
                1200:{
                    items:1,
                    nav:false
                },
                1500:{
                    items:1
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
