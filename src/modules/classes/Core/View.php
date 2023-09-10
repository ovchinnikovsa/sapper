<?php

namespace View;

class View
{
    static $template_root = __DIR__ . '../../../view/';
    static $template_show_modal_js = 'show_modal'; // todo берет элемент выше себя с class modal

    public static function page(string $page_name) : void {
        self::showBlock('header');
        self::showPage($page_name);
        self::showBlock('footer');
    }

    public function modal(string $modal) : void {
        self::showTemplate($modal);
        self::showTemplate(self::$template_show_modal_js);
    }

    protected static function showTemplate(string $template_name) : void {
        // todo change to buffer input
        require self::$template_root . '/templates/' . $template_name . '.php';
    }

    protected static function showBlock(string $block_name) : void {
        // todo change to buffer input
        require self::$template_root . '/blocks/' . $block_name . '.php';
    }

    protected static function showPage(string $page_name) : void {
        // todo change to buffer input
        require self::$template_root . '/page/' . $page_name . '.php';
    }
}
