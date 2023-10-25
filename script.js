const checkout = () => {
    document.querySelector(".checkout").style.display = "block"
    window.scrollTo(0,0);
    document.querySelector(".bg").style.height = `${document.documentElement.scrollHeight}px`
}

const disappear = () => {
    document.querySelector(".checkout").style.display = "none"
    document.querySelector(".bg").style.display = "none"

}