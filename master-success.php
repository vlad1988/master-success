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
    $form.="<input type='text'  placeholder='Ваше Имя'/>";
    $form.="<input type='email'  placeholder='Ваш E-mail'/>";
    $form.="<input type='submit' id='add-share-btn' value='Получить доступ'/>";
    $form.="</form>";
    echo $form;
}

function master_success_form() {
    html_form_code();
}

register_activation_hook(__FILE__, 'master_success_form');
