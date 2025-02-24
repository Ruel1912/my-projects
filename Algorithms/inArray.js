function inArray(array1,array2){
   return array1.filter(s => array2.join(' ').indexOf(s) !== -1).sort();
}

console.log(inArray(["arp", "live", "strong"], ["lively", "alive", "harp", "sharp", "armstrong"]))