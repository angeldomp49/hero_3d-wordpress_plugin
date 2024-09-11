<?php
namespace MakechTech\Software;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class Hero3DSection extends Widget_Base{

    public function get_name(){
        return "makechtech-hero3d-section";
    }

    public function get_title(){
        return "Hero3D Section";
    }

    protected function register_controls(){

        global $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL;

        $this->start_controls_section("Hero3D Configuration",[
            "tab" => Controls_Manager::TAB_CONTENT,
            "label" => esc_html("Configuration", "makechtech_hero_3d_section"),
        ]);

        $this->add_control("background_image",[
            "type" => Controls_Manager::MEDIA,
            "label" => esc_html__( "Background Image", "makechtech_hero_3d_section" ),
            "default" => [
                "url" => $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL . "/assets/images/rectangle6.png"
            ]
        ]);
        $this->add_control("title",[
            "type" => Controls_Manager::TEXT,
            "label" => esc_html__( "Title", "makechtech_hero_3d_section" ),
            "placeholder" => esc_html__( "Amazing promotions", "makechtech_hero_3d_section" ),
        ]);
        $this->add_control("text",[
            "type" => Controls_Manager::TEXT,
            "label" => esc_html__( "Text", "makechtech_hero_3d_section" ),
            "placeholder" => esc_html__( "In selected products, find many discounts using a promo code", "makechtech_hero_3d_section" ),
        ]);
        $this->add_control("button_text",[
            "type" => Controls_Manager::TEXT,
            "label" => esc_html__( "Button Text", "makechtech_hero_3d_section" ),
            "placeholder" => esc_html__( "Go to promo", "makechtech_hero_3d_section" ),
        ]);
        $this->add_control("button_link",[
            "type" => Controls_Manager::TEXT,
            "label" => esc_html__( "Button Link", "makechtech_hero_3d_section" ),
            "placeholder" => esc_html__( "#", "makechtech_hero_3d_section" ),
        ]);

        $this->end_controls_section();

    }

    protected function render(){
        $settings = $this->get_settings_for_display();

        ?>
            <cube-hero-section
                id="root"
                data-background-image="<?php echo($settings["background_image"]["url"]) ?>"
            >
                <div class="hero-underlay hero-layer">
                    <h1 id="hero-title1" class="hero-title"><?php echo($settings["title"]) ?></h1>
                    <p id="hero-text1" class="hero-text">
                        <?php echo($settings["text"]) ?>
                    </p>
                </div>
                <div class="hero-overlay hero-layer">
                    <div class="empty-space" style="height: 20rem;"></div>
                    <div class="hero-button-wrapper">
                        <a href="<?php echo($settings["button_link"]) ?>" id="cta" class="hero-button"><?php echo($settings["button_text"]) ?></a>
                    </div>
                </div>
            </cube-hero-section>
        <?php
    }

    protected function content_template(){
        ?>
            <cube-hero-section
                id="root"
                data-background-image="{{settings.background_image.url}}"
            >
                <div class="hero-underlay hero-layer">
                    <h1 id="hero-title1" class="hero-title">{{ settings.title }}</h1>
                    <p id="hero-text1" class="hero-text">
                        {{ settings.text }}
                    </p>
                </div>
                <div class="hero-overlay hero-layer">
                    <div class="empty-space" style="height: 20rem;"></div>
                    <div class="hero-button-wrapper">
                        <a href="{{ settings.button_link }}" id="cta" class="hero-button">{{ settings.button_text }}</a>
                    </div>
                </div>
            </cube-hero-section>
        <?php
    }

}