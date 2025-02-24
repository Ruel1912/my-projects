function getCount(str) {
    let vowelsCount = 0;
    for (let char of str) if (["a", "e", "i", "o", "u"].includes(char)) vowelsCount ++;
    return vowelsCount;
}