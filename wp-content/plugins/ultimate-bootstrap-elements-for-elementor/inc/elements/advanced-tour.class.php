<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

class UBE_Element_Advanced_Tour extends UBE_Abstracts_Elements {
	public function get_name() {
		return 'ube-advanced-tour';
	}

	public function get_title() {
		return esc_html__( 'Advanced Tour', 'ube' );
	}

	public function get_ube_icon() {
		return 'eicon-tabs';
	}

	public function get_ube_keywords() {
		return array( 'tour', 'tabs' , 'ube', 'advanced' , 'advanced tour' , 'ube advanced tour' );
	}

	public function get_script_depends() {
		return array( 'ube-widget-tabs' );
	}

	protected function register_controls() {
		$this->section_content();
		$this->section_header_style();
		$this->section_header_items_style();
		$this->section_body_style();
	}

	private function section_content() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Tour', 'ube' ),
			]
		);

		$this->add_control(
			'tab_type',
			[
				'label'   => esc_html__( 'Type', 'ube' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'outline',
				'options' => [
					'classic' => esc_html__( 'Classic', 'ube' ),
					'flat'    => esc_html__( 'Flat', 'ube' ),
					'outline' => esc_html__( 'Outline', 'ube' ),
					'pills'   => esc_html__( 'Pills', 'ube' ),
				],
			]
		);
		$this->add_control(
			'tab_width',
			[
				'label'      => esc_html__( 'Nav Width', 'ube' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 800,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .tabs ' => 'flex-basis: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'tab_align',
			[
				'label'   => esc_html__( 'Tour alignment', 'ube' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left'  => [
						'title' => esc_html__( 'Left', 'ube' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ube' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default' => 'left',
			]
		);
		$this->add_control(
			'tab_shape',
			[
				'label'     => esc_html__( 'Shape', 'ube' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'square',
				'options'   => [
					'round'   => esc_html__( 'Round', 'ube' ),
					'square'  => esc_html__( 'Square', 'ube' ),
					'rounded' => esc_html__( 'Rounded', 'ube' ),
				],
				'condition' => [
					'tab_type' => [ 'flat', 'classic', 'pills' ],
				]
			]
		);
		$this->add_control(
			'tab_enable_spacing',
			[
				'label'        => esc_html__( 'Spacing', 'ube' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'ube' ),
				'label_off'    => esc_html__( 'Hide', 'ube' ),
				'default'      => 'no',
				'return_value' => 'yes',
				'condition'    => [
					'tab_type!' => 'pills'
				]
			]
		);
		$this->add_control(
			'tab_scheme',
			[
				'label'   => esc_html__( 'Scheme', 'ube' ),
				'type'    => Controls_Manager::SELECT,
				'options' => ube_get_color_schemes(),
				'default' => '',
			]
		);


		$this->add_control(
			'tab_title_type_icon',
			[
				'label'        => esc_html__( 'Enable icon', 'ube' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'ube' ),
				'label_off'    => esc_html__( 'Hide', 'ube' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'tab_type!' => 'pills'
				]
			]
		);

		$this->add_control(
			'tab_header_icon_pos_style',
			[
				'label'     => esc_html__( 'Nav Icon Position', 'ube' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left-pos'   => [
						'title' => esc_html__( 'Left', 'ube' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right-pos'  => [
						'title' => esc_html__( 'Right', 'ube' ),
						'icon'  => 'eicon-h-align-right',
					],
					'top-pos'    => [
						'title' => esc_html__( 'Top', 'ube' ),
						'icon'  => 'eicon-v-align-top',
					],
					'bottom-pos' => [
						'title' => esc_html__( 'Bottom', 'ube' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'   => 'left-pos',
				'condition' => [
					'tab_title_type_icon' => 'yes',
					'tab_type!'           => 'pills'
				]
			]
		);
		$this->add_responsive_control(
			'tab_text_align',
			[
				'label'     => esc_html__( 'Title alignment', 'ube' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'ube' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'     => [
						'title' => esc_html__( 'Center', 'ube' ),
						'icon'  => 'eicon-text-align-center',
					],
					'flex-end'   => [
						'title' => esc_html__( 'Right', 'ube' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .ube-tour .tabs .nav-link'          => 'justify-content: {{VALUE}};align-items: {{VALUE}};',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card-title' => 'justify-content: {{VALUE}};align-items: {{VALUE}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'tab_title', [
				'label'       => esc_html__( 'Title', 'ube' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_title_icon_type', [
				'label'       => esc_html__( 'Icon Type', 'ube' ),
				'type'        => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'none'  => [
						'title' => esc_html__( 'None', 'ube' ),
						'icon'  => 'fa fa-ban',
					],
					'icon'  => [
						'title' => esc_html__( 'Icon', 'ube' ),
						'icon'  => 'fa fa-paint-brush',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'ube' ),
						'icon'  => 'fa fa-image',
					],
				],
				'default'     => 'icon',
			]
		);
		$repeater->add_control(
			'tab_title_icons', [
				'label'       => esc_html__( 'Title Icon', 'ube' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-address-book',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'tab_title_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'tab_title_image',
			[
				'label'     => esc_html__( 'Image', 'ube' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'tab_title_icon_type' => 'image'
				]
			]
		);
		$repeater->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'exclude'   => [ 'custom' ],
				'include'   => [],
				'default'   => 'large',
				'condition' => [
					'tab_title_icon_type' => 'image'
				]
			]
		);
		$repeater->add_control(
			'tab_content', [
				'label'       => esc_html__( 'Content', 'ube' ),
				'type'        => UBE_Controls_Manager::WIDGETAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'tab_items',
			[
				'label'       => esc_html__( 'Tab content', 'ube' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ tab_title }}',
				'default'     => [
					[
						'tab_title' => esc_html__( 'WordPress', 'ube' ),
					],
					[
						'tab_title' => esc_html__( 'Prestashop', 'ube' ),
					],
					[
						'tab_title' => esc_html__( 'Joomla!', 'ube' ),
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

	}

	private function section_header_style() {
		// Header setting
		$this->start_controls_section(
			'tab_header_section_setting', [
				'label'     => esc_html__( 'Tabs  ', 'ube' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'tab_type!' => 'pills'
				]
			]
		);
		$this->add_responsive_control(
			'tab_wrapper_background_color',
			[
				'label'      => esc_html__( 'Background Color', 'ube' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .ube-tour-flat .ube-tab-content-container'    => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour-flat .nav-link.active'          => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour-flat .ube-tabs-card.active .ube-tabs-card-header' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour-flat .ube-tabs-card.active .ube-tabs-card-body'   => 'background-color: {{VALUE}}',
				],
				'conditions' => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'tab_type',
							'operator' => 'in',
							'value'    => [ 'flat' ]
						],
						[
							'name'     => 'tab_scheme',
							'operator' => '==',
							'value'    => ''
						]
					]
				]
			]
		);

		$this->add_responsive_control(
			'tab_wrapper_color',
			[
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour-classic .nav-tabs .nav-link.active'            => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-flat .nav-tabs .nav-link'                      => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-classic .tab-content .ube-tabs-card.active .ube-tabs-card-title' => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .ube-tabs-card-body'                                    => 'color: {{VALUE}};',
					'{{WRAPPER}} .ube-tour-flat .tab-content .ube-tabs-card.active .ube-tabs-card-title'    => 'color: {{VALUE}}!important;',
				],
				'condition' => [
					'tab_type' => [ 'flat', 'classic' ],
				]
			]
		);

		$this->add_responsive_control(
			'tab_wrapper_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'ube' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link'                                     => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-item:not(:first-child) .nav-link.active'  => 'margin-top:calc(0{{UNIT}} - {{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .ube-tour-classic .nav-tabs .nav-item:first-child.active'          => 'border-left-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour-classic .tabs'                                           => 'margin-right: calc(0px - {{SIZE}}{{UNIT}} - 1{{UNIT}})',
					'{{WRAPPER}} .ube-tour-classic.ube-tour-square .tabs'                           => 'margin-right: calc(0px - {{SIZE}}{{UNIT}})',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-item .nav-link::before'                   => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-item .nav-link::after'                    => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tab-content-container'                     => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card'                                      => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-header'                  => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-body'                    => 'border-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ube-tour .nav .nav-item.ube-tab-separate:not(:first-child)'               => 'margin-top:calc(0{{UNIT}} - {{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .ube-tour .tab-content.ube-tab-separate .tab-pane:not(:first-child) .ube-tabs-card' => 'margin-top:calc(0{{UNIT}} - {{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'tab_type' => [ 'outline', 'classic' ],
				]
			]
		);
		$this->add_responsive_control(
			'tab_wrapper_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'ube' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link'                            => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour-classic .nav-tabs .nav-item:first-child.active' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-item .nav-link::before'          => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-item .nav-link::after'           => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tab-content-container'            => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card'                             => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-header'         => 'border-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-body'           => 'border-color: {{VALUE}}!important',
				],
				'condition' => [
					'tab_type' => [ 'outline', 'classic', 'underline' ],
				]
			]
		);
		$this->end_controls_section();

	}

	private function section_header_items_style() {
		// Header Items
		$this->start_controls_section(
			'tab_nav_items_section_setting', [
				'label' => esc_html__( 'Title ', 'ube' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'tab_header_title_typography_group',
				'label'    => esc_html__( 'Typography', 'ube' ),
				'selector' =>
					'{{WRAPPER}} .ube-tour .nav-link,.ube-tabs-card-header .ube-tabs-card-title',
			]
		);

		$this->add_responsive_control(
			'simple_tab_title_icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 1,
						'max'  => 100,
						'step' => 5,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .ube-tab-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour .ube-tab-icon svg' => 'max-width: {{SIZE}}{{UNIT}}; height: auto',
				],
				'separator'  => 'before',
				'condition'  => [
					'tab_title_type_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_margin_left',
			[
				'label'      => esc_html__( 'Icon Spacing', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .ube-tab-icon.icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'tab_title_type_icon'       => 'yes',
					'tab_header_icon_pos_style' => 'right-pos',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_margin_right',
			[
				'label'      => esc_html__( 'Icon Spacing', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .ube-tab-icon.icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'tab_title_type_icon'       => 'yes',
					'tab_header_icon_pos_style' => 'left-pos',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_margin_top',
			[
				'label'      => esc_html__( 'Icon Spacing', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .ube-tab-icon.icon-bottom' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'tab_title_type_icon'       => 'yes',
					'tab_header_icon_pos_style' => 'bottom-pos',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_margin_bottom',
			[
				'label'      => esc_html__( 'Icon Spacing', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .ube-tab-icon.icon-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'tab_title_type_icon'       => 'yes',
					'tab_header_icon_pos_style' => 'top-pos',
				],
			]
		);

		$this->add_responsive_control(
			'tab_nav_item_margin_horizontal',
			[
				'label'      => esc_html__( 'Spacing', 'ube' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .nav .nav-item'                                         => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour-pills .tab-content .tab-pane:not(:last-child) .ube-tabs-card'    => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour .tab-content.ube-tab-separate .tab-pane:not(:last-child) .ube-tabs-card' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'terms' => [
								[
									'name'     => 'tab_enable_spacing',
									'operator' => '==',
									'value'    => 'yes'
								],
							]
						],
						[
							'terms' => [
								[
									'name'     => 'tab_type',
									'operator' => '==',
									'value'    => 'pills'
								],
							]
						],
					]
				]
			]
		);

		$this->add_responsive_control(
			'tab_separate_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'ube' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour-left .nav-tabs .nav-item.ube-tab-separate .nav-link'  => 'border-top-left-radius: {{LEFT}}{{UNIT}};border-bottom-left-radius: {{RIGHT}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour-right .nav-tabs .nav-item.ube-tab-separate .nav-link' => 'border-top-right-radius: {{LEFT}}{{UNIT}};border-bottom-right-radius: {{RIGHT}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour .nav-pills .nav-item .nav-link'               => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'terms' => [
								[
									'name'     => 'tab_type',
									'operator' => '==',
									'value'    => 'flat'
								],
								[
									'name'     => 'tab_enable_spacing',
									'operator' => '==',
									'value'    => 'yes'
								],
								[
									'name'     => 'tab_shape',
									'operator' => '!=',
									'value'    => 'square'
								]
							]
						],
						[
							'terms' => [
								[
									'name'     => 'tab_type',
									'operator' => '==',
									'value'    => 'pills'
								],
								[
									'name'     => 'tab_shape',
									'operator' => '!=',
									'value'    => 'square'
								],
							]
						]
					]
				]
			]
		);

		$this->add_responsive_control(
			'tab_nav_padding',
			[
				'label'      => esc_html__( 'Padding', 'ube' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .nav .nav-link'            => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'tab_header_style_tabs_normal'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ube' ),
			]
		);
		$this->add_responsive_control(
			'tab_title_color',
			[
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link:not(.active):not(:hover)'                               => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .nav .nav-link:not(.active):not(:hover)'                              => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:not(:hover) .ube-tabs-card-title'       => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:not(:hover) .ube-tabs-card-title' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_responsive_control(
			'tab_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-link:not(.active):not(:hover) .ube-tab-icon'               => 'color: {{VALUE}};',
					'{{WRAPPER}} .ube-tour .ube-tabs-card:not(.active) .ube-tabs-card-header:not(:hover) .ube-tab-icon'      => 'color: {{VALUE}};',
					'{{WRAPPER}} .ube-tour .nav-link:not(.active):not(:hover) .ube-tab-icon path'          => 'stroke: {{VALUE}}; fill: {{value}}',
					'{{WRAPPER}} .ube-tour .ube-tabs-card:not(.active) .ube-tabs-card-header:not(:hover) .ube-tab-icon path' => 'stroke: {{VALUE}}; fill: {{value}}'
				],
				'condition' => [
					'tab_title_type_icon' => 'yes',
				],

			]
		);

		$this->add_responsive_control(
			'tab_title_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav .nav-link:not(.active):not(:hover)'             => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:not(:hover)' => 'background-color: {{VALUE}}!important',
				],
				'condition' => [
					'tab_type' => [ 'flat', 'classic','pills' ],
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_header_style_tabs_hover',
			[
				'label' => esc_html__( 'Hover', 'ube' ),
			]
		);
		$this->add_responsive_control(
			'tab_hover_title_color',
			[
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link:not(.active):hover'                               => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .nav .nav-link:not(.active):hover'                              => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:hover .ube-tabs-card-title'       => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:hover .ube-tabs-card-title' => 'color: {{VALUE}}!important;',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_color_hover',
			[
				'label'     => esc_html__( 'Icon Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link:not(.active):hover .ube-tab-icon'                  => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:hover .ube-tab-icon'      => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link:not(.active):hover .ube-tab-icon path'             => 'stroke: {{VALUE}}; fill: {{value}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:hover .ube-tab-icon path' => 'stroke: {{VALUE}}; fill: {{value}}'
				],
				'condition' => [
					'tab_title_type_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'tab_title_background_color_hover',
			[
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link:not(.active):hover'             => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour .nav-pills .nav-link:not(.active):hover'            => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card:not(.active) .ube-tabs-card-header:hover' => 'background-color: {{VALUE}}!important',
				],
				'condition' => [
					'tab_type' => [ 'flat', 'classic', 'outline' ],
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_header_style_tabs_active',
			[
				'label' => esc_html__( 'Active', 'ube' ),
			]
		);
		$this->add_responsive_control(
			'tab_active_title_color',
			[
				'label'     => esc_html__( 'Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link.active'                  => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .nav .nav-link.active'                 => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-title'       => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .tab-content .ube-tabs-card.active .ube-tabs-card-title' => 'color: {{VALUE}}!important;',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_color_active',
			[
				'label'     => esc_html__( 'Icon Color', 'ube' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link.active .ube-tab-icon'      => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tab-icon'       => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link.active .ube-tab-icon path' => 'stroke: {{VALUE}}; fill: {{value}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tab-icon path'  => 'stroke: {{VALUE}}; fill: {{value}}'
				],
				'condition' => [
					'tab_title_type_icon' => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'tab_title_background_color_active',
			[
				'label'     => esc_html__( 'Background Color', 'ube' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ube-tour .nav-tabs .nav-link.active'                   => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .nav-pills .nav-link.active'                  => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-header'       => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .ube-tour-pills .nav .nav-link.active'                  => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .ube-tour-pills .tab-content .ube-tabs-card.active .ube-tabs-card-header' => 'background-color: {{VALUE}}!important',
				],
				'condition' => [
					'tab_type' => [ 'flat', 'classic', 'pills' ],
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	private function section_body_style() {
		//Body Style Section

		$this->start_controls_section(
			'tab_section_body_style', [
				'label' => esc_html__( 'Content', 'ube' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'tab_body_bg_group',
			[
				'label'      => esc_html__( 'Background Color', 'ube' ),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .tab-content'                         => 'background-color: transparent!important',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tab-content-container'  => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card.active .ube-tabs-card-body' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'tab_type',
							'operator' => 'in',
							'value'    => [ 'flat' ]
						],
						[
							'name'     => 'tab_scheme',
							'operator' => '==',
							'value'    => ''
						]
					]
				]
			]
		);
		$this->add_responsive_control(
			'tab_body_padding',
			[
				'label'      => esc_html__( 'Padding', 'ube' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ube-tour .tab-content .ube-tabs-card .ube-tabs-card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		ube_get_template( 'elements/adv-tour.php', array(
			'element' => $this
		) );
	}
}