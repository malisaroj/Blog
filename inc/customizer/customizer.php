<?php

function ns0014_customize_register($wp_customize)
{
    /* Customizer for Social Icons on header */

    $wp_customize->add_section("icons", array(
        "title" => __("Social Icons", "customizer_icons_sections"),
        "description" => __('Add Social Icons links here'),
        "priority" => 230,
    ));

    $wp_customize->add_setting("url_facebook", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,
        "url_facebook", //setting id
        array(
            "label" => __("Enter Facebook Link Here", "customizer_link_code_label"),
            "section" => "icons",
            "settings" => "url_facebook",
            "type" => "url",
        )

    ));

    $wp_customize->add_setting("url_instagram", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,
        "url_instagram", //setting id
        array(
            "label" => __("Enter Instagram Link Here", "customizer_link_code_label"),
            "section" => "icons",
            "settings" => "url_instagram",
            "type" => "url",
        )

    ));
    
    $wp_customize->add_setting("url_twitter", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,
        "url_twitter", //setting id
        array(
            "label" => __("Enter Twitter Link Here", "customizer_link_code_label"),
            "section" => "icons",
            "settings" => "url_twitter",
            "type" => "url",
        )

    ));

    $wp_customize->add_setting("url_skype", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,
        "url_skype", //setting id
        array(
            "label" => __("Enter Skype Link Here", "customizer_link_code_label"),
            "section" => "icons",
            "settings" => "url_skype",
            "type" => "url",
        )

    ));
    $wp_customize->add_setting("url_vimeo", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_control(new Wp_Customize_Control(
        $wp_customize,
        "url_vimeo", //setting id
        array(
            "label" => __("Enter Vimeo Link Here", "customizer_link_code_label"),
            "section" => "icons",
            "settings" => "url_vimeo",
            "type" => "url",
        )

    ));





    /* Customizer for About Us in Footer */

    $wp_customize->add_section("about", array(
        "title" => __("About Us", "customizer_about_sections"),
        "description" => __('Add About Us details here'),
        "priority" => 220,
    ));

    $wp_customize->add_setting("about_title", array(
        "default" => "",
        "transport" => "refresh",
    ));


    $wp_customize->add_setting("about_description", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("about_image", array(
        "default" => "",
        "transport" => "refresh",
    ));


    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "about_title", //setting id
        array(
            "label" => __("Enter Title here", "customizer_about_code_label"),
            "section" => "about",
            "settings" => "about_title",
            "type" => "text",
        )
    ));


    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "about_description", //setting id
        array(
            "label" => __("Enter Description here", "customizer_about_code_label"),
            "section" => "about",
            "settings" => "about_description",
            "type" => "textarea",
        )
    ));


    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'image_control', array(
        "label" => __("Enter image here", "customizer_about_code_label"),
        'section' => 'about',
        'mime_type' => 'image',
        "settings" => "about_image",

    )));





    /* Customizer for Contacts in Footer */


    $wp_customize->add_section("contacts", array(
        "title" => __("Contacts", "customizer_contacts_sections"),
        "description" => __('Add Contacts here'),
        "priority" => 210,
    ));

    $wp_customize->add_setting("contact_title", array(
        "default" => "",
        "transport" => "refresh",
    ));


    $wp_customize->add_setting("address_code", array(
        "default" => "",
        "transport" => "refresh",
    ));



    $wp_customize->add_setting("phone_code", array(
        "default" => "",
        "transport" => "refresh",
    ));
    
    $wp_customize->add_setting("email_code", array(
        "default" => "",
        "transport" => "refresh",
    ));



    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "contact_title", //setting id
        array(
            "label" => __("Enter Title here", "customizer_about_code_label"),
            "section" => "contacts",
            "settings" => "contact_title",
            "type" => "text",
        )
    ));




    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "address_code", //setting id
        array(
            "label" => __("Enter Address here", "customizer_address_code_label"),
            "section" => "contacts",
            "settings" => "address_code",
            "type" => "text",
        )
    ));


    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "phone_code", //setting id
        array(
            "label" => __("Enter Phone Number here", "customizer_phone_code_label"),
            "section" => "contacts",
            "settings" => "phone_code",
            "type" => "tel",
        )
    ));



    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "email_code", //setting id
        array(
            "label" => __("Enter Email Address here", "customizer_email_code_label"),
            "section" => "contacts",
            "settings" => "email_code",
            "type" => "email",
        )
    ));


        /* Customizer for Newsletter on footer */
        $wp_customize->add_section("newsletter", array(
            "title" => __("Newsletter", "customizer_newsletter_sections"),
            "description" => __('Add Newsletter details here'),
            "priority" => 240,
        ));
    
        $wp_customize->add_setting("newsletter_title", array(
            "default" => "",
            "transport" => "refresh",
        ));

        $wp_customize->add_setting("newsletter_description", array(
            "default" => "",
            "transport" => "refresh",
        ));

        $wp_customize->add_setting("newsletter_action", array(
            "default" => "https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01",
            "transport" => "refresh",
        ));


        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            "newsletter_title", //setting id
            array(
                "label" => __("Enter Title here", "customizer_newsletter_code_label"),
                "section" => "newsletter",
                "settings" => "newsletter_title",
                "type" => "text",
            )
        ));

        
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            "newsletter_description", //setting id
            array(
                "label" => __("Enter Description here", "customizer_newsletter_code_label"),
                "section" => "newsletter",
                "settings" => "newsletter_description",
                "type" => "textarea",
            )
        ));



        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            "newsletter_action", //setting id
            array(
                "label" => __("Enter Action here", "customizer_newsletter_code_label"),
                "section" => "newsletter",
                "settings" => "newsletter_action",
                "type" => "text",
            )
        ));




    $wp_customize->get_setting("contacts_code", array(
        "transport" => "postMessage",
    ));
}

add_action("customize_register", "ns0014_customize_register");
