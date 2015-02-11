<?php

/*
  Plugin Name: Contact Plugin Form for Master Success Site
  Plugin URI: http://www.kovalevaolga.com/
  Description: Simple non-bloated WordPress Contact Form
  Version: 1.0
  Author: Vladyslav Tertyshnyi
  Author URI: http://brainstorage.me/vladislafus
 */

function html_form_code() {
    $form = "";
    $form.="<form action='" . esc_url($_SERVER['REQUEST_URI']) . "' method='post'>";
    $form.="<input type='text' name='ms-name' value='" . ( isset($_POST["ms-name"]) ? esc_attr($_POST["ms-name"]) : '' ) . "'  placeholder='Ваше Имя'/>";
    $form.="<input type='email' name='ms-email' value='" . ( isset($_POST["ms-email"]) ? esc_attr($_POST["ms-email"]) : '' ) . "'  placeholder='Ваш E-mail'/>";
    $form.="<input name='ms-submit' type='submit' id='add-share-btn' value='Получить доступ'/>";
    $form.="</form>";
    echo $form;
}

function deliver_email() {
    if (isset($_POST['ms-submit'])) {
        $name = sanitize_text_field($_POST["ms-name"]);
        $email =sanitize_email( $_POST["ms-email"]);
        $to = get_option('admin_email');
        if( wp_mail( $to, $name, $email )){
            echo '<div>';
            echo '<p>В ближайшее время мы с Вами свяжемся</p>';
            echo '</div>';
        }else {
            echo "Данные внесены неправильно...";
        }
//        $to = 'vladislafus@gmail.com';
//        $subject = 'the subject';
//        $message = 'hello';
//        $headers = 'From: webmaster@example.com' . "\r\n" .
//                'Reply-To: webmaster@example.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
    }
}

function master_success_form() {
    html_form_code();
    deliver_email();
}

register_activation_hook(__FILE__, 'master_success_form');
