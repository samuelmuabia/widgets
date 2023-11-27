<?php
class My_Custom_Add_To_Cart_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'my-custom-add-to-cart-widget';
    }

    public function get_title() {
        return 'Custom Add to Cart Widget';
    }

    public function get_icon() {
        return 'eicon-gallery';
    }

    public function get_categories() {
        return ['basic'];
    }
    protected function _register_controls() {
        // Check if WooCommerce is active.
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        if (class_exists('WooCommerce')) {
            // Add product search control.
            $this->add_control(
                'product_search',
                [
                    'label' => __('Product Search', 'my-custom-add-to-cart-widget'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'options' => $this->get_product_options(),
                    'multiple' => false,
                    'placeholder' => __('Search for a product...', 'my-custom-add-to-cart-widget'),
                ]
            );
    
            // Add control for selecting the style
            $this->add_control(
                'select_style',
                [
                    'label' => __('Select Style', 'my-custom-add-to-cart-widget'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'radio' => esc_html__('Radio', 'my-custom-add-to-cart-widget'),
                        'drop-down' => esc_html__('Drop Down', 'my-custom-add-to-cart-widget'),
                    ],
                    'default' => 'radio',
                ]
            );
            $this->add_control(
                'show_quantity',
                [
                    'label' => __('Show Quantity', 'my-custom-add-to-cart-widget'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_off' => esc_html__( 'Hide', 'my-custom-add-to-cart-widget' ),
                    'label_on' => esc_html__( 'Show', 'my-custom-add-to-cart-widget' ),
                    'description' => esc_html__( 'Please note that switching on this option will disable options for choosing quantity', 'my-custom-add-to-cart-widget' ),
                ]
            );
    
            // Add customization options for the "Add to Cart" button.
            $this->add_control(
                'button_text',
                [
                    'label' => __('Button Text', 'my-custom-add-to-cart-widget'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __('Add to Cart', 'my-custom-add-to-cart-widget'),
                ]
            );
    
            $this->end_controls_section();

                $this->start_controls_section(
                    'section_style',
                    [
                        'label' => esc_html__('Button Style', 'my-custom-add-to-cart-widget'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );
            
                $this->add_control(
                    'button_border_radius',
                    [
                        'label' => __('Border Radius', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 50,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'button_padding',
                    [
                        'label' => __('Padding', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'button_text_color',
                    [
                        'label' => __('Text Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button' => 'color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'button_hover_color',
                    [
                        'label' => __('Hover Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'button_background_color',
                    [
                        'label' => __('Background Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'button_hover_background_color',
                    [
                        'label' => __('Hover Background Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .single_add_to_cart_button:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->end_controls_section();
                 // Quantity Input Box Style
                 $this->start_controls_section(
                    'section_quantity_style',
                    [
                        'label' => esc_html__('Quantity Input Box Style', 'my-custom-add-to-cart-widget'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );
            
                $this->add_control(
                    'quantity_input_box_background_color',
                    [
                        'label' => __('Background Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .quantity input' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'quantity_input_box_text_color',
                    [
                        'label' => __('Text Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .quantity input' => 'color: {{VALUE}};',
                        ],
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'quantity_input_box_border',
                        'label' => __('Border', 'my-custom-add-to-cart-widget'),
                        'selector' => '{{WRAPPER}} .quantity input',
                    ]
                );
            
                $this->add_control(
                    'quantity_input_box_border_radius',
                    [
                        'label' => __('Border Radius', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 50,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .quantity input' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'quantity_input_box_box_shadow',
                        'selector' => '{{WRAPPER}} .quantity input',
                    ]
                );
            
                $this->add_control(
                    'quantity_input_box_padding',
                    [
                        'label' => __('Padding', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                            '{{WRAPPER}} .quantity input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
            
                $this->add_control(
                    'quantity_input_box_margin',
                    [
                        'label' => __('Margin', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                            '{{WRAPPER}} .quantity input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
            
                $this->end_controls_section();
            

                // Quantity Text Style
                $this->start_controls_section(
                    'section_quantity_text_style',
                    [
                        'label' => esc_html__('Quantity Text Style', 'my-custom-add-to-cart-widget'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

                $this->add_control(
                    'quantity_text_color',
                    [
                        'label' => __('Text Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .quantity label' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'quantity_text_typography',
                        'selector' => '{{WRAPPER}} .quantity label',
                    ]
                );

                $this->add_control(
                    'quantity_text_margin',
                    [
                        'label' => __('Margin', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%'],
                        'selectors' => [
                            '{{WRAPPER}} .quantity label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_section();

                // Radio Box Style
                $this->start_controls_section(
                    'section_radio_style',
                    [
                        'label' => esc_html__('Radio Box Style', 'my-custom-add-to-cart-widget'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

                $this->add_control(
                    'radio_box_color',
                    [
                        'label' => __('Box Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .variation-style-radio label' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'radio_text_color',
                    [
                        'label' => __('Text Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .variation-style-radio label' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'radio_text_typography',
                        'selector' => '{{WRAPPER}} .variation-style-radio label',
                    ]
                );

                $this->add_control(
                    'radio_box_spacing',
                    [
                        'label' => __('Spacing Between Boxes', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', 'em', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 50,
                            ],
                            'em' => [
                                'min' => 0,
                                'max' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 10,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .variation-style-radio label' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_section();


                // Dropdown Style
                $this->start_controls_section(
                    'section_dropdown_style',
                    [
                        'label' => esc_html__('Dropdown Style', 'my-custom-add-to-cart-widget'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

                $this->add_control(
                    'dropdown_background_color',
                    [
                        'label' => __('Background Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .variations_form select' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'dropdown_text_color',
                    [
                        'label' => __('Text Color', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .variations_form select' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'dropdown_text_typography',
                        'selector' => '{{WRAPPER}} .variations_form select',
                    ]
                );

                $this->add_control(
                    'dropdown_border',
                    [
                        'name' => 'dropdown_border_border',
                        'label' => __('Border', 'my-custom-add-to-cart-widget'),
                        'selector' => '{{WRAPPER}} .variations_form select',
                    ]
                );

                $this->add_control(
                    'dropdown_border_radius',
                    [
                        'label' => __('Border Radius', 'my-custom-add-to-cart-widget'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 50,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .variations_form select' => 'border-radius: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_section();

                            
                        } else {
                            // WooCommerce is not active, show a message.
                            $this->add_control(
                                'no_woocommerce_message',
                                [
                                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                                    'raw' => '<p style="color: red;">WooCommerce is not activated. Please activate WooCommerce to use this widget.</p>',
                                ]
                            );
                        }
                    }
                    

    protected function get_product_options() {
        $products = wc_get_products(['status' => 'publish']);
        $options = [];

        foreach ($products as $product) {
            $options[$product->get_id()] = $product->get_name();
        }

        return $options;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (class_exists('WooCommerce')) {
            $product_id = $settings['product_search'];
            if (!empty($product_id)) {
                $product = wc_get_product($product_id);
                $variableProduct = $product->is_type('variable');

                // Check if it's a variable product
                if ($variableProduct) {
                    $variations = $product->get_available_variations();

                    if (!empty($variations)) {
                        echo '<form class="variations_form cart" action="' . esc_url(wc_get_cart_url()) . '" method="post" enctype="multipart/form-data" data-product_id="' . esc_attr($product_id) . '" data-product_variations="' . htmlspecialchars(json_encode($variations)) . '" current-image="">';
                        if ($settings['select_style'] === 'radio') {
                            // Radio button style
                            echo '<div class="variation-style-radio">';
                            foreach ($variations as $index => $variation) {
                                $attributes = $variation['attributes'];

                                echo '<label class="variation-label">';
                                echo '<input type="radio" id="variation-' . esc_attr($index) . '" name="variation_id" class="variation_id" value="' . esc_attr($variation['variation_id']) . '">';
                                echo '<span class="variation-text">' . esc_html($attributes['attribute_size']) . '</span>';
                                echo '</label>';
                            }
                            echo '</div>';
                        } elseif ($settings['select_style'] === 'drop-down') {
                            // Drop-down style
                            echo '<select id="variation-select" name="variation_id" class="variation_id">';
                            foreach ($variations as $index => $variation) {
                                $attributes = $variation['attributes'];
                                echo '<option value="' . esc_attr($variation['variation_id']) . '">' . esc_html($attributes['attribute_size']) . '</option>';
                            }
                            echo '</select>';
                        }
                        

                        echo '<div class="single_variation_wrap">';
                        echo '<div class="woocommerce-variation single_variation" style="display: none;"></div>';
                        echo '<div class="woocommerce-variation-add-to-cart variations_button">';
                        if($settings["show_quantity"]){
                            echo '<div class="quantity">';
                            echo '<label for="quantity">Quantity - </label>';
                            echo '<input type="number" id="quantity" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="2" min="1" step="1" placeholder="" inputmode="numeric" autocomplete="off">';
                            echo '</div>';
                        };
                    
                        echo '<button type="button" class="single_add_to_cart_button button alt wp-element-button"
                        onclick="validateVariationAndSubmit()">' . esc_html($settings['button_text']) . '</button>';
                        echo '<input type="hidden" name="selected_style" value="' . esc_attr($settings['select_style']) . '">';
                        echo '<input type="hidden" name="add-to-cart" value="' . esc_attr($product_id) . '">';
                        echo '<input type="hidden" name="product_id" value="' . esc_attr($product_id) . '">';
                        echo '</div>';
                        echo '</div>';

                        echo '</form>';

                        // Add JavaScript for validation
                        echo '<script>
                        function validateVariationAndSubmit() {
                            var selectedStyle = document.querySelector(\'input[name="selected_style"]\');
                        
                            if (selectedStyle) {
                                var selectedVariation;
                                
                                if (\'radio\' === selectedStyle.value) {
                                    // For radio buttons
                                    selectedVariation = document.querySelector(\'input[name="variation_id"]:checked\');
                                } else if (\'drop-down\' === selectedStyle.value) {
                                    // For drop-down select
                                    selectedVariation = document.getElementById(\'variation-select\');
                                }
                    
                                if (!selectedVariation || (\'radio\' === selectedStyle.value && !selectedVariation.value)) {
                                    alert("Please select a variation before adding to cart.");
                                } else {
                                    // Add the selected style as a hidden input
                                    document.querySelector(".variations_form").insertAdjacentHTML(\'beforeend\', \'<input type="hidden" name="selected_style" value="\' + selectedStyle.value + \'">\');
                                    
                                    document.querySelector(".variations_form").submit();
                                }
                            } else {
                                alert("Please select a style before adding to cart.");
                            }
                        }
                    </script>';
                    
                    

                    } else {
                        echo '<p>No variations found for this variable product.</p>';
                    }
                } else {
                    // It's a single product, display the "Add to Cart" button
                    echo '<form class="variations_form cart" action="' . esc_url(wc_get_cart_url()) . '" method="post" enctype="multipart/form-data" data-product_id="' . esc_attr($product_id) . '">';
                    echo '<div class="single_variation_wrap">';
                    echo '<div class="woocommerce-variation single_variation" style="display: none;"></div>';
                    echo '<div class="woocommerce-variation-add-to-cart variations_button">';
                    if($settings["show_quantity"]){
                        echo '<div class="quantity">';
                        echo '<label for="quantity">Quantity - </label>';
                        echo '<input type="number" id="quantity" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="2" min="1" step="1" placeholder="" inputmode="numeric" autocomplete="off">';
                        echo '</div>';
                    };
                    echo '<button type="submit" class="single_add_to_cart_button button alt wp-element-button" >' . esc_html($settings['button_text']) . '</button>';
                    echo '<input type="hidden" name="add-to-cart" value="' . esc_attr($product_id) . '">';
                    echo '<input type="hidden" name="product_id" value="' . esc_attr($product_id) . '">';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';

                }
            }
        }
    }  
}
