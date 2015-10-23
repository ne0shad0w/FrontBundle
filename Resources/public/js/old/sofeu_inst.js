// JavaScript Document
/**
 * 
 * Copyright (c) 2013 Propage (http://propage.com).
 * All rights reserved.
 
 * Redistribution and use in source and binary forms are permitted
 * provided that the above copyright notice and this paragraph are
 * duplicated in all such forms and that any documentation,
 * advertising materials, and other materials related to such
 * distribution and use acknowledge that the software was developed
 * by the Propage.  The name of the
 * Propage may not be used to endorse or promote products derived
 * from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND WITHOUT ANY EXPRESS OR
 * IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.
 * This source file is subject to the new BSD license that is bundled with this
 * package in the file LICENSE.txt. If you did not receive a copy of the license
 * and are unable to obtain it through the world-wide-web, please send an email to
 * Francis Lessard <flessard@propage.com> so we can send you a copy immediately.
 * 
 * @version 2.0
 * @author Francis Lessard <flessard@propage.com>
 */
!function(a,ctx,b){typeof module!="undefined"?module.exports=b():typeof define=="function"&&typeof define.amd=="object"?define(b):ctx[a]=b()}("domready",this,function(a){function m(a){l=1;while(a=b.shift())a()}var b=[],c,d=!1,e=document,f=e.documentElement,g=f.doScroll,h="DOMContentLoaded",i="addEventListener",j="onreadystatechange",k="readyState",l=/^loade|c/.test(e[k]);return e[i]&&e[i](h,c=function(){e.removeEventListener(h,c,d),m()},d),g&&e.attachEvent(j,c=function(){/^c/.test(e[k])&&(e.detachEvent(j,c),m())}),a=g?function(c){self!=top?l?c():b.push(c):function(){try{f.doScroll("left")}catch(b){return setTimeout(function(){a(c)},50)}c()}()}:function(a){l?a():b.push(a)}})
domready(function () {
  /*  var oHead = document.getElementsByTagName( 'HEAD' ).item( 0 );
    var oScript = document.createElement( "script" );
    oScript.type = "text/javascript";
    oScript.src = "/js/sofeu.js";
    oHead.appendChild( oScript );*/

    var oHead = document.getElementsByTagName( 'HEAD' ).item( 0 );
    var oScript = document.createElement( "script" );
    oScript.type = "text/javascript";
    oScript.src = "/bundles/front/js/jquery.easing.1.3.js";
    oHead.appendChild( oScript );

    var oHead = document.getElementsByTagName( 'HEAD' ).item( 0 );
    var oScript = document.createElement( "script" );
    oScript.type = "text/javascript";
    oScript.src = "bundles/front/js/dom.js";
    oHead.appendChild( oScript );
	
	
})


