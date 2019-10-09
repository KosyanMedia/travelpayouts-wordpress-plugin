<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.04.17
 * Time: 18:03
 */

namespace app\includes\common;


class TPThemes
{
    public static function getThemesTables(){
        return [
            [
                'name' => 'default-theme',
                'title' => _x('Default Theme',
                    'tp admin menu page flight tickets tab themes theme name default_theme', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'default-theme.png'
            ],
            [
                'name' => 'red-button-table',
                'title' => _x('Red Button Light Theme',
                    'tp admin menu page flight tickets tab themes theme name red_button_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'red-button-table.png'
            ],
            [
                'name' => 'blue-table',
                'title' => _x('Blue Button Light Theme',
                    'tp admin menu page flight tickets tab themes theme name blue_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'blue-table.png'
            ],
            [
                'name' => 'grey-salad-table',
                'title' => _x('Salad Button Light Theme',
                    'tp admin menu page flight tickets tab themes theme name grey_salad_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'grey-salad-table.png'
            ],
            [
                'name' => 'purple-table',
                'title' => _x('Purple Header Light Theme',
                    'tp admin menu page flight tickets tab themes theme name purple_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'purple-table.png'
            ],
            [
                'name' => 'black-and-yellow-table',
                'title' => _x('Yellow Button Dark Theme',
                    'tp admin menu page flight tickets tab themes theme name black_and_yellow_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'black-and-yellow-table.png'
            ],
            [
                'name' => 'dark-and-rainbow',
                'title' => _x('Coral Button Dark Theme',
                    'tp admin menu page flight tickets tab themes theme name dark_and_rainbow', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'dark-and-rainbow.png'
            ],
            [
                'name' => 'light-and-plum-table',
                'title' => _x('Light Theme with Plum Search Column',
                    'tp admin menu page flight tickets tab themes theme name light_and_plum_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'light-and-plum-table.png'
            ],
            [
                'name' => 'light-yellow-and-darkgray',
                'title' => _x('Light Theme with Dark Search Column',
                    'tp admin menu page flight tickets tab themes theme name light_yellow_and_darkgray', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'light-yellow-and-darkgray.png'
            ],
            [
                'name' => 'mint-table',
                'title' => _x('Mint Button Light Theme',
                    'tp admin menu page flight tickets tab themes theme name mint_table', TPOPlUGIN_TEXTDOMAIN ),
                'screenshot' => 'mint-table.png'
            ]
        ];
    }
}
