<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 22.04.16
 * Time: 14:36
 */

namespace app\includes\controllers\site;


class TPTabsShortcodeController  extends \app\includes\controllers\site\TPWigetsShortcodesController
{
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        add_shortcode( 'tp_tabs', array(&$this, 'actionTabs'));
        add_shortcode( 'tp_tab', array(&$this, 'actionTab'));
    }

    public function actionTabs($args = array(), $content = null)
    {
        // TODO: Implement action() method.
        $pattern = '
        /
        \{              # { character
            (?:         # non-capturing group
                [^{}]   # anything that is not a { or }
                |       # OR
                (?R)    # recurses the entire pattern
            )*          # previous group zero or more times
        \}              # } character
        /x
        ';
        $output = '';
        $tabs = array();
        $tabs = explode(',', $content);
        $tab_content_out = '';
        $tab_menu_out = '';

        if(count($tabs) > 0) {
            $output .= '<div class="TPTabs">';
            foreach($tabs as $key=>$tab){
               // error_log($tab);
                $do_shortcode = do_shortcode($tab);
                //error_log($do_shortcode);
                //preg_match($pattern, $do_shortcode, $matches);
                //error_log('$matches '.$matches[0]);
                //$tab_out = json_decode($matches[0], true);
                $tab_out = explode('|TPTab|', $do_shortcode);

                //error_log($tab_out['title']);
                $tab_menu_out .= '<li><a href="#TPTabs-'.$key.'">'
                    .$tab_out[0].'</a></li>';
                $tab_content_out .= '<div class="TPTabContent" id="TPTabs-'.$key.'">'.$tab_out[1].'</div>';
            }
            $output .= '<ul class="TPTabsMenu">'.$tab_menu_out.'</ul>';
            $output .= $tab_content_out;
            $output .= '</div>';
        }

        return $output;
    }
    public function actionTab($args = array(), $content = null)
    {
        // TODO: Implement action() method.
        $defaults = array(
            'title' => 'Tabs',
        );
        extract( wp_parse_args( $args, $defaults ), EXTR_SKIP );
        $output = '';
        $output = do_shortcode($content);
        //$json = json_encode(array('title' => $title, 'content' => $output));
        return $title.'|TPTab|'.$output;
    }

    public function render($data)
    {
        // TODO: Implement render() method.
    }

}