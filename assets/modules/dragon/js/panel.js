(function(e){function r(r){for(var n,u,c=r[0],l=r[1],i=r[2],f=0,s=[];f<c.length;f++)u=c[f],Object.prototype.hasOwnProperty.call(o,u)&&o[u]&&s.push(o[u][0]),o[u]=0;for(n in l)Object.prototype.hasOwnProperty.call(l,n)&&(e[n]=l[n]);p&&p(r);while(s.length)s.shift()();return a.push.apply(a,i||[]),t()}function t(){for(var e,r=0;r<a.length;r++){for(var t=a[r],n=!0,c=1;c<t.length;c++){var l=t[c];0!==o[l]&&(n=!1)}n&&(a.splice(r--,1),e=u(u.s=t[0]))}return e}var n={},o={panel:0},a=[];function u(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,u),t.l=!0,t.exports}u.m=e,u.c=n,u.d=function(e,r,t){u.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},u.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,r){if(1&r&&(e=u(e)),8&r)return e;if(4&r&&"object"===typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(u.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)u.d(t,n,function(r){return e[r]}.bind(null,n));return t},u.n=function(e){var r=e&&e.__esModule?function(){return e["default"]}:function(){return e};return u.d(r,"a",r),r},u.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},u.p="/";var c=window["webpackJsonp"]=window["webpackJsonp"]||[],l=c.push.bind(c);c.push=r,c=c.slice();for(var i=0;i<c.length;i++)r(c[i]);var p=l;a.push([1,"chunk-vendors"]),t()})({1:function(e,r,t){e.exports=t("fcfd")},fcfd:function(e,r,t){"use strict";t.r(r);t("e260"),t("e6cf"),t("cca6"),t("a79d");var n=t("2b0e"),o=function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div",{attrs:{id:"app"}},[t("router-view")],1)},a=[],u={name:"User"},c=u,l=t("2877"),i=Object(l["a"])(c,o,a,!1,null,"770394d2",null),p=i.exports,f=t("8c4f"),s=function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div",[e._v("User dashboard")])},d=[],h={name:"Dashboard"},v=h,b=Object(l["a"])(v,s,d,!1,null,"14174ef1",null),y=b.exports,m=[{path:"/",name:"Dashboard",component:y,meta:{cap:"level_0"}}],w=t("6c42");t("da96");n["a"].use(f["a"]);var O=new f["a"]({mode:"history",base:"/panel/",routes:m,scrollBehavior:function(e,r,t){return t||(e.hash?{selector:e.hash}:{x:0,y:0})}});n["a"].use(w["a"],{rtl:!0,position:"top-center"}),n["a"].config.productionTip=!1,new n["a"]({router:O,render:function(e){return e(p)}}).$mount("#app")}});