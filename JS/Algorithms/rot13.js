let result = "GRFG".split("");
for (let i = 0; i < result.length; i++) {
    if (result[i].toLowerCase() !== result[i].toUpperCase()){
        let a = "GRFG".charCodeAt(i);
        if ("GRFG".charCodeAt(i) > 110){
            result[i] = String.fromCharCode("GRFG".charCodeAt(i) - 13);
        }
        else {
            result[i] = String.fromCharCode("GRFG".charCodeAt(i) + 13);
        }
    }
}

console.log(result.join(""));



