
 import { __ } from '@wordpress/i18n';
 import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from "@wordpress/block-editor";
 import Edit from "./edit";

 
 registerBlockType('aquila-blocks/dos-and-donts', {
	 title: __('Dos and dont\'s', 'aquila'),
	 icon: 'editor-table',
	 category: 'aquila', // Assurez-vous que la catégorie existe
	 description:__('Add heading and text', 'aquila'),
	 edit:Edit,
	 save() {
		 return(
			 <div className="aquila-dos-and-donts">
				 <InnerBlocks.Content />
			</div>
		 );
	 },
 });

