<?php
/**
 * Klasa nadpisująca Customize_Control
 * Pozwala dodać separator w sekcjach dla lepszej czytelności
 * @package Beer theme
 * */

class Beer_Info extends WP_Customize_Control
{
    public $type='info';
    public $label = '';

    public function render_content()
    {
        ?>
            <h3 style="margin-top: 0px; margin-bottom:0px; border: 1px solid; color: #58719E; text-transform: uppercase;"><?php echo esc_html($this->label)?></h3>
        <?php
    }
}