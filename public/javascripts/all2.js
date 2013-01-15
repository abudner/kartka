/*jslint unparam: true, sloppy: true, devel: true, node: true, windows: true, newcap: true */
/*global $: false, document: false, console: false, window: false, smoke: false, parent: false, evt: false */
var command = "",
    InitToolbarButtons,
    tbmousedown,
    tbmouseup,
    insertNodeAtSelection,
    getOffsetTop,
    getOffsetLeft,
    tbclick,
    Select,
    dismisscolorpalette,
    Start,
    printCard,
    showCard,
    cardContent,
    content,
    edytuj,
    usun,
    pobierzId,
    iduser = 0,
    zmientlo;


$(document).ready(function () {
    var zalogowany = 0;
    $.get("sesja.php", function (data) {
        if (data === 'false') {
            $('#logowanie').modal({
                keyboard: false,
                mouse: false
            });
            $('#uzytzalog').hide();
            $('#logowanie').modal('show');

        } else {
            zalogowany = 1;
            $('#uzytzalog').show();
            pobierzId();
        }
    });
    $('#logowanie').on('hidden', function (e) {
        //if(zalogowany == 0) $('#logowanie').modal('show');
    });
    $('#zarejestruj').click(function () {
        $.post("register.php", $("#rejestracjaform").serialize(),

            function (data) {
                if (data === 'true') {
                // $('#logowanie').modal('hide');
                    $('#rejlogin').val('');
                    $('#rejhaslo').val('');
                } else { smoke.signal("uzytkownik istnieje :D"); }
            });

    });


    $('#dLabel').click(function () {
        $.get("mojekartki.php?id=" + iduser, function (data) {

            $('#nazwaaa').html(data);
            $("#dLabel").dropdown('toggle');
        });
    });


    $('#logowaniebut').click(function () {
        $("#loglogin").waliduj();
        $("#loghaslo").waliduj();
        $.post("login.php", $("#loginform").serialize(),

            function (data) {
                if (data === 'true') {
                    pobierzId();
                    zalogowany = 1;
                    $('#logowanie').modal('hide');
                    $('#uzytzalog').show();
                    smoke.signal('Zalogowano poprawnie :D');
                //$('#uzytzalog').html('<h1>Witaj : ' +  $('#loglogin').val() + '</h1><a href=\"#\" id=\"wylogujbut\"><img src=\"public/images/logout-icon.png\" alt="wyloguj" /></a>');
                    $('#afterek').html('<h1>Witaj : ' + $('#loglogin').val() + '</h1><a href=\"#\" id=\"wylogujbut\"><img src=\"public/images/logout-icon.png\" alt="wyloguj" /></a>');
                    $("#wylogujbut").click(function () {
                        $.get("logout.php");
                    //smoke.alert('Wylogowano');
                        $('#uzytzalog').hide(); // błąd ;P
                        zalogowany = 0;
                        $('#logowanie').modal('show');
                    });
                    $('#loglogin').val('');
                    $('#loghaslo').val('');
                } else { smoke.signal("Zły login lub haslo :("); }


            });




    });

    $('#save').click(function () {


        smoke.prompt('Podaj nazwe kartki : ', function (e) {
            if (e) {
                $.post("zapis.php", {
                    tresc: content,
                    nazwa: e
                }, function (data) {

                    $('#links').val("http://localhost/kartka/pobierz.php?id=" + data);

                });
            }
        }, {
            classname: "srodek"
        });


    });

    $("#wylogujbut").click(function () {
        $.get("logout.php");
        //smoke.alert('Wylogowano');
        $('#uzytzalog').hide(); // błąd ;P
        zalogowany = 0;
        $('#logowanie').modal('show');
    });







    //$('#logowanie').modal('show');


    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});

InitToolbarButtons = function () {
    'use strict';
    var kids, i;
    /*Obsluga zdarzeń panelu*/
    kids = document.getElementsByTagName('DIV');


    for (i = 0; i < kids.length; i += 1) {
        if (kids[i].className === "imagebutton") {
            kids[i].onmousedown = tbmousedown;
            kids[i].onmouseup = tbmouseup;
            kids[i].onclick = tbclick;
        }
    }
};

showCard = function () {
    'use strict';
    var ShowWindow, card;


    card = document.getElementById("editt").contentWindow.document.documentElement;
    // alert(card.innerHTML);
    ShowWindow = window.open("", "_blank", "width=470,height=300,left=400,top=100,menubar=no,toolbar=no,location=yes,scrollbars=no");
    ShowWindow.document.open();
    ShowWindow.document.write("<!doctype html><html>" + card.innerHTML + "<\/html>");
    ShowWindow.document.close();



};


tbmousedown = function (e) {
    'use strict';
    var evt = e || window.event;
    /*zdarzenie, kiedy klawisz mysz zostanie nacisniety nad element*/
    this.firstChild.style.left = 2;
    this.firstChild.style.top = 2;
    this.style.border = "inset 1px";
    if (evt.returnValue) {
        evt.returnValue = false;
    } else if (evt.preventDefault) {
        evt.preventDefault();
    } else {
        return false;
    }
};

tbmouseup = function () {
    'use strict';
    /*zdarzenie , kiedy klawisz myszy zostnie zwolniony z elementu*/
    this.firstChild.style.left = 1;
    this.firstChild.style.top = 1;
    this.style.border = "outset 0px";
};

printCard = function () {
    var PrintWindow, card;
    card = document.getElementById("editt").contentWindow.document.documentElement;
    PrintWindow = window.open("", "_blank", "width=470,height=300,left=400,top=100,menubar=no,toolbar=no,location=no,scrollbars=yes");
    PrintWindow.document.open();
    PrintWindow.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + card.innerHTML + "<\/body><\/html>");
    PrintWindow.document.close();


};

content = function () {
    var cardContent, card;
    card = document.getElementById("editt").contentWindow.document.documentElement;
    cardContent = '<!doctype html><html>' + card.innerHTML + '<\/html>';
    return cardContent;

};

edytuj = function (id) {

    $.get("pobierz.php?id=" + id, function (data) {

        document.getElementById("editt").contentWindow.document.documentElement.innerHTML = data;
    });
};


usun = function (id) {

    $.get("usun.php?id=" + id);



};


pobierzId = function () {
    var jqxhr;
    jqxhr = $.getJSON("sesja.php", function (json) {
        iduser = json.id;
        //console.log(iduser + " " + json.id);
    })
        .error(function () {})
        .complete(function () {});
};




insertNodeAtSelection = function (win, insertNode) {
    'use strict';
    var sel, range, container, pos, afterNode, textNode, text, textBefore, textAfter, beforeNode;
    /*proba uzyskania biezaczego zaznaczenia*/
    sel = win.getSelection();

    /*proba uzyskania pierwszego zakresu wyboru*/
    range = sel.getRangeAt(0);

    /*odzanczenie wszystkiego*/
    sel.removeAllRanges();

    /*usuniecie zawartosci biezacego zaznaczenia*/
    range.deleteContents();

    /*uzyskanie lokalizacji aktualnego zaznaczenia*/
    container = range.startContainer;
    pos = range.startOffset;

    /*stworzenie nowego zakresu wyboru*/
    range = document.createRange();

    if (container.nodeType === 3 && insertNode.nodeType === 3) {

        /*jezeli wstawimy tekst w wezle tekstowym , robimy zoptymalizowane wstawienie*/
        container.insertData(pos, insertNode.nodeValue);

        /*umieszczamy kursor po wstawionym tekscie*/
        range.setEnd(container, pos + insertNode.length);
        range.setStart(container, pos + insertNode.length);

    } else {

        if (container.nodeType === 3) {

            /*kiedy wstawiamy do wezla tekstu, tworzymy 2 nowe wezly tekstu i umieszczamy pomiedzy insertNode*/
            textNode = container;
            container = textNode.parentNode;
            text = textNode.nodeValue;

            /*tekst przed podzieleniem*/
            textBefore = text.substr(0, pos);
            /*tekst po podzieleniem*/
            textAfter = text.substr(pos);

            beforeNode = document.createTextNode(textBefore);
            afterNode = document.createTextNode(textAfter);

            /*wstawiam 3 nowe wezly przed starszym*/
            container.insertBefore(afterNode, textNode);
            container.insertBefore(insertNode, afterNode);
            container.insertBefore(beforeNode, insertNode);

            /*usuwamy starszy wezel*/
            container.removeChild(textNode);

        } else {

            /*w przeciwnym wypadku wstawianie proste wezla*/
            afterNode = container.childNodes[pos];
            container.insertBefore(insertNode, afterNode);
        }

        range.setEnd(afterNode, 0);
        range.setStart(afterNode, 0);
    }

    sel.addRange(range);
};

getOffsetTop = function (elm) {
    'use strict';
    var mOffsetTop, mOffsetParent;
    /*uzyskanie przesuniecia w gore*/
    mOffsetTop = elm.offsetTop;
    mOffsetParent = elm.offsetParent;

    while (mOffsetParent) {
        mOffsetTop += mOffsetParent.offsetTop;
        mOffsetParent = mOffsetParent.offsetParent;
    }

    return mOffsetTop;
};

getOffsetLeft = function (elm) {
    'use strict';
    var mOffsetLeft, mOffsetParent;
    /*uzyskanie przesuniecia w lewo*/
    mOffsetLeft = elm.offsetLeft;
    mOffsetParent = elm.offsetParent;

    while (mOffsetParent) {
        mOffsetLeft += mOffsetParent.offsetLeft;
        mOffsetParent = mOffsetParent.offsetParent;
    }

    return mOffsetLeft;
};

tbclick = function () {
    /*funckja odpowiadajaca z kolor czcionki , tla , tworzenia linku i wstawiania obrazka*/
    var buttonElement, szURL, imagePath;
    if ((this.id === "forecolor") || (this.id === "backcolor")) {
        parent.command = this.id;
        buttonElement = document.getElementById(this.id);
        document.getElementById("colorpalette").style.left = getOffsetLeft(buttonElement);
        document.getElementById("colorpalette").style.top = getOffsetTop(buttonElement) + buttonElement.offsetHeight;
        document.getElementById("colorpalette").style.visibility = "visible";
    } else if (this.id === "createlink") {
        szURL = prompt("Enter a URL:", "http://");
        if ((szURL !== null) && (szURL !== "")) {
            document.getElementById('editt').contentWindow.document.execCommand("CreateLink", false, szURL);
        }
    } else if (this.id === "createimage") {
        imagePath = prompt('Enter Image URL:', 'http://');
        if ((imagePath !== null) && (imagePath !== "")) {
            document.getElementById('editt').contentWindow.document.execCommand('InsertImage', false, imagePath);
        }
    } else {
        document.getElementById('editt').contentWindow.document.execCommand(this.id, false, null);
    }
};

Select = function (selectname) {
    'use strict';
    var cursel, selected;
    /*funckja odpowiednia za selecty, wyboru czcionki , paragrafu i rozmiaru czcionki*/
    cursel = document.getElementById(selectname).selectedIndex;
    /*pierwszy jest zawsze etykieta*/
    if (cursel !== 0) {
        selected = document.getElementById(selectname).options[cursel].value;
        document.getElementById('editt').contentWindow.document.execCommand(selectname, false, selected);
        document.getElementById(selectname).selectedIndex = 0;
    }
    document.getElementById("editt").contentWindow.focus();
};

dismisscolorpalette = function () {
    'use strict';
    /*funcja odpowiada za odwolanie palety colorow czyli ukrycie */
    document.getElementById("colorpalette").style.visibility = "hidden";
};

Start = function () {
    'use strict';
    /*funckja uruchamiana w body przy zaladowaniu strony*/
    document.getElementById('editt').contentWindow.document.designMode = "on";
    try {
        document.getElementById('editt').contentWindow.document.execCommand("undo", false, null);
    } catch (e) {
        alert("Nie jest wspierane przez modul Mozilla");
    }

    InitToolbarButtons();
    if (document.addEventListener) {
        document.addEventListener("mousedown", dismisscolorpalette, true);
        document.getElementById("editt").contentWindow.document.addEventListener("mousedown", dismisscolorpalette, true);
        document.addEventListener("keypress", dismisscolorpalette, true);
        document.getElementById("editt").contentWindow.document.addEventListener("keypress", dismisscolorpalette, true);
    } else if (document.attachEvent) {
        document.attachEvent("mousedown", dismisscolorpalette, true);
        document.getElementById("editt").contentWindow.document.attachEvent("mousedown", dismisscolorpalette, true);
        document.attachEvent("keypress", dismisscolorpalette, true);
        document.getElementById("editt").contentWindow.document.attachEvent("keypress", dismisscolorpalette, true);
    }
};
