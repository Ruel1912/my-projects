function positiveSum(arr) {
    return arr.filter(num => num > 0).reduce((previewElem, Elem) => previewElem + Elem, 0);
}
