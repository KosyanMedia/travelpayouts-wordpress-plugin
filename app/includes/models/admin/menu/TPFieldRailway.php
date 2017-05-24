<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 24.05.17
 * Time: 14:34
 */

namespace app\includes\models\admin\menu;
use \app\includes\TPPlugin;
use \app\includes\common\TPLang;

class TPFieldRailway {
	public function TPFieldThemesTable(){
		?>
		<input class="TPThemesNameHidden" type="hidden"
		       name="<?php echo TPOPlUGIN_OPTION_NAME;?>[themes_table_railway][name]"
		       value="<?php echo TPPlugin::$options['themes_table_railway']['name']?>"/>
		<?php
	}
}