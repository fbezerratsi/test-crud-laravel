(function(win, doc){
    'use stript';

    function confirmDel(event) {
        event.preventDefault();
        //console.log(event.target.parentNode.href)
        let token = doc.getElementsByName('_token')[0].value;
        if (confirm("Deseja mesmo apagar?")) {
            console.log(event.target.parentNode.href);
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    //console.log('Deu certo');
                    win.location.href = 'users';
                }
            }
            ajax.send();
        } else {
            return false;
        }
    }

    if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);

        }
    }
})(window, document);