//* popup message window display lib */
//* created by bamboowaves@gmail.com */
//* this product use YAHOO UI */
//* IF : bdfncPopupStart() */
//*      bdfncPopClose()   */
//*      bdfncDelCookie()   */

//global parameters //
var bdclw; //client width
var bdclh; //client height
var bdoffsw; //offset x
var bdoffsh; //offset y
var br; //browser :ns/ie/op

var bdscrollH;

window.addEvent("domready", fncPopupinit);

//YAHOO.util.Event.onDOMReady(fncPopupinit); 

function fncPopupinit(){
	br=bdbrchk();

	if (bdtriger!="none"){
		if (bdtriger=="cookie"){
			if (getcookie(cookiename)=="1"){
				//nop
			}
			else{
				setTimeout('bdfncPopupStart()',100);
			}
		}
		else{
			if(bdnoauth=="true"){
				setTimeout('bdfncPopupStart()',100);
			}
		}
	}
}

function blogdialogok(){

	//agree check
	if (document.getElementById('input_agreecheck')!=undefined){
		if (document.getElementById('input_agreecheck').checked!=true){
			alert(disagreewarn);
			return;
		}
	}
	
	if(cookiename!=""){
		setcookie(cookiename,"1");
	}

	if(bdokact==""){
		bdfncPopClose();
	}
	else{
		if(bdokact=="open"){
			if(bdokurl!=""){
				window.open(bdokurl);
			}
			bdfncPopClose();
		}
		else
		{
			if(bdokurl!=""){
				location.href=bdokurl;
			}
			else{
				bdfncPopClose();
			}
		}
	}
}

function bdfncDelCookie(){
	setcookie(cookiename,"0");
}

function bdfncPopupStart(){

	//div apend
	var div1 = document.createElement( 'DIV' );
	div1.setAttribute('id','bdpopupwall');
	document.getElementsByTagName('body')[0].appendChild( div1 );

	var div2 = document.createElement( 'DIV' );
	div2.setAttribute('id','bdpopupmsg');
	document.getElementsByTagName('body')[0].appendChild( div2 );

	bdclw = getWidth();
	bdclh = getHeight();
	bdoffsw = getOffsetX();
	bdoffsh = getOffsetY();

	if (window.innerHeight && window.scrollMaxY) {
		bdscrollH = bdclh + window.scrollMaxY;
	}
	else if (document.body.bdscrollHeight > document.body.offsetHeight) {
		bdscrollH = document.body.bdscrollHeight;
	}
	else {
		bdscrollH = document.body.offsetHeight;
		if(bdclh>bdscrollH){
			bdscrollH=bdclh;
		}
	}

	//init
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'left' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'top' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'width' , bdclw+"px");
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'height' , bdscrollH+"px");
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'background-color' , cbdwall_bgcolor);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'opacity' , cbdwall_opacity);
	hideSelectBoxes();

	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'top' , -bdwinh +"px");
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'left' , -bdwinh +"px");
	tox=(bdclw - bdwinw)/2 +bdoffsw;
	toy=(bdclh - bdwinh)/2 +bdoffsh;
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'width' , bdwinw);
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'height' , bdwinh);
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'color' , cbdmsg_color);


	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'opacity' , 0.5);
	document.getElementById('bdpopupmsg').innerHTML="";

	setTimeout('subbdfncPopup1("bdpopupmsg")',100);
}

function subbdfncPopup1(id){

	setTimeout('subbdfncPopup2("'+ id +'")',1);

	var myAnim1 = new YAHOO.util.Motion('bdpopupmsg', {points: { from:[tox,-bdwinh],to:[tox, toy] } }, 1, YAHOO.util.Easing.backOut);
	myAnim1.animate();

	var myAnim2 = new YAHOO.util.ColorAnim(id, { opacity: { from: 0.2, to: cbdmsg_opacity } }, 1, YAHOO.util.Easing.easeOut);
	myAnim2.animate();

	if (br !="ie") {
		addEventListener("scroll", bdposset, false);
	} else {
		window.attachEvent("onscroll", bdposset);
	}
	if (br !="ie") {
		addEventListener("resize", bdposset, false);
	} else {
		window.attachEvent("onresize", bdposset);
	}
}

function subbdfncPopup2(id){

	document.getElementById(id).innerHTML=cmsgstr;
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'opacity' , 1);

	YAHOO.util.Dom.setStyle('a_yes' , 'color' , cbdyesno_color);
	YAHOO.util.Dom.setStyle('a_no' , 'color' , cbdyesno_color);
}


function bdfncPopClose(){
	document.getElementById('bdpopupmsg').innerHTML="<b>Please wait...</b><br>";

	var myAnim = new YAHOO.util.ColorAnim('bdpopupmsg', { opacity: { from: cbdmsg_opacity, to: 0 } }, 1, YAHOO.util.Easing.easeOut);
	myAnim.animate();

	var myAnim = new YAHOO.util.ColorAnim('bdpopupwall', { opacity: { from: cbdwall_opacity, to: 0 } }, 1, YAHOO.util.Easing.easeOut);
	myAnim.animate();

	setTimeout('subbdfncPopClose1()',1000);

}

function subbdfncPopClose1(){

	YAHOO.util.Dom.setStyle('bdpopupwall' , 'width' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'height' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'top' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'left' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'opacity' , 0);
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'background-color' , 'white');
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'border' , '0');
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'top' , 0);
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'left' , 0);
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'width' , 0);
	YAHOO.util.Dom.setStyle('bdpopupmsg' , 'height' , 0);

	showSelectBoxes();

	var id1='bdpopupwall';
	var bdpopupwall=document.all && document.all(id1) || document.getElementById && document.getElementById(id1);
	var id2='bdpopupmsg';
	var bdpopupmsg=document.all && document.all(id2) || document.getElementById && document.getElementById(id2);

	document.body.removeChild(bdpopupwall);
	document.body.removeChild(bdpopupmsg);

	if (br !="ie") {
		removeEventListener("scroll", bdposset, false);
	} else {
		window.detachEvent("onscroll", bdposset);
	}
	if (br !="ie") {
		removeEventListener("resize", bdposset, false);
	} else {
		window.detachEvent("onresize", bdposset);
	}
}

function bdbrchk(){
	if(window.opera){
		return "op";
	}
	  else if(document.all){
		return "ie";
	}
	  else if(document.layers||document.getElementById){
		return "ns";
	}
}

function getWidth(){
	  if(window.opera){
	          return window.innerWidth;
	}
	  else if(document.all){
		var bdclw=document.documentElement.clientWidth;
		if(bdclw==0){
			bdclw=document.body.clientWidth;
		}
		return (bdclw);
	}
	  else if(document.layers||document.getElementById){
	          return window.innerWidth;
	}
}

function getHeight(){
	  if(window.opera){
	          return  window.innerHeight;
	}
	  else if(document.all){
		var bdclh=document.documentElement.clientHeight;
		if(bdclh==0){
			bdclh=document.body.clientHeight;
		}
		return (bdclh);
	}
	  else if(document.layers||document.getElementById){
	          return window.innerHeight;
	}
}

function getOffsetX(){
	if(window.opera){
	          return 0;
	}
	  else if(document.all){
		if (document.body.scrollLeft == 0){
			return document.documentElement.scrollLeft;
		}
		else{
			return document.body.scrollLeft;
		}
	}
	  else if(document.layers||document.getElementById){
	          return pageXOffset;
	}
}
function getOffsetY(){
	if(window.opera){
	          return window.pageYOffset;
	}
	  else if(document.all){
		if (document.body.scrollTop == 0){
			return document.documentElement.scrollTop;
		}
		else{
			return document.body.scrollTop;
		}
	}
	  else if(document.layers||document.getElementById){
	          return pageYOffset;
	}
}

function getcookie(id) {
	var buf=(document.cookie+";").match(id+"=([^;]*);");
	if(buf!=null){
		return unescape(buf[1]);
	}else{
		return null;
	}
}

function setcookie(id,value) {
	//var limitdays = 1;
	var expires  = new Date();
	expires.setTime(expires.getTime() + (limitdays * 1000 * 60 * 60 * 24));

	//update 2012.04.11
	document.cookie = id + "=" + value + ";path=/" + "; expires="+expires.toGMTString();
	//if you use sheared server,change / to /anypath
}

function showSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "visible";
	}
}

function hideSelectBoxes(){
	selects = document.getElementsByTagName("select");
	for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "hidden";
	}
}

function bdposset() {

	bdclw = getWidth();
	bdclh = getHeight();
	bdoffsw = getOffsetX();
	bdoffsh = getOffsetY();

	tox=(bdclw - bdwinw)/2 +bdoffsw;
	toy=(bdclh - bdwinh)/2 +bdoffsh;

	var objwall = document.getElementById('bdpopupwall');
	var objdisp = document.getElementById('bdpopupmsg');

	objdisp.style.top = toy+"px";
	objdisp.style.left = tox+"px";

	if (window.innerHeight && window.scrollMaxY) {
		bdscrollH = bdclh + window.scrollMaxY;

	}
	else if (document.body.bdscrollHeight > document.body.offsetHeight) {
		bdscrollH = document.body.bdscrollHeight;

	}
	else {
		bdscrollH = document.body.offsetHeight;
		if(bdclh>bdscrollH){
			bdscrollH=bdclh;
		}
	}

	YAHOO.util.Dom.setStyle('bdpopupwall' , 'width' , bdclw+"px");
	YAHOO.util.Dom.setStyle('bdpopupwall' , 'height' , bdscrollH+"px");
}

