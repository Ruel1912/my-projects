function squareDigits(num){
    let result = "";
    for (let item of String(num).split("")) result += item ** 2;
    return parseInt(result);
}

console.log(squareDigits(324));