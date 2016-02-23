function defilImgHrz(el, srcs, pas, tps) {
    if(typeof el=="string") { el = document.getElementById(el); }
    var tps = tps || 50;
    var pas = pas || 1;
    var imgs = [];
    var offset = 0;
    var first = 0;
    var last = srcs.length-1;

    $.each(srcs, function(_, img){
        img.style.height = el.offsetHeight+"px";
        img.style.position = "absolute";
        img.style.left = offset+"px";
        el.appendChild(img);
        offset += img.offsetWidth;
    });

    (function d() {
        $.each(srcs, function(i, img){
            var left = parseInt(img.style.left,10);
            img.style.left = (left - pas) + "px";
            if(i==first && (left - pas + img.offsetWidth) < 0) {
                img.style.left = (parseInt(srcs[last].style.left, 10) + srcs[last].offsetWidth - (i==0 ? pas : 0)) + "px";
                last = first++;
                if(first > srcs.length-1){ 
                    first = 0; 
                }
            }
        });

        window.setTimeout(d,tps);
    })();
}

// Appel fonction de défilement au chargement de la page .
window.onload=function() {
    defilImgHrz('bandeau_horizontal', imageObj, 2);
};