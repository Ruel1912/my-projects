function generateHashtag (str) {
    if (!(str.trim())) return false;
    let result = str.split(' ')
        .filter(el => el !== "")
        .map(el => `${el[0].toUpperCase()}${el.slice(1)}`)
        .join("")
    if (`#${result}`.length > 140) return false
    return `#${result}`;
}

console.log(generateHashtag(" "));