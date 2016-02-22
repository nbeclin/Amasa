function defilImgHrz(el,srcs,pas,tps) {
  if(typeof el=="string") { el = document.getElementById(el); }
  var tps = tps || 50;
  var pas = pas || 1;
  var imgs = [];
  var offset = 0;
  for(var i=0,l=srcs.length;i<l;i++) {
    var img = new Image();
    img.src = srcs[i];
    imgs.push(img);
    img.style.height=el.offsetHeight+"px";
    img.style.position = "absolute";
    img.style.left = offset+"px";
    el.appendChild(img);
    offset += img.offsetWidth;
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
  defilImgHrz('bandeau_horizontal',[
    "../img/bandeau/img1.jpg",
    "../img/bandeau/img2.jpg",
    "../img/bandeau/img3.jpg",
    "../img/bandeau/img4.jpg",
    "../img/bandeau/img5.jpg",
    "../img/bandeau/img6.jpg",
    "../img/bandeau/img7.jpg",
    "../img/bandeau/img8.jpg",
    "../img/bandeau/img9.jpg",
    "../img/bandeau/img10.jpg",
    "../img/bandeau/img11.jpg",
    "../img/bandeau/img12.jpg",
    "../img/bandeau/img13.jpg",
    "../img/bandeau/img14.jpg",
    "../img/bandeau/img15.jpg",
    "../img/bandeau/img16.jpg",
    "../img/bandeau/img17.jpg",
    "../img/bandeau/img18.jpg",
    "../img/bandeau/img19.jpg",
    "../img/bandeau/img20.jpg",
    "../img/bandeau/img21.jpg"
  ], 2);
};