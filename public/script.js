function getNumberOfPairs(list) {
    // Ckn=n!/(n−k)!⋅k!
    let n = list.length;
    let k = 2;
    return factorial(n) / factorial(n - k) * factorial(k);

}

function factorial(n) {
    return (n !== 1) ? n * factorial(n - 1) : 1;
}

window.onload = () => {
    document.getElementById("submit-list").onclick = () => {
        let rawInputList = document.getElementById("input-list").value;
        let inputList = rawInputList.split("\n");

        let resultContainer = {};

        let pair = document.createElement("fieldset");
        var legend = document.createElement("legend");
        pair.appendChild(legend);

        let numberOfPairs = getNumberOfPairs(inputList);

        inputList.forEach((value, index) => {
            var itemControl = document.createElement("input");
            itemControl.setAttribute("type", "radio");
            itemControl.value = value;

            var itemContainer = document.createElement("label");
            itemContainer.appendChild(itemControl);
            var itemText = document.createTextNode(value);
            itemContainer.appendChild(itemText);

            resultContainer[index] = itemContainer;

            if (index % 2 === 0) {
                pair = document.createElement("fieldset");
                var legend = document.createElement("legend");
                pair.appendChild(legend);
            } else {
                document.getElementById("process").appendChild(pair);

                if (resultContainer.length % 2 !== 0) {

                }
            }

            pair.appendChild(itemContainer);
        });
    };
};
