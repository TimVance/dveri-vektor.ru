$(function() {
    $("#textbox").typed({
        strings: ["Межкомнатные двери", "Входные двери", "Арки", "Дверная фурнитура", "Межкомнатные перегородки"],
        attr: "placeholder",
        typeSpeed: 50,
        startDelay: 1000,
        backDelay: 2000,
        showCursor: true,
        shuffle: true,
        loop: true,
    });
});