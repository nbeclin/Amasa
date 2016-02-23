function defilImgHrz(el,srcs,pas,tps) {
  if(typeof el=="string") { el = document.getElementById(el); }
  var tps = tps || 50;
  var pas = pas || 1;
  var imgs = [];
  var offset = 0;
  for(var i=0,l=srcs.length;i<l;i++) {
    imgs.push(srcs[i]);
    srcs[i].style.height=el.offsetHeight+"px";
    srcs[i].style.position = "absolute";
    srcs[i].style.left = offset+"px";
    el.appendChild(srcs[i]);
    offset += srcs[i].offsetWidth;
  }
  var first = 0;
  var last = imgs.length-1;
 
  (function d() {
    for(var i=0,l=imgs.length;i<l;i++) {
      var left = parseInt(imgs[i].style.left,10);
      imgs[i].style.left = (left-pas)+"px";
      if(i==first && (left-pas+imgs[i].offsetWidth)<0) {
        imgs[i].style.left = 
        (parseInt(imgs[last].style.left,10)+imgs[last].offsetWidth-(i==0?pas:0))+"px";
        last = first++;
        if(first>imgs.length-1) { first = 0; }
      }
    }
    setTimeout(d,tps);
  })();
}

// Appel fonction de défilement au chargement de la page .
window.onload=function() {
    defilImgHrz('bandeau_horizontal',imageObj, 2);
};