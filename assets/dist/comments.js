function W(d){const n={};for(const o of d)n[o.name]=o.value;return n}var C=typeof globalThis<"u"?globalThis:typeof window<"u"?window:typeof global<"u"?global:typeof self<"u"?self:{};function A(d){return d&&d.__esModule&&Object.prototype.hasOwnProperty.call(d,"default")?d.default:d}var F={exports:{}};/*!
 * Toastify js 1.12.0
 * https://github.com/apvarun/toastify-js
 * @license MIT licensed
 *
 * Copyright (C) 2018 Varun A P
 */(function(d){(function(n,o){d.exports?d.exports=o():n.Toastify=o()})(C,function(n){var o=function(t){return new o.lib.init(t)},c="1.12.0";o.defaults={oldestFirst:!0,text:"Toastify is awesome!",node:void 0,duration:3e3,selector:void 0,callback:function(){},destination:void 0,newWindow:!1,close:!1,gravity:"toastify-top",positionLeft:!1,position:"",backgroundColor:"",avatar:"",className:"",stopOnFocus:!0,onClick:function(){},offset:{x:0,y:0},escapeMarkup:!0,ariaLive:"polite",style:{background:""}},o.lib=o.prototype={toastify:c,constructor:o,init:function(t){return t||(t={}),this.options={},this.toastElement=null,this.options.text=t.text||o.defaults.text,this.options.node=t.node||o.defaults.node,this.options.duration=t.duration===0?0:t.duration||o.defaults.duration,this.options.selector=t.selector||o.defaults.selector,this.options.callback=t.callback||o.defaults.callback,this.options.destination=t.destination||o.defaults.destination,this.options.newWindow=t.newWindow||o.defaults.newWindow,this.options.close=t.close||o.defaults.close,this.options.gravity=t.gravity==="bottom"?"toastify-bottom":o.defaults.gravity,this.options.positionLeft=t.positionLeft||o.defaults.positionLeft,this.options.position=t.position||o.defaults.position,this.options.backgroundColor=t.backgroundColor||o.defaults.backgroundColor,this.options.avatar=t.avatar||o.defaults.avatar,this.options.className=t.className||o.defaults.className,this.options.stopOnFocus=t.stopOnFocus===void 0?o.defaults.stopOnFocus:t.stopOnFocus,this.options.onClick=t.onClick||o.defaults.onClick,this.options.offset=t.offset||o.defaults.offset,this.options.escapeMarkup=t.escapeMarkup!==void 0?t.escapeMarkup:o.defaults.escapeMarkup,this.options.ariaLive=t.ariaLive||o.defaults.ariaLive,this.options.style=t.style||o.defaults.style,t.backgroundColor&&(this.options.style.background=t.backgroundColor),this},buildToast:function(){if(!this.options)throw"Toastify is not initialized";var t=document.createElement("div");t.className="toastify on "+this.options.className,this.options.position?t.className+=" toastify-"+this.options.position:this.options.positionLeft===!0?(t.className+=" toastify-left",console.warn("Property `positionLeft` will be depreciated in further versions. Please use `position` instead.")):t.className+=" toastify-right",t.className+=" "+this.options.gravity,this.options.backgroundColor&&console.warn('DEPRECATION NOTICE: "backgroundColor" is being deprecated. Please use the "style.background" property.');for(var a in this.options.style)t.style[a]=this.options.style[a];if(this.options.ariaLive&&t.setAttribute("aria-live",this.options.ariaLive),this.options.node&&this.options.node.nodeType===Node.ELEMENT_NODE)t.appendChild(this.options.node);else if(this.options.escapeMarkup?t.innerText=this.options.text:t.innerHTML=this.options.text,this.options.avatar!==""){var e=document.createElement("img");e.src=this.options.avatar,e.className="toastify-avatar",this.options.position=="left"||this.options.positionLeft===!0?t.appendChild(e):t.insertAdjacentElement("afterbegin",e)}if(this.options.close===!0){var i=document.createElement("button");i.type="button",i.setAttribute("aria-label","Close"),i.className="toast-close",i.innerHTML="&#10006;",i.addEventListener("click",(function(r){r.stopPropagation(),this.removeElement(this.toastElement),window.clearTimeout(this.toastElement.timeOutValue)}).bind(this));var l=window.innerWidth>0?window.innerWidth:screen.width;(this.options.position=="left"||this.options.positionLeft===!0)&&l>360?t.insertAdjacentElement("afterbegin",i):t.appendChild(i)}if(this.options.stopOnFocus&&this.options.duration>0){var s=this;t.addEventListener("mouseover",function(r){window.clearTimeout(t.timeOutValue)}),t.addEventListener("mouseleave",function(){t.timeOutValue=window.setTimeout(function(){s.removeElement(t)},s.options.duration)})}if(typeof this.options.destination<"u"&&t.addEventListener("click",(function(r){r.stopPropagation(),this.options.newWindow===!0?window.open(this.options.destination,"_blank"):window.location=this.options.destination}).bind(this)),typeof this.options.onClick=="function"&&typeof this.options.destination>"u"&&t.addEventListener("click",(function(r){r.stopPropagation(),this.options.onClick()}).bind(this)),typeof this.options.offset=="object"){var p=h("x",this.options),u=h("y",this.options),y=this.options.position=="left"?p:"-"+p,b=this.options.gravity=="toastify-top"?u:"-"+u;t.style.transform="translate("+y+","+b+")"}return t},showToast:function(){this.toastElement=this.buildToast();var t;if(typeof this.options.selector=="string"?t=document.getElementById(this.options.selector):this.options.selector instanceof HTMLElement||typeof ShadowRoot<"u"&&this.options.selector instanceof ShadowRoot?t=this.options.selector:t=document.body,!t)throw"Root element is not defined";var a=o.defaults.oldestFirst?t.firstChild:t.lastChild;return t.insertBefore(this.toastElement,a),o.reposition(),this.options.duration>0&&(this.toastElement.timeOutValue=window.setTimeout((function(){this.removeElement(this.toastElement)}).bind(this),this.options.duration)),this},hideToast:function(){this.toastElement.timeOutValue&&clearTimeout(this.toastElement.timeOutValue),this.removeElement(this.toastElement)},removeElement:function(t){t.className=t.className.replace(" on",""),window.setTimeout((function(){this.options.node&&this.options.node.parentNode&&this.options.node.parentNode.removeChild(this.options.node),t.parentNode&&t.parentNode.removeChild(t),this.options.callback.call(t),o.reposition()}).bind(this),400)}},o.reposition=function(){for(var t={top:15,bottom:15},a={top:15,bottom:15},e={top:15,bottom:15},i=document.getElementsByClassName("toastify"),l,s=0;s<i.length;s++){f(i[s],"toastify-top")===!0?l="toastify-top":l="toastify-bottom";var p=i[s].offsetHeight;l=l.substr(9,l.length-1);var u=15,y=window.innerWidth>0?window.innerWidth:screen.width;y<=360?(i[s].style[l]=e[l]+"px",e[l]+=p+u):f(i[s],"toastify-left")===!0?(i[s].style[l]=t[l]+"px",t[l]+=p+u):(i[s].style[l]=a[l]+"px",a[l]+=p+u)}return this};function h(t,a){return a.offset[t]?isNaN(a.offset[t])?a.offset[t]:a.offset[t]+"px":"0px"}function f(t,a){return!t||typeof a!="string"?!1:!!(t.className&&t.className.trim().split(/\s+/gi).indexOf(a)>-1)}return o.lib.init.prototype=o.lib,o})})(F);var M=F.exports;const L=A(M),k=[];class T{static hideAlerts(){for(const n of k)n.hideToast()}static success(n){const o=L({text:n,duration:3e3,newWindow:!0,close:!0,gravity:"top",position:"center",stopOnFocus:!0,style:{background:"rgb(55,100,218)"}}).showToast();k.push(o)}static error(n){n instanceof Array&&(n=n.join("<br>"));const o=L({text:n,duration:1e4,newWindow:!0,close:!0,escapeMarkup:!1,gravity:"top",position:"center",stopOnFocus:!0,style:{background:"rgb(218,55,93)"}}).showToast();k.push(o)}}var O={exports:{}};(function(d,n){(function(o,c){d.exports=c()})(C,function(){var o=new Map;function c(e){if(!e||!e.nodeName||e.nodeName!=="TEXTAREA"||o.has(e))return;var i=null;function l(r){for(var v=[];r&&r.parentNode&&r.parentNode instanceof Element;)r.parentNode.scrollTop&&v.push([r.parentNode,r.parentNode.scrollTop]),r=r.parentNode;return function(){return v.forEach(function(w){var g=w[0],E=w[1];g.style.scrollBehavior="auto",g.scrollTop=E,g.style.scrollBehavior=null})}}var s=window.getComputedStyle(e);function p(r){var v=r.restoreTextAlign,w=v===void 0?null:v,g=r.testForHeightReduction,E=g===void 0?!0:g,H=s.overflowY;if(e.scrollHeight!==0){s.resize==="vertical"?e.style.resize="none":s.resize==="both"&&(e.style.resize="horizontal");var x;E&&(x=l(e),e.style.height="");var m;if(s.boxSizing==="content-box"?m=e.scrollHeight-(parseFloat(s.paddingTop)+parseFloat(s.paddingBottom)):m=e.scrollHeight+parseFloat(s.borderTopWidth)+parseFloat(s.borderBottomWidth),s.maxHeight!=="none"&&m>parseFloat(s.maxHeight)?(s.overflowY==="hidden"&&(e.style.overflow="scroll"),m=parseFloat(s.maxHeight)):s.overflowY!=="hidden"&&(e.style.overflow="hidden"),e.style.height=m+"px",w&&(e.style.textAlign=w),x&&x(),i!==m&&(e.dispatchEvent(new Event("autosize:resized",{bubbles:!0})),i=m),H!==s.overflow&&!w){var N=s.textAlign;s.overflow==="hidden"&&(e.style.textAlign=N==="start"?"end":"start"),p({restoreTextAlign:N,testForHeightReduction:!0})}}}function u(){p({testForHeightReduction:!0,restoreTextAlign:null})}var y=function(){var r=e.value;return function(){p({testForHeightReduction:r===""||!e.value.startsWith(r),restoreTextAlign:null}),r=e.value}}(),b=(function(r){e.removeEventListener("autosize:destroy",b),e.removeEventListener("autosize:update",u),e.removeEventListener("input",y),window.removeEventListener("resize",u),Object.keys(r).forEach(function(v){return e.style[v]=r[v]}),o.delete(e)}).bind(e,{height:e.style.height,resize:e.style.resize,textAlign:e.style.textAlign,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",b),e.addEventListener("autosize:update",u),e.addEventListener("input",y),window.addEventListener("resize",u),e.style.overflowX="hidden",e.style.wordWrap="break-word",o.set(e,{destroy:b,update:u}),u()}function h(e){var i=o.get(e);i&&i.destroy()}function f(e){var i=o.get(e);i&&i.update()}var t=null;typeof window>"u"?(t=function(i){return i},t.destroy=function(e){return e},t.update=function(e){return e}):(t=function(i,l){return i&&Array.prototype.forEach.call(i.length?i:[i],function(s){return c(s)}),i},t.destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],h),e},t.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],f),e});var a=t;return a})})(O);var S=O.exports;const R=A(S);class z{static render(n,o){return new Promise(c=>{this._loadForm().then(h=>{const f=$(h.form);c(f),f.find("input[name=parent_id]").val((o==null?void 0:o.parentId)??null),R(f.find("textarea")),f.on("submit",t=>{t.preventDefault(),T.hideAlerts(),Snowboard.request("onCommentStore",{data:W(f.serializeArray()),success:a=>{T.success(a.message),this._reset(f)},error:a=>{T.error(a)}})}),n.append(f)}).catch(h=>{T.error(h)})})}static _loadForm(){return new Promise((n,o)=>{Snowboard.request(null,"onCommentsLoadForm",{success:c=>{n(c)},error:c=>{o(c.text)}})})}static _reset(n){n.find("input[type=text]").val(""),n.find("input[type=email]").val(""),n.find("textarea").val("")}}$(function(){z.render($("#d-comments-form-container")),$(document).on("click",".app-d-comment-item-answer__link",function(d){d.preventDefault();const n=$(this);z.render(n.parent(),{parentId:n.data("comment-id")}).then(()=>{n.hide()})})});
