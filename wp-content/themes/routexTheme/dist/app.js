/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/***/ (() => {



/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nUndefined mixin.\n\u001b[34m    ╷\u001b[0m\n\u001b[34m274 │\u001b[0m \u001b[31m┌\u001b[0m \u001b[31m@include media-sd {\u001b[0m\n\u001b[34m275 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  .team-member-image-wrapper {\u001b[0m\n\u001b[34m276 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m    flex: 0 0 440px;\u001b[0m\n\u001b[34m277 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m    height: 425px;\u001b[0m\n\u001b[34m278 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  }\u001b[0m\n\u001b[34m279 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m\u001b[0m\n\u001b[34m280 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  .team-details-name {\u001b[0m\n\u001b[34m281 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m    font-size: 1.8rem;\u001b[0m\n\u001b[34m282 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  }\u001b[0m\n\u001b[34m283 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m\u001b[0m\n\u001b[34m284 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  .contact-me-section {\u001b[0m\n\u001b[34m285 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m    padding: 20px;\u001b[0m\n\u001b[34m286 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  }\u001b[0m\n\u001b[34m287 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m\u001b[0m\n\u001b[34m288 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  .submit-button {\u001b[0m\n\u001b[34m289 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m    font-size: 12px;\u001b[0m\n\u001b[34m290 │\u001b[0m \u001b[31m│\u001b[0m \u001b[31m  }\u001b[0m\n\u001b[34m291 │\u001b[0m \u001b[31m└\u001b[0m \u001b[31m}\u001b[0m\n\u001b[34m    ╵\u001b[0m\n  src\\flexible-content\\team-details-section.scss 274:1  @import\n  src\\app.scss 35:9                                     root stylesheet\n    at processResult (C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\webpack\\lib\\NormalModule.js:889:19)\n    at C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\webpack\\lib\\NormalModule.js:1030:5\n    at C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\loader-runner\\lib\\LoaderRunner.js:400:11\n    at C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\loader-runner\\lib\\LoaderRunner.js:252:18\n    at context.callback (C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\loader-runner\\lib\\LoaderRunner.js:124:13)\n    at Object.loader (C:\\laragon\\www\\RouteX\\wp-content\\themes\\routexTheme\\node_modules\\sass-loader\\dist\\index.js:67:5)");

/***/ }),

/***/ "./src/_header.scss":
/*!**************************!*\
  !*** ./src/_header.scss ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/app": 0,
/******/ 			"dist/header": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkroutextheme"] = self["webpackChunkroutextheme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/header"], () => (__webpack_require__("./src/app.js")))
/******/ 	__webpack_require__.O(undefined, ["dist/header"], () => (__webpack_require__("./src/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/header"], () => (__webpack_require__("./src/_header.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;