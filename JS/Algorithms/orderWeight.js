function orderWeight(strng) {
    const sumNumber = (number) => {
        let results = 0;
        for (let num of number) {
            results += Number(num);
        }
        return result;
    }
    let result = [];
    let prev_weight = "";
    strng = strng.split(" ");
    for (let weight of strng) {
       if (!prev_weight) prev_weight = weight;
       if (sumNumber(weight) < sumNumber(prev_weight) && weight > prev_weight) result.push(weight);
    }
    return strng;
}


console.log(orderWeight("56 65 74 100 99 68 86 180 90"));