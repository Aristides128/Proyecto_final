String.prototype.ajax_parser = function () {
  var pat = /<script[^>]*>([\S\s]*?)<\/script[^>]*>/gi;
  var pat2 = /\bsrc=[^>\s]+\b/g;
  var elementos = this.match(pat) || [];
  for (i = 0; i < elementos.length; i++) {
    var nuevoScript = document.createElement("script");
    nuevoScript.type = "text/javascript";
    var tienesrc = elementos[i].match(pat2) || [];
    if (tienesrc.length) {
      nuevoScript.src = tienesrc[0]
        .split("'")
        .join("")
        .split('"')
        .join("")
        .split("src=")
        .join("")
        .split(" ")
        .join("");
    } else {
      var elemento = elementos[i].replace(pat, "$1", "");
      nuevoScript.text = elemento;
    }
    document.getElementsByTagName("body")[0].appendChild(nuevoScript);
  }
  return this.replace(pat, "");
};
