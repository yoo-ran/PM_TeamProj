const checkout = () => {
    console.log("tt");
    document.querySelector(".checkout").style.display = "block"
    window.scrollTo(0,0);
    console.log(document.documentElement.scrollHeight);
    document.querySelector(".bg").style.height = `${document.documentElement.scrollHeight}px`
}
