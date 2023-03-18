document.querySelectorAll('.dropdown').forEach(__dd=>{
    __dd.addEventListener('click',()=>{
        __dd.querySelector('.dropdown-content').classList.toggle('hidden');
    });
    __dd.querySelectorAll(".dropdown-content .dd-container .dd-elem").forEach(__option=>{
        if (__option.getAttribute('id') == __dd.getAttribute('optionchosen')) {
            __dd.setAttribute('optionchosen',__option.getAttribute('id'));
            __dd.querySelector("#--option-chosen").innerHTML= __option.querySelector("p").innerHTML;
        }else{
            __dd.querySelector("#--option-chosen").innerHTML= 'Выберите...';
        }
        __option.addEventListener('click',(ev)=>{
            __dd.setAttribute('optionchosen',__option.getAttribute('id'));
            __dd.querySelector('#--option-chosen').innerHTML= __option.querySelector("p").innerHTML;
        });
    });
});