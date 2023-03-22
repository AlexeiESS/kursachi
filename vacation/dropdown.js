let __active_dd= null;
document.querySelectorAll('.dropdown').forEach(__dd=>{
    __dd.addEventListener('click',()=>{
        document.querySelectorAll('.dropdown').forEach(__dd2=>{
            if (__dd2 != __dd) {
                __dd2.querySelector('.dropdown-content').classList.add('hidden');
            }
        });
        __dd.querySelector('.dropdown-content').classList.toggle('hidden');
        __active_dd= __dd;
    });
    __dd.querySelectorAll(".dropdown-content .dd-container .dd-elem").forEach(__option=>{
        if (__option.getAttribute('id') == __dd.getAttribute('optionchosen')) {
            __dd.setAttribute('optionchosen',__option.getAttribute('id'));
            __dd.querySelector("#--option-chosen").innerHTML= __option.querySelector("p").innerHTML;
            document.getElementsByName(`${__dd.getAttribute('name')}`).forEach(__input=>{
                __input.value= __option.querySelector("p").innerHTML;
            });
        }else{
            __dd.querySelector("#--option-chosen").innerHTML= 'Выберите...';
        }
        __option.addEventListener('click',(ev)=>{
            __dd.setAttribute('optionchosen',__option.getAttribute('id'));
            __dd.querySelector('#--option-chosen').innerHTML= __option.querySelector("p").innerHTML;
            document.getElementsByName(`${__dd.getAttribute('name')}`).forEach(__input=>{
                __input.value= __option.querySelector("p").innerHTML;
            });
        });
    });
});
window.addEventListener('click',(ev)=>{
    if (ev.target != __active_dd && ev.target != __active_dd.querySelector("#--option-chosen") && ev.target != __active_dd.querySelector(".--stripe")) {
        __active_dd.querySelector('.dropdown-content').classList.add('hidden');
    }
});