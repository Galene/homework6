<script type="text/javascript" >
var delay_popup = 2000;
setTimeout("ShowPopup().style.display='block'", delay_popup);
</script>


<SCRIPT LANGUAGE="JavaScript">
var popupURL = "";

function PopupCenter(pageURL,title,w,h){
    var targetWin=window.open(pageURL,title,'toolbar=no, location=no, directories=no, status=no, menubar=no,scrollbars=no, resizable=no,copyhistory=no,width='+w+',height='+h+',top='+top+',left='+left);}



function ShowPopup()
{

    HTMLstring='<HTML>\n';
    HTMLstring+='<HEAD>\n';
    HTMLstring+='<TITLE>New Document</TITLE>\n';
    HTMLstring+='</HEAD>\n';
    HTMLstring+='<BODY>\n';
    HTMLstring+='<div><iframe width="560" height="315" src="//www.youtube.com/embed/SX_9gC5_S0Q" frameborder="0" allowfullscreen></iframe></div>\n';
    HTMLstring+='</BODY>\n';
    HTMLstring+='</HTML>';


 var newwindow=window.open(popupURL,null,'toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=0, resizable=0, width=600, height=340');
    newwindow.focus();

    newdocument=newwindow.document;
    newdocument.write(HTMLstring);
    newdocument.close();

}

</SCRIPT>