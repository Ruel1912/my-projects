let countBits = function (n) {
    let count = 0;
    while (n >= 1) {
        if (n % 2 === 1) {
            count++;
        }
        n = Math.floor(n / 2);
    }
    return count;
};
