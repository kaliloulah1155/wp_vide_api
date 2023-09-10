
 import { __ } from '@wordpress/i18n';
 import { registerBlockType } from '@wordpress/blocks';
 import {RichText} from "@wordpress/block-editor";
 import Edit from "./edit";
 

 registerBlockType('aquila-blocks/heading', {
	 title: __('Heading with Icon', 'aquila'),
	 icon: 'admin-customizer',
	 category: 'aquila', // Assurez-vous que la catégorie existe
	 description:__('Add heading and select icon', 'aquila'),
	 example: {},
	 attributes:{
		 option:{
			type:'string',
			default:'dos'
		 },
		 content:{
			type:'string',
			source:'html',
			selector:'h4',
			default:__('Dos','aquila')
		 }
	 },
	 edit:Edit,
	 save({attributes:{content}}) {
		
		 return(
			 <div className="aquila-icon-heading">
				 <span className="aquila-icon-heading__heading" />
		 		    <RichText.Content tagName="h4" value={content} />
				</div>
		 );
	 },
 });

