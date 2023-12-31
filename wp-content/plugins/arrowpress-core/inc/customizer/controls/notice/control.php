<?php
namespace ArrowTheme\Customizer\Control;

use ArrowTheme\Customizer\Modules\Base;

defined( 'ABSPATH' ) || exit;

class Notice extends Base {

	public $type = 'arrowpress-notice';

	protected function content_template() {
		?>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<?php
	}
}
