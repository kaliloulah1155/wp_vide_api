/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/gutenberg/block-extensions/register-blocks-styles.js":
/*!****************************************************************************!*\
  !*** ./assets/src/js/gutenberg/block-extensions/register-blocks-styles.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Register block styles
 */


var layoutStyleButton = [{
  name: 'layout-border-blue-fill',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Blue outline', 'aquila')
}, {
  name: 'layout-border-white-no-fill',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('White outline - to be used with dark background', 'aquila')
}];

/**
 * Quote Block styles.
 *
 * @type {Array}
 */
var layoutStyleQuote = [{
  name: 'layout-dark-background',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Layout style dark background', 'aquila')
}];
var register = function register() {
  layoutStyleQuote.forEach(function (layoutStyle) {
    return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockStyle)('core/quote', layoutStyle);
  });
  layoutStyleButton.forEach(function (layoutStyle) {
    return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockStyle)('core/button', layoutStyle);
  });
};
var deRegister = function deRegister() {
  (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.unregisterBlockStyle)('core/quote', 'large');
  (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.unregisterBlockStyle)('core/button', 'outline');
};

/**
 * Register styles on domReady
 */
wp.domReady(function () {
  deRegister();
  register();
});

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/dos-and-donts/edit.js":
/*!**************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/dos-and-donts/edit.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _templates__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./templates */ "./assets/src/js/gutenberg/blocks/dos-and-donts/templates.js");
/**
 * Internal Dependencies.
 */



/**
 * WordPress Dependencies.
 */



var ALLOWED_BLOCKS = ['core/group'];
var INNER_BLOCK_TEMPLATE = [['core/group', {
  className: 'aquila-dos-and-donts__group',
  backgroundColor: 'cyan - bluish - gray'
}, _templates__WEBPACK_IMPORTED_MODULE_3__.blockColumns]];
var Edit = function Edit() {
  return /*#__PURE__*/React.createElement("div", {
    className: "aquila-dos-and-donts"
  }, /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.InnerBlocks, {
    allowedBlocks: ALLOWED_BLOCKS,
    template: INNER_BLOCK_TEMPLATE,
    templateLock: true
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Edit);

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/dos-and-donts/index.js":
/*!***************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/dos-and-donts/index.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./assets/src/js/gutenberg/blocks/dos-and-donts/edit.js");




(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('aquila-blocks/dos-and-donts', {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Dos and dont\'s', 'aquila'),
  icon: 'editor-table',
  category: 'aquila',
  // Assurez-vous que la catégorie existe
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Add heading and text', 'aquila'),
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"],
  save: function save() {
    return /*#__PURE__*/React.createElement("div", {
      className: "aquila-dos-and-donts"
    }, /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null));
  }
});

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/dos-and-donts/templates.js":
/*!*******************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/dos-and-donts/templates.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   blockColumns: () => (/* binding */ blockColumns)
/* harmony export */ });
var getBlockColumn = function getBlockColumn(optionVal, colClassName, Heading) {
  return ['core/column', {
    className: colClassName
  }, [['aquila-blocks/heading', {
    className: 'aquila-dos-and-donts__heading',
    option: optionVal,
    content: Heading
  }], ['core/list', {
    className: 'aquila-dos-and-donts__list'
  }]]];
};
var blockColumns = [['core/columns', {
  className: 'aquila-dos-and-donts__cols'
}, [getBlockColumn('dos', 'aquila-dos-and-donts__col-one', 'Dos'), getBlockColumn('donts', 'aquila-dos-and-donts__col-two', 'Dont\'s')]]];

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/heading-with-icon/edit.js":
/*!******************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/heading-with-icon/edit.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _icons_map__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./icons-map */ "./assets/src/js/gutenberg/blocks/heading-with-icon/icons-map.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Internal Dependencies.
 */



/**
 * WordPress Dependencies.
 */



var Edit = function Edit(_ref) {
  var className = _ref.className,
    attributes = _ref.attributes,
    setAttributes = _ref.setAttributes;
  var option = attributes.option,
    content = attributes.content;
  var HeadingIcon = (0,_icons_map__WEBPACK_IMPORTED_MODULE_0__.getIconComponent)(option);
  return /*#__PURE__*/React.createElement("div", {
    className: "aquila-icon-heading"
  }, /*#__PURE__*/React.createElement("span", {
    className: "aquila-icon-heading__heading"
  }, /*#__PURE__*/React.createElement(HeadingIcon, null)), /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {
    tagName: "h4" // The tag here is the element output and editable in the admin
    ,
    className: className,
    value: content // Any existing content, either from the database or an attribute default
    ,
    onChange: function onChange(content) {
      return setAttributes({
        content: content
      });
    } // Store updated content as a block attribute
    ,
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Heading...', 'aquila') // Display this text before any content has been added by the user
  }), /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Block Settings', 'aquila')
  }, /*#__PURE__*/React.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RadioControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Select the icon', 'aquila'),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Controls icon selection', 'aquila'),
    selected: option,
    options: [{
      label: 'Dos',
      value: 'dos'
    }, {
      label: 'Dont\'s',
      value: 'donts'
    }],
    onChange: function onChange(option) {
      setAttributes({
        option: option
      });
    }
  }))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Edit);

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/heading-with-icon/icons-map.js":
/*!***********************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/heading-with-icon/icons-map.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getIconComponent: () => (/* binding */ getIconComponent)
/* harmony export */ });
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _icons_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../icons/index */ "./assets/src/js/icons/index.js");


var getIconComponent = function getIconComponent(option) {
  var IconsMap = {
    dos: _icons_index__WEBPACK_IMPORTED_MODULE_1__.Check,
    donts: _icons_index__WEBPACK_IMPORTED_MODULE_1__.Cross
  };
  return !(0,lodash__WEBPACK_IMPORTED_MODULE_0__.isEmpty)(option) && option in IconsMap ? IconsMap[option] : IconsMap['dos'];
};

/***/ }),

/***/ "./assets/src/js/gutenberg/blocks/heading-with-icon/index.js":
/*!*******************************************************************!*\
  !*** ./assets/src/js/gutenberg/blocks/heading-with-icon/index.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./edit */ "./assets/src/js/gutenberg/blocks/heading-with-icon/edit.js");
/* harmony import */ var _icons_map__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./icons-map */ "./assets/src/js/gutenberg/blocks/heading-with-icon/icons-map.js");





(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('aquila-blocks/heading', {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Heading with Icon', 'aquila'),
  icon: 'admin-customizer',
  category: 'aquila',
  // Assurez-vous que la catégorie existe
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Add heading and select icon', 'aquila'),
  example: {},
  attributes: {
    option: {
      type: 'string',
      default: 'dos'
    },
    content: {
      type: 'string',
      source: 'html',
      selector: 'h4',
      default: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Dos', 'aquila')
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"],
  save: function save(_ref) {
    var _ref$attributes = _ref.attributes,
      option = _ref$attributes.option,
      content = _ref$attributes.content;
    var HeadingIcon = (0,_icons_map__WEBPACK_IMPORTED_MODULE_4__.getIconComponent)(option);
    return /*#__PURE__*/React.createElement("div", {
      className: "aquila-icon-heading"
    }, /*#__PURE__*/React.createElement("span", {
      className: "aquila-icon-heading__heading"
    }, /*#__PURE__*/React.createElement(HeadingIcon, null)), /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      tagName: "h4",
      value: content
    }));
  }
});

/***/ }),

/***/ "./assets/src/js/icons/Check.js":
/*!**************************************!*\
  !*** ./assets/src/js/icons/Check.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _extends() { _extends = Object.assign ? Object.assign.bind() : function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }
var SvgCheck = function SvgCheck(props) {
  return /*#__PURE__*/React.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    xmlSpace: "preserve",
    width: 20,
    height: 20,
    style: {
      enableBackground: "new 0 0 20 20"
    },
    viewBox: "0 0 417.813 417"
  }, props), /*#__PURE__*/React.createElement("path", {
    xmlns: "http://www.w3.org/2000/svg",
    fill: "#06ab1c",
    d: "M159.988 318.582c-3.988 4.012-9.43 6.25-15.082 6.25s-11.094-2.238-15.082-6.25L9.375 198.113c-12.5-12.5-12.5-32.77 0-45.246l15.082-15.086c12.504-12.5 32.75-12.5 45.25 0l75.2 75.203L348.104 9.781c12.504-12.5 32.77-12.5 45.25 0l15.082 15.086c12.5 12.5 12.5 32.766 0 45.246zm0 0",
    "data-original": "#2196f3"
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SvgCheck);

/***/ }),

/***/ "./assets/src/js/icons/Cross.js":
/*!**************************************!*\
  !*** ./assets/src/js/icons/Cross.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _extends() { _extends = Object.assign ? Object.assign.bind() : function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }
var SvgCross = function SvgCross(props) {
  return /*#__PURE__*/React.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    xmlSpace: "preserve",
    width: 20,
    height: 20,
    style: {
      enableBackground: "new 0 0 20 20"
    },
    viewBox: "0 0 123.05 123.05"
  }, props), /*#__PURE__*/React.createElement("path", {
    xmlns: "http://www.w3.org/2000/svg",
    fill: "#e30101",
    d: "m121.325 10.925-8.5-8.399c-2.3-2.3-6.1-2.3-8.5 0l-42.4 42.399L18.726 1.726c-2.301-2.301-6.101-2.301-8.5 0l-8.5 8.5c-2.301 2.3-2.301 6.1 0 8.5l43.1 43.1-42.3 42.5c-2.3 2.3-2.3 6.1 0 8.5l8.5 8.5c2.3 2.3 6.1 2.3 8.5 0l42.399-42.4 42.4 42.4c2.3 2.3 6.1 2.3 8.5 0l8.5-8.5c2.3-2.3 2.3-6.1 0-8.5l-42.5-42.4 42.4-42.399a6.13 6.13 0 0 0 .1-8.602z",
    "data-original": "#000000"
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SvgCross);

/***/ }),

/***/ "./assets/src/js/icons/index.js":
/*!**************************************!*\
  !*** ./assets/src/js/icons/index.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Check: () => (/* reexport safe */ _Check__WEBPACK_IMPORTED_MODULE_0__["default"]),
/* harmony export */   Cross: () => (/* reexport safe */ _Cross__WEBPACK_IMPORTED_MODULE_1__["default"])
/* harmony export */ });
/* harmony import */ var _Check__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Check */ "./assets/src/js/icons/Check.js");
/* harmony import */ var _Cross__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Cross */ "./assets/src/js/icons/Cross.js");



/***/ }),

/***/ "./assets/src/sass/blocks.scss":
/*!*************************************!*\
  !*** ./assets/src/sass/blocks.scss ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["lodash"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*********************************!*\
  !*** ./assets/src/js/blocks.js ***!
  \*********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_blocks_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/blocks.scss */ "./assets/src/sass/blocks.scss");
/* harmony import */ var _gutenberg_blocks_heading_with_icon_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./gutenberg/blocks/heading-with-icon/index */ "./assets/src/js/gutenberg/blocks/heading-with-icon/index.js");
/* harmony import */ var _gutenberg_blocks_dos_and_donts_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./gutenberg/blocks/dos-and-donts/index */ "./assets/src/js/gutenberg/blocks/dos-and-donts/index.js");
/* harmony import */ var _gutenberg_block_extensions_register_blocks_styles__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./gutenberg/block-extensions/register-blocks-styles */ "./assets/src/js/gutenberg/block-extensions/register-blocks-styles.js");


//Blocks



//Block Extensions.

})();

/******/ })()
;
//# sourceMappingURL=blocks.js.map