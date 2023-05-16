import console from 'core/log';

export const demo = () =>{
    //set localstorage for disconnected dark mode
    if(document.getElementById('id_dark')){
        document.getElementById('id_dark').addEventListener('click', (e)=>{
            const checker = e.target.checked;
                localStorage.setItem('darkMode', checker);
        });
    }

    //fontsize change
    const body = document.body;
    const htmlElement = document.getElementsByTagName("html")[0];
    const fontSizing = document.getElementById('id_fontsizing');
    fontSizing.addEventListener('change', (e)=>{
        console.log(e);
        const fsValue = "fsa"+parseInt(e.target.value);
        for(let i=0; i<=3; i++){
            if(body.classList.contains("fsa"+i)){
                body.classList.remove('fsa'+i);
            }
        }
        if(!body.classList.contains(fsValue)){
            body.classList.add(fsValue);
        }
    });

    //dark mode
    const darkBtn = document.getElementById('id_dark');
    darkBtn.addEventListener('click', ()=>{
        const navbar = document.getElementsByClassName('navbar-light');
        if(htmlElement.classList.contains('dark')){
            htmlElement.classList.remove('dark');
            for(let i=0; i<navbar.length; i++){
                if(navbar[i] && navbar[i].classList.contains('bg-dark')) {navbar[i].classList.remove('bg-dark');}
            }
        }else{
            htmlElement.classList.add('dark');
            for(let i=0; i<navbar.length; i++){
                if(navbar[i] && !navbar[i].classList.contains('bg-dark')){
                    if(navbar[i].classList.contains('bg-white')) {navbar[i].classList.remove('bg-white');}
                    navbar[i].classList.add('bg-dark');
                }
            }
        }
    });

    //letter spacing
    const lsSpacing = document.getElementById('id_letterspacing');
    lsSpacing.addEventListener('change', (e)=>{
        const lsValue = "ls"+e.target.value;
        for(let i = 0; i <= 3; i++){
            if(body.classList.contains("ls"+i)){
                body.classList.remove('ls'+i);
            }
        }
        if(!body.classList.contains(lsValue)){
            body.classList.add(lsValue);
        }
    });

    //word spacing
    const wSpacing = document.getElementById('id_wordspacing');
    wSpacing.addEventListener('change', (e)=>{
        const wsValue = "ws" + e.target.value;
        for(let i = 0; i<=3; i++){
            if(body.classList.contains("ws"+i)){
                body.classList.remove('ws'+i);
            }
        }
        if(!body.classList.contains(wsValue)){
            body.classList.add(wsValue);
        }
    });

    if(document.getElementById('id_tts')){
        const ttsCheck = document.getElementById('id_tts');
        ttsCheck.addEventListener('click', ()=>{
            if(body.classList.contains('tts')){
                body.classList.remove('tts');
            }else{
                body.classList.add('tts');
            }
        });
    }
    const linespCheck = document.getElementById('id_linespacing');
    linespCheck.addEventListener('change', (e)=>{
        const linespValue = "linesp"+e.target.value;
        for(let i=0; i<=3;i++){
            if(body.classList.contains("linesp"+i)){
                body.classList.remove('linesp'+i);
            }
        }
        if(!body.classList.contains(linespValue)){
            body.classList.add(linespValue);
        }
    });

    //change text
    const textTransformCheck = document.getElementById('id_texttransform');
    textTransformCheck.addEventListener('change', (e)=>{
        const checkValues = {
            0:'normal',
            1:'majuscule',
            2:'minuscule',
            3:'capitale'
        };
        const textValue = checkValues[parseInt(e.target.value)];
        console.log(textValue);
        for(let i = 0; i <= 3; i++){
            if(document.body.classList.contains(checkValues[i])){
                document.body.classList.remove(checkValues[i]);
            }
        }
        if(!body.classList.contains(textValue)){
            body.classList.add(textValue);
        }
    });

    //image desaturation
    const imgCheck = document.getElementById('id_lowsaturizing');
    imgCheck.addEventListener('change', (e)=>{
        const saturize = "lowsat"+parseInt(e.target.value);
        for(let i=0; i<=4; i++){
            if(body.classList.contains("lowsat"+i)){
                body.classList.remove("lowsat"+i);
            }
        }
        if(!body.classList.contains(saturize)){
            body.classList.add(saturize);
        }
    });

    const fontChoice = document.getElementById('id_fontchoice');
    fontChoice.addEventListener('change', (e)=>{
        const font = e.target.value;
        const allFonts = ["normal", "dys", "arial", "verdana", "courier"];
        for(let i =0; i<allFonts.length; i++){
            if(body.classList.contains(allFonts[i])){
                body.classList.remove(allFonts[i]);
            }
        }
        body.classList.add(font);
    });

    const blueChoice = document.getElementById('id_bluechoice');
    blueChoice.addEventListener('click', ()=>{
        if(body.classList.contains('blue-filter-strong')){
            body.classList.remove('blue-filter-strong');
        }else{
            body.classList.add('blue-filter-strong');
        }
    });
    // window.addEventListener('beforeunload',(e)=>{
    //     e.stopPropagation();
    // });
};
