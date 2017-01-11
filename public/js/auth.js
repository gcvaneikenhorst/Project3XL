/**
 * Created by Niels on 11-Jan-17.
 */

function* find(selector) {
    let paginator = document.querySelectorAll(selector);
    for (let i = 0; i < paginator.length; i++)
        yield [i, paginator[i]];
}

function onPageClick(event) {
    let pageIndex = event.target.getAttribute("page-index") * 1;
    // TODO: Only allow to change to the next page if all required fields are filled in properly.

    for (let [i, node] of find('.page')) {
        node.classList.remove("page-active")
    }
    let page = document.querySelector(`.pages .page:nth-child(${pageIndex})`)
    page.classList.add("page-active");
    for (let [index, node] of find('.circle')) {
        if ((index + 1) == pageIndex)
            node.classList.add("circle-active")
        else
            node.classList.remove("circle-active")
    }
}

for (let [index, node] of find('.circle')) {
    node.addEventListener("click", onPageClick);
}