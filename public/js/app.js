/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\sakac\\code\\sakahat\\resources\\js\\app.js: Identifier 'S3_BUCKET' has already been declared (173:6)\n\n  171 |  * Load the S3 information from the environment variables.\n  172 |  */\n> 173 | const S3_BUCKET = process.env.S3_BUCKET;\n      |       ^\n  174 | \n  175 | /*\n  176 |  * Respond to GET requests to /account.\n    at Parser.raise (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:6344:17)\n    at ScopeHandler.checkRedeclarationInScope (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:3757:12)\n    at ScopeHandler.declareName (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:3723:12)\n    at Parser.checkLVal (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:8034:22)\n    at Parser.parseVarId (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:10465:10)\n    at Parser.parseVar (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:10436:12)\n    at Parser.parseVarStatement (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:10258:10)\n    at Parser.parseStatementContent (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:9855:21)\n    at Parser.parseStatement (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:9788:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:10364:25)\n    at Parser.parseBlockBody (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:10351:10)\n    at Parser.parseTopLevel (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:9717:10)\n    at Parser.parse (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:11233:17)\n    at parse (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\parser\\lib\\index.js:11269:38)\n    at parser (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:170:34)\n    at normalizeFile (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:138:11)\n    at runSync (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\core\\lib\\transformation\\index.js:44:43)\n    at runAsync (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\core\\lib\\transformation\\index.js:35:14)\n    at process.nextTick (C:\\Users\\sakac\\code\\sakahat\\node_modules\\@babel\\core\\lib\\transform.js:34:34)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\sakac\code\sakahat\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\sakac\code\sakahat\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });