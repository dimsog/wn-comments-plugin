function S(u){const i={};return new FormData(u).forEach((d,p)=>i[p]=d),i}var F=typeof globalThis<"u"?globalThis:typeof window<"u"?window:typeof global<"u"?global:typeof self<"u"?self:{};function z(u){return u&&u.__esModule&&Object.prototype.hasOwnProperty.call(u,"default")?u.default:u}var A={exports:{}};/*!
 * Toastify js 1.12.0
 * https://github.com/apvarun/toastify-js
 * @license MIT licensed
 *
 * Copyright (C) 2018 Varun A P
 */(function(u){(function(i,o){u.exports?u.exports=o():i.Toastify=o()})(F,function(i){var o=function(t){return new o.lib.init(t)},d="1.12.0";o.defaults={oldestFirst:!0,text:"Toastify is awesome!",node:void 0,duration:3e3,selector:void 0,callback:function(){},destination:void 0,newWindow:!1,close:!1,gravity:"toastify-top",positionLeft:!1,position:"",backgroundColor:"",avatar:"",className:"",stopOnFocus:!0,onClick:function(){},offset:{x:0,y:0},escapeMarkup:!0,ariaLive:"polite",style:{background:""}},o.lib=o.prototype={toastify:d,constructor:o,init:function(t){return t||(t={}),this.options={},this.toastElement=null,this.options.text=t.text||o.defaults.text,this.options.node=t.node||o.defaults.node,this.options.duration=t.duration===0?0:t.duration||o.defaults.duration,this.options.selector=t.selector||o.defaults.selector,this.options.callback=t.callback||o.defaults.callback,this.options.destination=t.destination||o.defaults.destination,this.options.newWindow=t.newWindow||o.defaults.newWindow,this.options.close=t.close||o.defaults.close,this.options.gravity=t.gravity==="bottom"?"toastify-bottom":o.defaults.gravity,this.options.positionLeft=t.positionLeft||o.defaults.positionLeft,this.options.position=t.position||o.defaults.position,this.options.backgroundColor=t.backgroundColor||o.defaults.backgroundColor,this.options.avatar=t.avatar||o.defaults.avatar,this.options.className=t.className||o.defaults.className,this.options.stopOnFocus=t.stopOnFocus===void 0?o.defaults.stopOnFocus:t.stopOnFocus,this.options.onClick=t.onClick||o.defaults.onClick,this.options.offset=t.offset||o.defaults.offset,this.options.escapeMarkup=t.escapeMarkup!==void 0?t.escapeMarkup:o.defaults.escapeMarkup,this.options.ariaLive=t.ariaLive||o.defaults.ariaLive,this.options.style=t.style||o.defaults.style,t.backgroundColor&&(this.options.style.background=t.backgroundColor),this},buildToast:function(){if(!this.options)throw"Toastify is not initialized";var t=document.createElement("div");t.className="toastify on "+this.options.className,this.options.position?t.className+=" toastify-"+this.options.position:this.options.positionLeft===!0?(t.className+=" toastify-left",console.warn("Property `positionLeft` will be depreciated in further versions. Please use `position` instead.")):t.className+=" toastify-right",t.className+=" "+this.options.gravity,this.options.backgroundColor&&console.warn('DEPRECATION NOTICE: "backgroundColor" is being deprecated. Please use the "style.background" property.');for(var a in this.options.style)t.style[a]=this.options.style[a];if(this.options.ariaLive&&t.setAttribute("aria-live",this.options.ariaLive),this.options.node&&this.options.node.nodeType===Node.ELEMENT_NODE)t.appendChild(this.options.node);else if(this.options.escapeMarkup?t.innerText=this.options.text:t.innerHTML=this.options.text,this.options.avatar!==""){var e=document.createElement("img");e.src=this.options.avatar,e.className="toastify-avatar",this.options.position=="left"||this.options.positionLeft===!0?t.appendChild(e):t.insertAdjacentElement("afterbegin",e)}if(this.options.close===!0){var s=document.createElement("button");s.type="button",s.setAttribute("aria-label","Close"),s.className="toast-close",s.innerHTML="&#10006;",s.addEventListener("click",(function(r){r.stopPropagation(),this.removeElement(this.toastElement),window.clearTimeout(this.toastElement.timeOutValue)}).bind(this));var l=window.innerWidth>0?window.innerWidth:screen.width;(this.options.position=="left"||this.options.positionLeft===!0)&&l>360?t.insertAdjacentElement("afterbegin",s):t.appendChild(s)}if(this.options.stopOnFocus&&this.options.duration>0){var n=this;t.addEventListener("mouseover",function(r){window.clearTimeout(t.timeOutValue)}),t.addEventListener("mouseleave",function(){t.timeOutValue=window.setTimeout(function(){n.removeElement(t)},n.options.duration)})}if(typeof this.options.destination<"u"&&t.addEventListener("click",(function(r){r.stopPropagation(),this.options.newWindow===!0?window.open(this.options.destination,"_blank"):window.location=this.options.destination}).bind(this)),typeof this.options.onClick=="function"&&typeof this.options.destination>"u"&&t.addEventListener("click",(function(r){r.stopPropagation(),this.options.onClick()}).bind(this)),typeof this.options.offset=="object"){var h=p("x",this.options),f=p("y",this.options),y=this.options.position=="left"?h:"-"+h,b=this.options.gravity=="toastify-top"?f:"-"+f;t.style.transform="translate("+y+","+b+")"}return t},showToast:function(){this.toastElement=this.buildToast();var t;if(typeof this.options.selector=="string"?t=document.getElementById(this.options.selector):this.options.selector instanceof HTMLElement||typeof ShadowRoot<"u"&&this.options.selector instanceof ShadowRoot?t=this.options.selector:t=document.body,!t)throw"Root element is not defined";var a=o.defaults.oldestFirst?t.firstChild:t.lastChild;return t.insertBefore(this.toastElement,a),o.reposition(),this.options.duration>0&&(this.toastElement.timeOutValue=window.setTimeout((function(){this.removeElement(this.toastElement)}).bind(this),this.options.duration)),this},hideToast:function(){this.toastElement.timeOutValue&&clearTimeout(this.toastElement.timeOutValue),this.removeElement(this.toastElement)},removeElement:function(t){t.className=t.className.replace(" on",""),window.setTimeout((function(){this.options.node&&this.options.node.parentNode&&this.options.node.parentNode.removeChild(this.options.node),t.parentNode&&t.parentNode.removeChild(t),this.options.callback.call(t),o.reposition()}).bind(this),400)}},o.reposition=function(){for(var t={top:15,bottom:15},a={top:15,bottom:15},e={top:15,bottom:15},s=document.getElementsByClassName("toastify"),l,n=0;n<s.length;n++){c(s[n],"toastify-top")===!0?l="toastify-top":l="toastify-bottom";var h=s[n].offsetHeight;l=l.substr(9,l.length-1);var f=15,y=window.innerWidth>0?window.innerWidth:screen.width;y<=360?(s[n].style[l]=e[l]+"px",e[l]+=h+f):c(s[n],"toastify-left")===!0?(s[n].style[l]=t[l]+"px",t[l]+=h+f):(s[n].style[l]=a[l]+"px",a[l]+=h+f)}return this};function p(t,a){return a.offset[t]?isNaN(a.offset[t])?a.offset[t]:a.offset[t]+"px":"0px"}function c(t,a){return!t||typeof a!="string"?!1:!!(t.className&&t.className.trim().split(/\s+/gi).indexOf(a)>-1)}return o.lib.init.prototype=o.lib,o})})(A);var W=A.exports;const N=z(W),L=[];class E{static hideAlerts(){for(const i of L)i.hideToast()}static success(i){const o=N({text:i,duration:3e3,newWindow:!0,close:!0,gravity:"top",position:"center",stopOnFocus:!0,style:{background:"rgb(55,100,218)"}}).showToast();L.push(o)}static error(i){i instanceof Array&&(i=i.join("<br>"));const o=N({text:i,duration:1e4,newWindow:!0,close:!0,escapeMarkup:!1,gravity:"top",position:"center",stopOnFocus:!0,style:{background:"rgb(218,55,93)"}}).showToast();L.push(o)}}var O={exports:{}};(function(u,i){(function(o,d){u.exports=d()})(F,function(){var o=new Map;function d(e){if(!e||!e.nodeName||e.nodeName!=="TEXTAREA"||o.has(e))return;var s=null;function l(r){for(var m=[];r&&r.parentNode&&r.parentNode instanceof Element;)r.parentNode.scrollTop&&m.push([r.parentNode,r.parentNode.scrollTop]),r=r.parentNode;return function(){return m.forEach(function(g){var w=g[0],T=g[1];w.style.scrollBehavior="auto",w.scrollTop=T,w.style.scrollBehavior=null})}}var n=window.getComputedStyle(e);function h(r){var m=r.restoreTextAlign,g=m===void 0?null:m,w=r.testForHeightReduction,T=w===void 0?!0:w,H=n.overflowY;if(e.scrollHeight!==0){n.resize==="vertical"?e.style.resize="none":n.resize==="both"&&(e.style.resize="horizontal");var x;T&&(x=l(e),e.style.height="");var v;if(n.boxSizing==="content-box"?v=e.scrollHeight-(parseFloat(n.paddingTop)+parseFloat(n.paddingBottom)):v=e.scrollHeight+parseFloat(n.borderTopWidth)+parseFloat(n.borderBottomWidth),n.maxHeight!=="none"&&v>parseFloat(n.maxHeight)?(n.overflowY==="hidden"&&(e.style.overflow="scroll"),v=parseFloat(n.maxHeight)):n.overflowY!=="hidden"&&(e.style.overflow="hidden"),e.style.height=v+"px",g&&(e.style.textAlign=g),x&&x(),s!==v&&(e.dispatchEvent(new Event("autosize:resized",{bubbles:!0})),s=v),H!==n.overflow&&!g){var k=n.textAlign;n.overflow==="hidden"&&(e.style.textAlign=k==="start"?"end":"start"),h({restoreTextAlign:k,testForHeightReduction:!0})}}}function f(){h({testForHeightReduction:!0,restoreTextAlign:null})}var y=function(){var r=e.value;return function(){h({testForHeightReduction:r===""||!e.value.startsWith(r),restoreTextAlign:null}),r=e.value}}(),b=(function(r){e.removeEventListener("autosize:destroy",b),e.removeEventListener("autosize:update",f),e.removeEventListener("input",y),window.removeEventListener("resize",f),Object.keys(r).forEach(function(m){return e.style[m]=r[m]}),o.delete(e)}).bind(e,{height:e.style.height,resize:e.style.resize,textAlign:e.style.textAlign,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",b),e.addEventListener("autosize:update",f),e.addEventListener("input",y),window.addEventListener("resize",f),e.style.overflowX="hidden",e.style.wordWrap="break-word",o.set(e,{destroy:b,update:f}),f()}function p(e){var s=o.get(e);s&&s.destroy()}function c(e){var s=o.get(e);s&&s.update()}var t=null;typeof window>"u"?(t=function(s){return s},t.destroy=function(e){return e},t.update=function(e){return e}):(t=function(s,l){return s&&Array.prototype.forEach.call(s.length?s:[s],function(n){return d(n)}),s},t.destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],p),e},t.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],c),e});var a=t;return a})})(O);var M=O.exports;const R=z(M);function _(u){const i=document.createElement("template");return i.innerHTML=u,i.content.firstChild}class C{static render(i,o){return new Promise(d=>{this._loadForm().then(p=>{const c=_(p.form);c.querySelector("input[name=parent_id]").value=(o==null?void 0:o.parentId)??null,i.append(c),d(c),R(c.querySelector("textarea")),c.addEventListener("submit",t=>{t.preventDefault(),E.hideAlerts(),Snowboard.request("onCommentStore",{data:S(c),success:a=>{E.success(a.message),this._reset(c)},error:a=>{E.error(a)}})})}).catch(p=>{E.error(p)})})}static _loadForm(){return new Promise((i,o)=>{Snowboard.request(null,"onCommentsLoadForm",{success:d=>{i(d)},error:d=>{o(d.text)}})})}static _reset(i){i.querySelector("input[type=text]").value="",i.querySelector("input[type=email]").value="",i.querySelector("textarea").value=""}}document.addEventListener("DOMContentLoaded",()=>{document.getElementById("d-comments-form-container")!==null&&(C.render(document.getElementById("d-comments-form-container")),document.addEventListener("click",i=>{i.target.classList.contains("app-d-comment-item-answer__link")&&(i.preventDefault(),C.render(i.target.parentElement,{parentId:i.target.dataset.commentId}).then(()=>{i.target.style.display="none"}))}))});
