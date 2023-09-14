/**
 * Register block styles
 */
import {registerBlockStyle,unregisterBlockStyle} from '@wordpress/blocks'
import { __ } from '@wordpress/i18n';

const layoutStyleButton=[
    {
        name:'layout-border-blue-fill',
        label: __('Blue outline','aquila')
    },
    {
        name:'layout-border-white-no-fill',
        label: __('White outline - to be used with dark background','aquila')
    }
];

/**
 * Quote Block styles.
 *
 * @type {Array}
 */
const layoutStyleQuote = [
    {
        name: 'layout-dark-background',
        label: __('Layout style dark background', 'aquila'),
    },
];

const register = ()=>{
    layoutStyleQuote.forEach((layoutStyle) =>
        registerBlockStyle('core/quote', layoutStyle)
    );
    layoutStyleButton.forEach(layoutStyle=>registerBlockStyle('core/button',layoutStyle))
}

const deRegister=()=>{
    unregisterBlockStyle('core/quote','large');
    unregisterBlockStyle('core/button', 'outline');
}

/**
 * Register styles on domReady
 */
wp.domReady(()=>{
    deRegister();
    register();
})