
function show()
{
    //alert(document.body.innerHTML);
    //console.log(document.body.innerHTML);

    //alert(document.forms.length);
    //alert(document.links.length);

     /*
    alert(document.anchors.length);
    alert(document.images.length);
    alert(document.scripts.length);

    alert(document.title);

    */
   //alert(document.head.innerHTML);

   

   dv=document.getElementById("div-a");

//   alert(dv.parentNode.childNodes.length);

   //alert(dv.childNodes.length);

   //dv.childNodes[4].remove();
   //dv.remove();

   prnt=dv.parentNode;

    newdv=document.createElement("div");

    newdv.innerHTML="<h1>Welcome to sensible Academy</h1>";

    prnt.appendChild(newdv);
}
